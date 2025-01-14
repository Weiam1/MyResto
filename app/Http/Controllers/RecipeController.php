<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = Recipe::orderBy('published_at', 'desc')->get();
        return view('recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('recipes.create');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'ingredients' => 'required|string',
            'steps' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'category' => 'required|string',  // category validation
        ]);
    
        $imagePath = null;
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('recipes', 'public');
        }
    
        Recipe::create([
            'title' => $request->title,
            'description' => $request->description,
            'ingredients' => $request->ingredients,
            'steps' => $request->steps,
            'image' => $imagePath,
            'user_id' => Auth::id(),
            'category' => $request->category, 

        ]);
    
        return redirect()->route('recipes.index')->with('success', 'Recipe added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $recipe = Recipe::findOrFail($id);
        return view('recipes.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $recipe = Recipe::findOrFail($id);

        $request->validate([
        'title' => 'required|string|max:255',
    'description' => 'required|string',
    'ingredients' => 'required|string',
    'steps' => 'required|string',
    'image' => 'nullable|image|max:2048',
    'category' => 'required|string',  // Ensure category is validated

        ]);
    
        $path = $recipe->image;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('recipes', 'public');
        }
    
        $recipe->update([
            'title' => $request->title,
            'image' => $path,
            'ingredients' => $request->ingredients,
            'steps' => $request->steps,
            'category' => $request->category, 

        ]);
    
        return redirect()->route('recipes.index')->with('success', 'Recipe updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $recipe = Recipe::findOrFail($id);
    $recipe->delete();

    return redirect()->route('recipes.index')->with('success', 'Recipe deleted successfully!');

    }

    public function category($category)
{
    $recipes = Recipe::where('category', $category)->orderBy('published_at', 'desc')->get();
    return view('recipes.category', compact('recipes', 'category'));
}

}
