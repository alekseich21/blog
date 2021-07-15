<?php


namespace App\Repositories;


use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class PostRepository
 * @package App\Repositories
 */
class PostRepository implements PostRepositoryInterface
{
    /**
     * @var Post
     */
    private $post;

    /**
     * PostRepository constructor.
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     *  Display a listing of the resource
     * @return mixed
     */
    public function all()
    {
        return $this->post->orderBy('id', 'desc')->paginate(15);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function authorPosts($id)
    {
        return $this->post->where('user_id', $id)->get();
    }

    public function popularPosts()
    {
        return $this->post->orderBy('views', 'desc')->get();
    }

    /**
     * @param array $input
     * @return mixed
     */
    public function store(array $input)
    {
        $post = $this->post->create($input);

        return $post->tags()->sync($input['tags']);
    }

    /**
     * show post
     * @param $id
     * @return mixed
     */
    public function showPost($id)
    {
        $post = $this->post->where('id', $id)->firstOrFail();
        $post->views += 1;
        $post->update();

        return $post;
    }

    /**
     * @param array $input
     * @param $id
     * @return mixed
     */
    public function update(array $input, $id)
    {
        $post = $this->post->where('id', $id)->first();
        $post->update($input);
;
        return $post->tags()->sync($input['tags']);
    }

    /**
     * Show Posts Without Comments
     * @return mixed
     */
     public function postsWithoutComments()
     {
         return $this->post->doesnthave('comments')->get();
     }
}
