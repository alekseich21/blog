<?php


namespace App\Repositories\Interfaces;


interface PostRepositoryInterface
{
    public function all();

    public function create();

    public function update($id);

    public function delete($id);
}
