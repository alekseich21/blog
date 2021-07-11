<?php


namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

/**
 * Interface CategoryRepositoryInterface
 * @package App\Repositories\Interfaces
 */
interface CategoryRepositoryInterface
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request);

    /**
     * @return mixed
     */
    public function all();
}
