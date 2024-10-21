<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

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
        $recipe = Recipe::findOrFail($id);
        return response()->json($recipe);
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
}
