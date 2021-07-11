<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

/**
 * Class SiteController
 * @package App\Http\Controllers\Front
 */
class SiteController extends Controller
{

    /**
     * @var PostRepositoryInterface
     */
    private $postRepository;

    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * SiteController constructor.
     * @param PostRepositoryInterface $postRepository
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(PostRepositoryInterface $postRepository, UserRepositoryInterface $userRepository)
    {
        $this->postRepository = $postRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = $this->postRepository->all();

        return view('index', compact('posts'));
    }

    /**
     * @param $id
     * Show User Account
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showProfile($id)
    {
        $user = $this->userRepository->showProfile($id);

        return view('user.profile', compact('user'));
    }

    /**
     * Show User Posts
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function myPosts()
    {
        $myPosts = $this->postRepository->authorPosts();

        return view('posts.my-posts', compact('myPosts'));
    }

    /**
     * Show Popular Posts
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function popularPosts()
    {
        $posts = $this->postRepository->popularPosts();

        return view('posts.popular-posts', compact('posts'));
    }

    /**
     * Show Posts Without Comments
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postsWithoutComments()
    {
        $posts = $this->postRepository->postsWithoutComments();

        return view('posts.posts-without-comments', compact('posts'));
    }


}
