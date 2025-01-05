@extends('layouts.app')
@section('content')


<!-- HERO-->
<div class="hero-bg-image">
   <h1 class="hero-title">Welcome to Our Recipe Website</h1>
   <a href="/" class="hero-btn">Explore Recipes</a>
</div>


<!-- RECIPE CARD -->
<div class="container py-5">
   <div class="row align-items-center">
      <!-- Image Section -->
      <div class="col-md-6 mb-4">
         <img class="img-fluid rounded" src="/images/img1.jpg" alt="Recipe Image">
      </div>
      
      <!-- Content Section -->
      <div class="col-md-6">
         <div class="text-box">
            <h2 class="text-light font-weight-bold text-uppercase">How to be an Expert in 2023</h2>
            <p class="text-light font-weight-bold pt-3">This is the best recipe</p>
            <p class="text-muted-light py-3">
               This recipe website offers a variety of cooking techniques, from simple to complex, that will help you become an expert in 2023. From making delicious pastries to mastering your favorite dishes, these recipes will guide you through the process and help you unlock your culinary potential.
            </p>
            <a href="/" class="btn-orange">Read More</a>
         </div>
      </div>
   </div>



@endsection
