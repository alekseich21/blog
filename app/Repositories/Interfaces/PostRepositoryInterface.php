<?php


namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

/**
 * Interface PostRepositoryInterface
 * @package App\Repositories\Interfaces
 */
interface PostRepositoryInterface
{
    /**
     * Display a listing of the resource.
     */
    public function all();

    /**
     * @param $id
     * show one post
     * @return mixed
     */
    public function showPost($id);

    /**
     * @param int $id
     * @return mixed
     */
    public function authorPosts(int $id);

    /**
     * @return mixed
     */
    public function popularPosts();

    /**
     * @param array $input
     * @return mixed
     */
    public function store(array $input);

    /**
     * @param array $input
     * @param $id
     * @return mixed
     */
    public function update(array $input, $id);

    /**
     * @return mixed
     */
    public function postsWithoutComments();
}
