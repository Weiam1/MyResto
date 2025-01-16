@extends('layouts.app')
@section('content')

<div class="container text-center py-5">
    <h1 class="display-4">Saved Recipes</h1>
</div>

<div class="container">
    <div class="row">
        @forelse ($recipes as $recipe)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $recipe->image) }}" class="card-img-top" alt="Recipe Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $recipe->title }}</h5>
                        <a href="{{ route('recipes.show', $recipe->id) }}" class="btn btn-primary">View Recipe</a>
                        <form action="{{ route('recipes.unsave', $recipe->id) }}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p>No saved recipes yet!</p>
        @endforelse
    </div>
</div>

@endsection
