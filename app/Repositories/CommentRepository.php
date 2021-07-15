<?php


namespace App\Repositories;

use App\Models\Comment;
use App\Models\Post;
use App\Repositories\Interfaces\CommentRepositoryInterface;
use Illuminate\Http\Request;

/**
 * Class CommentRepository
 * @package App\Repositories
 */
class CommentRepository implements CommentRepositoryInterface
{
    /**
     * @var Comment
     */
    private $comment;

    /**
     * @var Post
     */
    private $post;

    /**
     * CommentRepository constructor.
     * @param Comment $comment
     * @param Post $post
     */
    public function __construct(Comment $comment, Post $post)
    {
        $this->comment = $comment;
        $this->post = $post;
    }

    /**
     * @param array $input
     * @return mixed
     */
    public function store(array $input)
    {
        $this->comment->user()->associate($input['user_id']);
        $post = $this->post->where('id', $input['post_id'])->first();

        return $post->comments()->create($input);
    }

    /**
     * @param array $input
     * @return mixed
     */
    public function replyStore(array $input)
    {
        $reply = $this->comment;
        $reply->comment = $input['comment'];
        $reply->user()->associate($input['user_id']);
        $reply->parent_id = $input['comment_id'];
        $post = $this->post->where('id', $input['post_id'])->first();
        $reply->post_id = $post->id;

        return $post->comments()->save($reply);
    }
}
