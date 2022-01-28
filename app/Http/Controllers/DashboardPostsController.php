<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class DashboardPostsController extends Controller
{

    public function index()
    {
        $posts = Post::latest()->where('user_id', auth()->user()->id)->get();
        return view('dashboard.posts.index', [
            'title' => auth()->user()->name . "'s Posts",
            'posts' => $posts,
        ]);
    }


    public function show(Post $post)
    {

        if ($post->user->id !== auth()->user()->id) {
            abort(403);
        }
        return view('dashboard.posts.post', [
            'title' => $post->title,
            'post' => $post
        ]);
    }


    public function create()
    {
        return view('dashboard.posts.create', [
            'title' => 'Create new Post',
            'categories' => Category::all()
        ]);
    }

    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return back()->with('deleted', 'Post has been deleted');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts',
            'body' => 'required',
            'category_id' => 'required'
        ]);

        if ($validated) {
            // $slug = Str::slug($request->title, '-');
            $validated['user_id'] = auth()->user()->id;
            $validated['excerpt'] = Str::limit(strip_tags($request->body, 200));

            Post::create($validated);
            return redirect('dashboard/posts')->with('create', "New Post successfully created");
        }
        return back();
    }



    public function edit(Post $post)
    {

        if ($post->user->id !== auth()->user()->id) {
            abort(403);
        }
        return view("dashboard.posts.edit", [
            'title' => "Edit Post",
            "post" => $post,
            "categories" => Category::all(),
        ]);
    }


    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required',
            'slug' => $request->slug === $post->slug ? 'required' : 'required|unique:posts',
            // 'slug' =>'required|unique:posts',
            'body' => 'required',
            'category_id' => 'required'
        ]);

        if ($validated) {
            // $slug = Str::slug($request->title, '-');
            $validated['user_id'] = auth()->user()->id;
            $validated['excerpt'] = Str::limit(strip_tags($request->body, 200));

            Post::where('id', $post->id)->update($validated);
            return redirect('dashboard/posts')->with('create', "New Post successfully updated");
        }
        return back();
        // Post::update($validated);
        // return redirect('dashboard/posts')->with('create', "New Post successfully updated");

    }


    public function checkSlug(Request $request)
    {

        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}
