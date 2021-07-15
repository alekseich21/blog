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
     * @param array $input
     * @return mixed
     */
    public function store(array $input);

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
