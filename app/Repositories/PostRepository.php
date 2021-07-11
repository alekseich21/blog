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
     * Display an author posts
     * @return mixed
     */
    public function authorPosts()
    {
        return $this->post->where('user_id', Auth::user()->id)->get();
    }

    public function popularPosts()
    {
        return $this->post->orderBy('views', 'desc')->get();
    }

    /**
     * @param Request $request
     * Store a newly created resource in storage
     * @return mixed
     */
    public function store(Request $request)
    {
        $params = $request->all();
        $post = $this->post->create($params);
        $post->tags()->sync($request->tags);

        return $post;
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
     * @param Request $request
     *  Update the specified resource in storage
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $post = $this->post->where('id', $id)->first();
        $post->update($data);
;
        $post->tags()->sync($request->tags);

        return $post;
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
