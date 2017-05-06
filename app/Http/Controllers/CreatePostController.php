<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class CreatePostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
        $post = Post::create($request->all());

        return $post->title;
        return view('posts.create',compact('post'));
    }
}