@extends('layouts.app')

@section('content')
<div class="container text-center pt-5 pb-3">
    <h1 class="display-4 fw-bold text-dark-orange">{{ $recipe->title }}</h1>
</div>

<div class="container py-5">
    <!-- Main Recipe Content -->
    <div class="row">
        <!-- Image Section -->
        <div class="col-md-5 mb-4">
            <div class="bg-white p-4 rounded shadow-sm">
                <img class="img-fluid rounded" src="{{ asset($recipe->image) }}" alt="Recipe Image">
            </div>
        </div>

        <!-- Ingredients and Steps -->
        <div class="col-md-7">
            <div class="bg-light p-4 rounded shadow-sm mb-4">
                <h3 class="text-dark-orange">Ingredients</h3>
                <p class="text-dark">{{ $recipe->ingredients }}</p>
            </div>

            <div class="bg-light p-4 rounded shadow-sm">
                <h3 class="text-dark-orange">Steps</h3>
                <p class="text-dark">{{ $recipe->steps }}</p>
            </div>
        </div>
    </div>

    <!-- Additional Information -->
    <div class="bg-white p-4 rounded shadow-sm mb-4">
        <p class="text-dark">Published on: {{ $recipe->created_at ? $recipe->created_at->format('d-m-Y') : 'Date not available' }}</p>
        <p class="text-dark">By: {{ $recipe->user ? $recipe->user->name : 'Unknown author' }}</p>
    </div>

    <!-- Save/Unsave Buttons -->
    <div class="text-center mb-4">
        @if(Auth::check() && Auth::user()->savedRecipes->contains($recipe->id))
            <form action="{{ route('recipes.unsave', $recipe->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Unsave Recipe</button>
            </form>
        @else
            <form action="{{ route('recipes.save', $recipe->id) }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-orange">Save Recipe</button>
            </form>
        @endif
    </div>

    <!-- Ratings -->
    <div class="bg-light p-4 rounded shadow-sm mb-4">
        <h3 class="text-dark-orange">Average Rating: {{ $recipe->averageRating() ?? 'Not rated yet' }}</h3>
        @if(Auth::check())
        <form action="{{ route('recipes.rate', $recipe->id) }}" method="POST" class="mt-3">
            @csrf
            <label for="rating" class="text-dark">Rate this recipe:</label>
            <select name="rating" id="rating" class="form-control" required>
                <option value="" disabled selected>Choose rating</option>
                @for($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                @endfor
            </select>
            <button type="submit" class="btn btn-orange mt-2">Submit</button>
        </form>
        @endif
    </div>

    <!-- Comments Section -->
    <div class="bg-white p-4 rounded shadow-sm">
        <h3 class="text-dark-orange">Comments</h3>
        @foreach ($recipe->comments as $comment)
            <div class="mb-4">
                <strong class="text-dark-orange">
                    <a href="{{ route('profile.show', ['username' => $comment->user->username]) }}">
                        {{ $comment->user->name }}
                    </a>
                </strong>
                <p class="text-dark">{{ $comment->content }}</p>
                <hr>
            </div>
        @endforeach

        @auth
        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
            <textarea name="content" rows="4" class="form-control" placeholder="Write your comment..." required></textarea>
            <button type="submit" class="btn btn-orange mt-3">Add Comment</button>
        </form>
        @else
        <p>You need to <a href="{{ route('login') }}">log in</a> to add a comment.</p>
        @endauth
    </div>

    <!-- Admin Actions -->
    @if(Auth::check() && Auth::user()->is_admin)
    <div class="text-center mt-4">
        <a href="{{ route('recipes.edit', $recipe->id) }}" class="btn btn-warning btn-sm">Edit Recipe</a>
        <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Delete Recipe</button>
        </form>
    </div>
    @endif
</div>
@endsection
