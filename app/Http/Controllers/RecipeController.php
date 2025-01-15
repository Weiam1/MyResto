<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = Recipe::orderBy('created_at', 'desc')->get();
          return view('recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all(); // Fetch all categories
        return view('recipes.create', compact('categories'));
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
'category_id' => 'required|exists:categories,id',        ]);
    
        $imagePath = $request->hasFile('image')
        ? $request->file('image')->store('recipes', 'public')
        : null;

    Recipe::create([
        'title' => $request->title,
        'description' => $request->description,
        'ingredients' => $request->ingredients,
        'steps' => $request->steps,
        'image' => $imagePath,
        'user_id' => Auth::id(),
        'category_id' => $request->category_id, // Save the category_id
    ]);

    return redirect()->route('recipes.index')->with('success', 'Recipe added successfully!');
}
    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $recipe = Recipe::with('comments.user')->findOrFail($id);
        return view('recipes.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $recipe = Recipe::findOrFail($id);
        $categories = Category::all(); // Fetch all categories for editing
        return view('recipes.edit', compact('recipe', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        
        $recipe = Recipe::findOrFail($id);

        $request->validate([
        'title' => 'required|string|max:255',
    'description' => 'required|string',
    'ingredients' => 'required|string',
    'steps' => 'required|string',
    'image' => 'nullable|image|max:2048',
    'category_id' => 'required|exists:categories,id', // Validate category_id

        ]);
    
        $path = $recipe->image;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('recipes', 'public');
        }
    
        $recipe->update([
        'title' => $request->title,
        'description' => $request->description,
        'ingredients' => $request->ingredients,
        'steps' => $request->steps,
        'image' => $path,
        'category_id' => $request->category_id,
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
        $categoryModel = Category::where('name', $category)->firstOrFail();
        $recipes = $categoryModel->recipes()->orderBy('published_at', 'desc')->get();
        return view('recipes.category', compact('recipes', 'category'));
    }
    
    
}
