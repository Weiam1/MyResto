@extends('layouts.app')
@section('content')

<div class="container text-center pt-5 pb-3">
    <h1 class="display-4 fw-bold text-dark-orange">All Recipes</h1>
</div>

<!-- Admin Privileges -->
@if(Auth::check() && Auth::user()->is_admin)
<div class="container py-5 text-center">
    <a href="{{ route('recipes.create') }}" class="btn-orange">Add New Recipe</a>
</div>
@endif

<!-- Recipes Section -->
<div class="container py-5">
    <div class="row g-4">
        @foreach ($recipes as $recipe)
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100 bg-light-beige">
                <img src="{{ asset('storage/' . $recipe->image) }}" class="card-img-top object-cover rounded" alt="Recipe Image">
                <div class="card-body">
                    <h5 class="card-title text-dark-orange">{{ $recipe->title }}</h5>
                    <p class="text-muted" style="font-size: 0.9rem;">By: {{ $recipe->user->name }} | {{ $recipe->updated_at ? $recipe->updated_at->format('d-m-Y') : 'No Date Available' }}</p>
                    <p class="text-dark">
                        {{ Str::limit($recipe->description, 100) }}
                    </p>
                    <a href="{{ route('recipes.show', $recipe->id) }}" class="btn-orange mt-3">Read More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
