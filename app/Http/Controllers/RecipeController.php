<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use PhpParser\Comment;

class RecipeController extends Controller
{
    // List all recipes
    public function index()
    {
        $recipes = Recipe::all();
        return response()->json($recipes);
    }

    // Show a single recipe
    public function show($id)
    {

        $recipe = Recipe::with(['comments.user', 'category', 'recipes','ratings'])
        ->withCount('ratings')        // this will add a 'ratings_count' attribute
        ->findOrFail($id);
 //       $recipe = Recipe::findOrFail($id);
    //    return response()->json($recipe);

        return view('recipes.show', compact('recipe'));
    }
    public function addComment(Request $request, $id)
    {
        $request->validate([
            'body' => 'required|max:500'
        ]);
//dd($request, $id);
        Comment::create([
            'body' => $request->body,
            'user_id' => auth()->id(),
            'recipe_id' => $id,
        ]);

        return back()->with('message', 'Comment added successfully');
    }
    // Add a new recipe
    public function store(Request $request)
    {
        $data = $request->validate([
            'text' => 'required',
            'ingredients' => 'required',
            'directions' => 'required',
            'food_id' => 'required|exists:foods,id',
            'picture_url' => 'nullable|url'
        ]);

        $recipe = Recipe::create($data);
        return response()->json($recipe);
    }

    // Update an existing recipe
    public function update(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);

        $data = $request->validate([
            'text' => 'required',
            'ingredients' => 'required',
            'directions' => 'required',
            'food_id' => 'required|exists:foods,id',
            'picture_url' => 'nullable|url'
        ]);

        $recipe->update($data);
        return response()->json($recipe);
    }

    // Soft delete a recipe
    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();
        return response()->json(['message' => 'Recipe deleted successfully']);
    }





    public function rate(Request $request, $recipeId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $recipe = Recipe::findOrFail($recipeId);

        // Check if user has already rated this recipe
        $existingRating = $recipe->ratings()->where('user_id', Auth::id())->first();

        if ($existingRating) {
            // Update existing rating
            $existingRating->update(['rating' => $request->rating]);
        } else {
            // Create new rating
            $recipe->ratings()->create([
                'user_id' => Auth::id(),
                'rating' => $request->rating,
            ]);
        }

        return redirect()->back()->with('success', 'Thank you for rating this recipe!');
    }




}
