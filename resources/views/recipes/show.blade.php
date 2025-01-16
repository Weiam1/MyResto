@extends('layouts.app')
@section('content')

<div class="container text-center pt-5 pb-3">
    <h1 class="display-4 fw-bold text-dark-orange">{{ $recipe->title }}</h1>
</div>

<div class="container py-5">
   <div class="post-item border-bottom pb-4 mb-4">
      <div class="row align-items-center">
         <!-- Image Section -->
         <div class="col-md-6 mb-4">
            <img class="img-fluid rounded" src="/storage/{{ $recipe->image }}" alt="Recipe Image">
         </div>

         <!-- Content Section -->
         <div class="col-md-6">
            <h3>Ingredients</h3>
            <p>{{ $recipe->ingredients }}</p>
            <h3>Steps</h3>
            <p>{{ $recipe->steps }}</p>
            <p class="text-muted">
                Published on: 
                {{ $recipe->created_at ? $recipe->created_at->format('d-m-Y') : 'Date not available' }}
                by 
                {{ $recipe->user ? $recipe->user->name : 'Unknown author' }}
            </p>
            
         </div>
         
         <div class="container py-5">
    <h1 class="display-4 fw-bold text-dark-orange">{{ $recipe->title }}</h1>
    <p class="text-muted">{{ $recipe->description }}</p>

    <!-- Rating Section -->
    <div>
    <h3>Average Rating: {{ $recipe->averageRating() ?? 'Not rated yet' }}</h3>
</div>
@if(Auth::check())
    <form action="{{ route('recipes.rate', $recipe->id) }}" method="POST" class="mt-3">
        @csrf
        <label for="rating">Rate this recipe:</label>
        <select name="rating" id="rating" class="form-control" required>
            <option value="" disabled selected>Choose rating</option>
            @for($i = 1; $i <= 5; $i++)
                <option value="{{ $i }}">{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
            @endfor
        </select>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
@endif


    <!-- Comments Section -->
    <div class="comments-section mt-5">
        <h3>Comments</h3>
        
        <!-- Display Comments -->
        @foreach ($recipe->comments as $comment)
            <div class="mb-4">
                <strong>
                    <a href="{{ route('profile.show', ['username' => $comment->user->username]) }}">
                        {{ $comment->user->name }}
                    </a>
                </strong>
                <p>{{ $comment->content }}</p>
                <hr>
            </div>
        @endforeach

        <!-- Add Comment -->
        @auth
        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
            <textarea name="content" rows="4" class="form-control" placeholder="Write your comment..." required></textarea>
            <button type="submit" class="btn btn-primary mt-3">Add Comment</button>
        </form>
        @else
        <p>You need to <a href="{{ route('login') }}">log in</a> to add a comment.</p>
        @endauth
    </div>
</div>
    </div>
</div>
@if(Auth::check() && Auth::user()->is_admin)
    <a href="{{ route('recipes.edit', $recipe->id) }}" class="btn btn-warning btn-sm">
        Edit Recipe
    </a>
@endif
@if(Auth::check() && Auth::user()->is_admin)
    <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">
            Delete Recipe
        </button>
    </form>
@endif

      </div>
   </div>
</div>


@endsection
