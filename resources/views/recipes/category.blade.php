@extends('layouts.app')

@section('content')
<div class="container text-center pt-5 pb-3">
    <h1 class="display-4 fw-bold text-dark-orange">{{ $category }} Recipes</h1>
</div>

<div class="container py-5">
    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach ($recipes as $recipe)
        <div class="col">
            <div class="card border-0 shadow-sm h-100 bg-light-beige">
                <img src="{{ asset($recipe->image) }}" class="card-img-top object-cover rounded" alt="Recipe Image">
                <div class="card-body">
                    <h5 class="card-title text-dark-orange">{{ $recipe->title }}</h5>
                    <p class="text-muted" style="font-size: 0.9rem;">{{ Str::limit($recipe->ingredients, 50) }}</p>
                    <a href="{{ route('recipes.show', $recipe->id) }}" class="btn-orange mt-3">View Recipe</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
