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
     * Display a listing of the author posts.
     */
    public function authorPosts();

    /**
     * @return mixed
     */
    public function popularPosts();

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request);

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id);

    /**
     * @return mixed
     */
    public function postsWithoutComments();
}
