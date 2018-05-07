<?php

namespace App\Http\Controllers;

use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::with('user', 'category', 'tags')->get();

        return $posts;
    }
}
