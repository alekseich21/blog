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
     * Store a newly created resource in storage
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $this->comment->user()->associate($request->user());
        $post = $this->post->where('id', $request->get('post_id'))->first();
        $post->comments()->create($data);

        return $post;
    }

    /**
     * Store a newly created resource in storage
     * @param Request $request
     * @return mixed
     */
    public function replyStore(Request $request)
    {
        $reply = $this->comment;
        $reply->comment = $request->get('comment');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $post = $this->post->where('id', $request->get('post_id'))->first();
        $reply->post_id = $post->id;

        return $post->comments()->save($reply);
    }
}
