<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function show_post()
    {
        // Retrieve all posts
        $posts = Post::all();
        $posts = Post::paginate(10);
        
        // Pass the collection to the view
        return view('home', ['posts' => $posts]);
    }
}
