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
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request);

    /**
     * @param Request $request
     * @return mixed
     */
    public function replyStore(Request $request);

}
