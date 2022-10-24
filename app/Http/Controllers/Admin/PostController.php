<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);
        $categories = Category::all();
        return view('admin.posts.index', compact('posts', 'categories'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Post::create($data);
        return view('admin.posts.create');
    }
}
