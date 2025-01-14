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
      </div>
   </div>
</div>

@endsection
