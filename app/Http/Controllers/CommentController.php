<?php

namespace App\Http\Controllers;

use App\models\Comment;
use Illuminate\Http\Request;
use App\models\Post;

class CommentController extends Controller
{
    public function addComment(Request $request)
    {

        //vmy version work
//        $params = $request->all();//dd($params);
//        Comment::create($params);
//
//        return redirect()->back()->with('success', 'Комментарий добавлен');
        //vmy version work


        $params = $request->all();//dd($params);
        $comment = new Comment;
        $comment->comment = $request->get('comment');
        $comment->user()->associate($request->user());
        $post = Post::find($request->get('post_id'));
        $post->comments()->save($comment);

dd(123);

    }
}
