<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Category;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {
        $posts = Post::with('user', 'category', 'tags')->latest()->paginate(15);
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $post->load('user', 'category', 'tags');
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create', compact('categories', 'tags'));
    }

    public function store(PostRequest $request)
    {
        $post = auth()->user()->createPostWithTagsFrom($request);

        return redirect()->route('posts.show', $post);
    }
}
