@extends('layouts.app')
@section('content')

<div class="container text-center pt-5 pb-3">
    <h1 class="display-4 fw-bold text-dark-orange">All Recipes</h1>
</div>

<!-- admin privilages -->
@if(Auth::check() && Auth::user()->is_admin)
<div class="container py-5">
<a href="{{ route('recipes.create') }}" class="btn-orange">Add New Recipe</a>
@endif

@foreach ($recipes as $recipe)
<!-- Recipe Section -->
<div class="container py-5">
   <div class="post-item border-bottom pb-4 mb-4">
      <div class="row align-items-center">
         <!-- Image Section -->
         <div class="col-md-6 mb-4">
            <img class="img-fluid rounded" src="/storage/{{ $recipe->image }}" alt="Recipe Image">
         </div>

         <!-- Content Section -->
         <div class="col-md-6">
            <div class="text-box">
               <h2 class="text-light font-weight-bold text-uppercase">{{$recipe->title}}</h2>
               <span class="text-light font-weight-bold pt-3">By: {{ $recipe->user->name }} | 
               {{ $recipe->updated_at ? $recipe->updated_at->format('d-m-Y') : 'No Date Available' }}</span>
           
               <p class="text-muted-light py-3">
                  {{$recipe->description}}
               </p>
               <a href="/recipes/{{$recipe->id}}" class="btn-orange">Read More</a>
            </div>
         </div>
      </div>
   </div>
@endforeach

@endsection
