<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Recipe;


class SavedRecipeController extends Controller
{
    public function saveRecipe(Request $request, $recipeId)
    {
        $user = Auth::user();
        $recipe = Recipe::findOrFail($recipeId);

        
        $user->savedRecipes()->attach($recipe);

        return back()->with('success', 'Recipe saved successfully!');
    }

    public function unsaveRecipe($recipeId)
    {
        $user = Auth::user();

      
        $user->savedRecipes()->detach($recipeId);

        return back()->with('success', 'Recipe removed from saved recipes!');
    }

    public function showSavedRecipes()
    {
        $user = Auth::user();
        $recipes = $user->savedRecipes;

        return view('profile.saved-recipes', compact('recipes'));
    }
}
