<?php

namespace App\Http\Controllers;

use App\models\Avatar;
use App\models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::where('user_id', Auth::user()->id)->get();

        return view('home', compact('posts'));
    }
}
