<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('user_id', Auth()->user()->id)->get();
        return view('post.index', compact('posts'));
    }

  

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('post.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required',
            'cover' => 'mimes:png,jpg,jpeg|max:5048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $post = new Post();
        $post->user_id = Auth()->user()->id;
        $post->title = $request->title;
        $post->description = $request->description;
        if ($request->hasFile('cover')) {
            $post->cover = $request->file('cover')->store('posts');
        }
        $post->category_id = $request->category_id;
        $post->save();
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $postDetails = Post::findOrfail($id);
        return view('post.show',compact(['postDetails']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
