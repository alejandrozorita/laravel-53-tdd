<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreatePostController extends Controller
{
    public function create()
    {
        return view('post.create');
    }


    public function store()
    {
        
    }
}
