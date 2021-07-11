<?php


namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

/**
 * Interface TagRepositoryInterface
 * @package App\Repositories\Interfaces
 */
interface TagRepositoryInterface
{
    /**
     * Store a newly created resource in storage
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request);

    /**
     * Display a listing of the resource
     * @return mixed
     */
    public function all();

    /**
     * @param $id
     * @return mixed
     */
    public function showTag($id);
}
