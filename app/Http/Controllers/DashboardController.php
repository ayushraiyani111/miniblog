<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class DashboardController extends Controller
{
    public function show_posts(Request $request)
    {
        // Retrieve posts
        //$posts = Post::all();
        $userid = $request->user()->id;
        $posts = Post::where('user_id' , $userid)->get();
        
        // Pass the collection to the view
        return view('dashboard', ['posts' => $posts]);
    }
}
