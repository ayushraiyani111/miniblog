<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('post');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $user = $request->user();
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $user->posts()->save($post); // Correct relationship method
        return redirect()->route('posts.index')->with('status', 'Post Added'); // Correct route name
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);
    
        $validated['user_id'] = Auth::id();
        Post::create($validated);
    
        return redirect()->route('posts.index')->with('status', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        return view('edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect()->route('dashboard')->with('status', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::destroy($id);
        return redirect(route('dashboard'))->with('status','Post Deleted !!');
    }
}
