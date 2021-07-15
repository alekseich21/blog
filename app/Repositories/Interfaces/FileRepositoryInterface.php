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
     * @param int $id
     * @return mixed
     */
    public function file(int $id);

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
    public function update(array $input, int $id);
}
