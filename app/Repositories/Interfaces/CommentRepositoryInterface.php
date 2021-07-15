<?php


namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

/**
 * Interface CommentRepositoryInterface
 * @package App\Repositories\Interfaces
 */
interface CommentRepositoryInterface
{
    /**
     * @param array $input
     * @return mixed
     */
    public function store(array $input);

    /**
     * @param array $input
     * @return mixed
     */
    public function replyStore(array $input);

}
