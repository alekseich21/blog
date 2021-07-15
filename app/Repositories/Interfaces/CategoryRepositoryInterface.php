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
     * @param array $input
     * @return mixed
     */
    public function store(array $input);

    /**
     * @return mixed
     */
    public function all();
}
