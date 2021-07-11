<?php


namespace App\Repositories\Interfaces;

/**
 * Interface UserRepositoryInterface
 * @package App\Repositories\Interfaces
 */
interface UserRepositoryInterface
{
    /**
     * show user profile
     * @param $id
     * @return mixed
     */
    public function showProfile($id);
}
