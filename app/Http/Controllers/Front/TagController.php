<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Repositories\Interfaces\TagRepositoryInterface;
use Illuminate\Http\Request;

/**
 * Class TagController
 * @package App\Http\Controllers\Front
 */
class TagController extends Controller
{
    /**
     * @var TagRepositoryInterface
     */
    private $repository;

    /**
     * TagController constructor.
     * @param TagRepositoryInterface $repository
     */
    public function __construct(TagRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Show the form for creating a new resource
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * @param TagRequest $request
     * Store a newly created resource in storage
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TagRequest $request)
    {
        $this->repository->store($request);

        return redirect()->route('home');
    }

    /**
     * Show Tag Posts
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showTag($id)
    {
        $postTags = $this->repository->showTag($id);

        return view('posts.posts-tag', compact('postTags'));
    }

}
