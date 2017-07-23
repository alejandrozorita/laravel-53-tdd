<?php

namespace App\Http\Controllers;

use App\{Comment, Post};

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        auth()->user()->comment($post, $request->get('comment'));

        return redirect($post->url);
    }


    public function accept(Comment $comment)
    {
        return redirect($comment->post->url);
    }
}
