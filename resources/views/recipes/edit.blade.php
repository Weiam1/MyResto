@extends('layouts.app')
@section('content')

<div class="container text-center pt-5 pb-3">
    <h1 class="display-4 fw-bold text-dark-orange">Edit Recipe</h1>
</div>

<div class="container py-5">
    <form action="{{ route('recipes.update', $recipe->id) }}" 
          method="POST" 
          enctype="multipart/form-data" 
          class="p-4 rounded shadow-lg bg-light-beige">
        @csrf
        @method('PUT')

        <!-- Title Input -->
        <div class="mb-4">
            <label for="title" class="form-label fw-bold text-dark">Title</label>
            <input 
                type="text" 
                id="title"
                name="title" 
                value="{{ $recipe->title }}"
                class="form-control rounded-lg p-3 shadow-sm border"
                required>
        </div>

        <!-- Description Input -->
        <div class="mb-4">
            <label for="description" class="form-label fw-bold text-dark">Description</label>
            <textarea 
                id="description" 
                name="description" 
                rows="5"
                class="form-control rounded-lg p-3 shadow-sm border"
                required>{{ $recipe->description }}</textarea>
        </div>

        <!-- Ingredients Input -->
        <div class="mb-4">
            <label for="ingredients" class="form-label fw-bold text-dark">Ingredients</label>
            <textarea 
                id="ingredients" 
                name="ingredients" 
                rows="5"
                class="form-control rounded-lg p-3 shadow-sm border"
                required>{{ $recipe->ingredients }}</textarea>
        </div>

        <!-- Steps Input -->
        <div class="mb-4">
            <label for="steps" class="form-label fw-bold text-dark">Steps</label>
            <textarea 
                id="steps" 
                name="steps" 
                rows="5"
                class="form-control rounded-lg p-3 shadow-sm border"
                required>{{ $recipe->steps }}</textarea>
        </div>

        <!-- Category Input -->
        <div class="mb-4">
            <label for="category_id" class="form-label fw-bold text-dark">Category</label>
            <select 
                id="category_id" 
                name="category_id" 
                class="form-control rounded-lg p-3 shadow-sm border" 
                required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $recipe->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
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
                Update Recipe
            </button>
        </div>
    </form>
</div>

@endsection
