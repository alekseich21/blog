<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Repositories\Interfaces\TagRepositoryInterface;
use Illuminate\Http\Request;

/**
 * Class PostController
 * @package App\Http\Controllers\Front
 */
class PostController extends Controller
{
    /**
     * @var PostRepositoryInterface
     */
    private $postRepository;

    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * @var TagRepositoryInterface
     */
    private $tagRepository;

    /**
     * PostController constructor.
     * @param PostRepositoryInterface $repository
     * @param CategoryRepositoryInterface $categoryRepository
     * @param TagRepositoryInterface $tagRepository
     */
    public function __construct
    (
        PostRepositoryInterface $repository,
        CategoryRepositoryInterface $categoryRepository,
        TagRepositoryInterface $tagRepository
    )
    {
        $this->postRepository = $repository;
        $this->categoryRepository = $categoryRepository;
        $this->tagRepository = $tagRepository;
    }

    /**
     * Show the form for creating a new resource
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = $this->categoryRepository->all();
        $tags = $this->tagRepository->all();

        return view('posts.create', compact('categories', 'tags'));
    }

    /**
     * @param PostRequest $request
     * Store a newly created resource in storage
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostRequest $request)
    {
        $this->postRepository->store($request->all());

        return redirect()->route('home');
    }

    /**
     * @param $id
     * show post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showPost($id)
    {
        $post = $this->postRepository->showPost($id);

        return view('posts.post', compact('post'));
    }

    /**
     * @param $id
     * show edit form
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $categories = $this->categoryRepository->all();
        $tags = $this->tagRepository->all();
        $post = $this->postRepository->showPost($id);

        return view('posts.edit', compact('categories', 'tags', 'post'));
    }

    /**
     * @param PostRequest $request
     * Update Post
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PostRequest $request, $id)
    {
        $this->postRepository->update($request->all(), $id);

        return redirect()->route('index');
    }


}
