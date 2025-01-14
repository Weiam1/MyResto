@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">{{ $category }} Recipes</h1>
    <div class="row">
        @foreach ($recipes as $recipe)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('storage/' . $recipe->image) }}" class="card-img-top" alt="Recipe Image">
                <div class="card-body">
                    <h5 class="card-title">{{ $recipe->title }}</h5>
                    <p class="card-text">{{ Str::limit($recipe->ingredients, 50) }}</p>
                    <a href="{{ route('recipes.show', $recipe->id) }}" class="btn btn-primary">View Recipe</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
