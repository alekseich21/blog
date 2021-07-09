<?php

namespace App\Http\Controllers;

use App\models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\models\File;

class SiteController extends Controller
{

    private $repo;

    public function __construct(PostRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $posts = $this->repo->all();

        return view('welcome', compact('posts'));
    }

    public function myPosts()
    {
        $posts = Post::where('user_id', Auth::user()->id)->get();

dd($posts);
        return view('welcome', compact('posts'));
    }

    public function popularPosts()
    {
        $posts = Post::orderBy('views', 'desc')->get();
        dd($posts);
        return view('welcome', compact('posts'));
    }

    public function postsWithoutComments()
    {
//        $posts = Post::with('comments')->has('comments')->count();

        $posts = Post::doesnthave('comments')->get();
        dd($posts);

        return view('welcome', compact('posts'));
    }
}
