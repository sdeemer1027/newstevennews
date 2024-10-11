<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Blog;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // Store a new comment for a blog post
    public function store(Request $request, Blog $blog)
    {
        $request->validate([
            'content' => 'required|string|max:500'
        ]);

        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->user_id = auth()->id(); // Get the authenticated user ID
        $comment->blog_id = $blog->id; // Associate the comment with the blog post
        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully!');
    }
}
