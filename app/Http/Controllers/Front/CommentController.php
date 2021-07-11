<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Repositories\Interfaces\CommentRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

/**
 * Class CommentController
 * @package App\Http\Controllers\Front
 */
class CommentController extends Controller
{
    /**
     * @var CommentRepositoryInterface
     */
    private $commentRepository;

    /**
     * CommentController constructor.
     * @param CommentRepositoryInterface $commentRepository
     */
    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * Store a newly created resource in storage
     * @param CommentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CommentRequest $request)
    {
        $this->commentRepository->store($request);

        return back();
    }

    /**
     * Store a newly created resource in storage
     * @param CommentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function replyStore(CommentRequest $request)
    {
        $this->commentRepository->replyStore($request);

        return back();
    }
}
