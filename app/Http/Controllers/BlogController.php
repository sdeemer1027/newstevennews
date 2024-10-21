<?php
namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    // Show blog creation form
    public function create()
    {
        // Check if the authenticated user has ID = 1
        if (Auth::id() != 1) {
        //    return redirect()->route('home')->with('error', 'Unauthorized access.');
            return redirect()->back()->with('toast_message', 'Unauthorized access. <br> Adding of Blogs are currently set for admin only');

        }

        $categories = Category::all(); // Fetch all categories
        return view('blogs.create', compact('categories'));
    }

    // Store the new blog post
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'content' => 'required|string',
            'categories' => 'required|array',
        ]);

        // Create the blog post with the authenticated user as the author
 //       Blog::create([
 //           'title' => $request->title,
 //           'slug' => $request->slug,
 //           'content' => $request->content,
 //           'user_id' => Auth::id(),
 //       ]);
        $blog = Blog::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'slug' => $request->slug,
            'category' => Category::find($request->input('categories')[0])->name ?? null,
            'user_id' => Auth::id(),
        ]);
        // Attach selected categories to the blog
        $blog->categories()->attach($request->input('categories'));

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }

    // List blogs (optional)
    public function index()
    {
        // Eager load categories to avoid N+1 problem
        $blogs = Blog::with('categories')->get();
        $categories = Category::all();

        return view('blogs.index', compact('blogs','categories'));
    }
    public function showByCategory($category)
    {
        $category = Category::where('name', $category)->firstOrFail(); // Assuming your Category model has a slug field
        $blogs = Blog::where('category', $category->name)->paginate(10); // Assuming your Blog model has category_id
        $categories = Category::all();
        return view('blogs.category', compact('category', 'blogs','categories'));
    }

    public function show($category, $slug)
    {
        $category = Category::where('name', $category)->firstOrFail(); // Get category by slug
        $blog = Blog::where('slug', $slug)
            ->where('category', $category->name)
            ->firstOrFail(); // Get blog by slug and category

        return view('blogs.show', compact('blog', 'category'));
    }

    public function edit($slug)
    {
        // Find the blog by slug
        $blog = Blog::where('slug', $slug)->firstOrFail();

        // Return the edit view with the blog data
        return view('blogs.edit', compact('blog'));
    }
    public function update(Request $request, $slug)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required', // HTML content
            'slug' => 'required|string|unique:blogs,slug,' . $slug . ',slug', // Slug must be unique except the current blog
        ]);

        // Find the blog by slug
        $blog = Blog::where('slug', $slug)->firstOrFail();

        // Update the blog fields
        $blog->title = $request->input('title');
        $blog->category = $request->input('category');
        $blog->content = $request->input('content'); // Assume content stores HTML
        $blog->slug = $request->input('slug');

        // Save the changes
        $blog->save();

        // Redirect to the blog show page
        return redirect()->route('blogs.show', $blog->slug)->with('success', 'Blog updated successfully.');
    }

}
