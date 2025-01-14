@extends('layouts.app')
@section('content')

<div class="container text-center pt-5 pb-3">
    <h1 class="display-4 fw-bold text-dark-orange">Add New Recipe</h1>
</div>

<div class="container py-5">
    <form action="/recipes" 
          method="POST" 
          enctype="multipart/form-data" 
          class="p-4 rounded shadow-lg bg-light-beige">
        @csrf

        <!-- Title Input -->
        <div class="mb-4">
            <label for="title" class="form-label fw-bold text-dark">Title</label>
            <input 
                type="text" 
                id="title"
                name="title" 
                placeholder="Enter the title of your recipe"
                class="form-control rounded-lg p-3 shadow-sm border"
                required>
        </div>

        <!-- Description Input -->
        <div class="mb-4">
            <label for="description" class="form-label fw-bold text-dark">Description</label>
            <textarea 
                id="description" 
                name="description" 
                placeholder="Write the description of your recipe"
                rows="5"
                class="form-control rounded-lg p-3 shadow-sm border"
                required></textarea>
        </div>

        <!-- Ingredients Input -->
        <div class="mb-4">
            <label for="ingredients" class="form-label fw-bold text-dark">Ingredients</label>
            <textarea 
                id="ingredients" 
                name="ingredients" 
                placeholder="List the ingredients for your recipe"
                rows="5"
                class="form-control rounded-lg p-3 shadow-sm border"
                required></textarea>
        </div>

        <!-- Steps Input -->
        <div class="mb-4">
            <label for="steps" class="form-label fw-bold text-dark">Steps</label>
            <textarea 
                id="steps" 
                name="steps" 
                placeholder="Describe the preparation steps"
                rows="5"
                class="form-control rounded-lg p-3 shadow-sm border"
                required></textarea>
        </div>

      <!-- Category Input -->
<div class="mb-4">
    <label for="category" class="form-label fw-bold text-dark">Category</label>
    <select 
        id="category" 
        name="category" 
        class="form-control rounded-lg p-3 shadow-sm border" 
        required>
        <option value="" disabled selected>Select a category</option>
        <option value="Main Dish">Main Dish</option>
        <option value="Dessert">Dessert</option>
        <option value="Healthy">Healthy</option>
        <option value="Drinks">Drinks</option>
    </select>
</div>


        <!-- Image Upload -->
        <div class="mb-4">
            <label for="image" class="form-label fw-bold text-dark">Image</label>
            <input 
                type="file" 
                id="image" 
                name="image" 
                class="form-control p-2 shadow-sm border"
                accept="image/*">
        </div>

        
        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="btn-orange px-5 py-2">
                Submit Recipe
            </button>
        </div>
    </form>
</div>

@endsection
