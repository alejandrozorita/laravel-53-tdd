<?php

namespace App\Http\Controllers;

use App\{Post, Comment};

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $comment = Comment::create([
            'comment' => $request->get('comment'),
            'post_id' => $post->id,
        ]);

        auth()->user()->comments()->save($comment);
    }
}
