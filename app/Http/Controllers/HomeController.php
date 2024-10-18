<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get(); // Fetch all blogs sorted by latest
        return view('welcome', compact('blogs'));
    }
    public function resume()
    {
        $blogs = Blog::latest()->get(); // Fetch all blogs sorted by latest
        return view('resume', compact('blogs'));
    }
}
