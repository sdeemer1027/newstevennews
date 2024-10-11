<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Display a list of blogs
    public function index()
    {
        $blogs = Blog::latest()->get(); // Fetch all blogs sorted by latest
        return view('blogs.index', compact('blogs'));
    }

    // Display a single blog post by slug
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail(); // Find the blog by slug
        return view('blogs.show', compact('blog'));
    }
}
