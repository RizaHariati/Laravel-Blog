<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\User;

class PostController extends Controller
{

    public function index()

    {
        $post = Post::latest();
        $filters = request(['search', 'category', 'user']);
        $postfilter = $post->filter($filters);

        $title = "Latest Blog Post";

        if (array_key_exists('category', $filters)) {
            $slug = $filters['category'];
            $category = Category::firstWhere('slug', $slug)->name;
            $title = "Posts on $category";
        }

        if (array_key_exists('user', $filters)) {
            $username = $filters['user'];
            $author = User::firstWhere('username', $username)->name;
            $title = "Posts by " . $author;
        }

        if (array_key_exists('search', $filters) && $post->count() < 1) {
            $title = "Post with keyword : " . request('search') . " isn't found";
        }

        return view('main.posts', [
            'title' => $title,
            'active' => 'posts',
            'posts' => $postfilter->paginate(7)->withQueryString()
        ]);
    }


    public function create()
    {
        //
    }


    public function store(StorePostRequest $request)
    {
        //
    }


    public function show(Post $post)
    {
        return view("main.post", [
            'title' => $post->title,
            'active' => "posts",
            'post' => $post

        ]);
    }

    public function edit(Post $post)
    {
        //
    }


    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }


    public function destroy(Post $post)
    {
        //
    }
}
