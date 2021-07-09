<?php


namespace App\Repositories;


use App\models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function all()
    {
        return $this->post->paginate(15);;
    }

    public function create()
    {
        $this->post->create();
    }

    public function update($id)
    {

    }

    public function delete($id)
    {

    }
}
