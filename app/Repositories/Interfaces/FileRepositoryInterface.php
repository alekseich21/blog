<?php


namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

/**
 * Interface FileRepositoryInterface
 * @package App\Repositories\Interfaces
 */
interface FileRepositoryInterface
{
    /**
     * @param $id
     * get edit file
     * @return mixed
     */
    public function file($id);
    /**
     * @param Request $request
     * Store a newly created resource in storage
     * @return mixed
     */
    public function store(Request $request);

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id);
}
