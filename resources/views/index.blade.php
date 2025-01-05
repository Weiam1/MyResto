@extends('layouts.app')
@section('content')


<!-- HERO-->
<div class="hero-bg-image">
   <h1 class="hero-title">Welcome to Our Recipe Website</h1>
   <a href="/" class="hero-btn">Explore Recipes</a>
</div>


<!-- Post section -->
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


 <!-- Blog Categories -->
<div class="blog-categories">
   <h2 class="blog-title">Blog Categories</h2>
   <div class="container">
      <div class="row row-cols-2 row-cols-md-4 g-3">
         <div class="col">
            <a href="#lunch" class="blog-category">Lunch</a>
         </div>
         <div class="col">
            <a href="#healthy" class="blog-category">Healthy</a>
         </div>
         <div class="col">
            <a href="#dessert" class="blog-category">Dessert</a>
         </div>
         <div class="col">
            <a href="#drinks" class="blog-category">Drinks</a>
         </div>
      </div>
   </div>
</div>


<!-- Sections -->
<!-- Lunch Section -->
<div id="lunch" class="category-section">
   <h3 class="category-title">Lunch Recipes</h3>
   <p>Here are some delicious lunch recipes...</p>
</div>

<!-- Healthy Section -->
<div id="healthy" class="category-section">
   <h3 class="category-title">Healthy Recipes</h3>
   <p>Here are some healthy recipes for a better lifestyle...</p>
</div>

<!-- Dessert Section -->
<div id="dessert" class="category-section">
   <h3 class="category-title">Dessert Recipes</h3>
   <p>Indulge in our selection of sweet dessert recipes...</p>
</div>

<!-- Drinks Section -->
<div id="drinks" class="category-section">
   <h3 class="category-title">Drinks Recipes</h3>
   <p>Cool down or warm up with these drink recipes...</p>
</div>


<!-- News Section -->
<div class="container text-center py-5">
   <h2 class="text-dark-orange font-weight-bold mb-4" style="font-size: 2.5rem;">Latest News & Cooking Tips</h2>
   <p class="text-light-beige px-3">
      Stay updated with the latest news and tips to enhance your cooking skills. Explore new techniques and ideas to elevate your culinary journey.
   </p>
</div>

<div class="container py-5">
   <div class="row g-4">
      <!-- News Item 1 -->
      <div class="col-md-6">
         <div class="card border-0 shadow-sm h-100 bg-light-beige">
            <img src="/images/img1.jpg" class="card-img-top object-cover rounded" alt="News Image">
            <div class="card-body">
               <h5 class="card-title text-dark-orange">5 Tips to Master Baking</h5>
               <p class="text-muted" style="font-size: 0.9rem;">Published on: January 5, 2025</p>
               <p class="text-dark">
                  Learn the secrets to perfect baking with these simple yet effective tips. Transform your desserts into delightful masterpieces.
               </p>
               <a href="/news/1" class="btn-orange mt-3">Read More</a>
            </div>
         </div>
      </div>

      <!-- News Item 2 -->
      <div class="col-md-6">
         <div class="card border-0 shadow-sm h-100 bg-light-beige">
            <img src="/images/img1.jpg" class="card-img-top object-cover rounded" alt="News Image">
            <div class="card-body">
               <h5 class="card-title text-dark-orange">Healthy Cooking: Quick and Easy Tips</h5>
               <p class="text-muted" style="font-size: 0.9rem;">Published on: January 3, 2025</p>
               <p class="text-dark">
                  Discover how to prepare quick, healthy meals with these expert tips that will save you time without compromising on nutrition.
               </p>
               <a href="/news/2" class="btn-orange mt-3">Read More</a>
            </div>
         </div>
      </div>
   </div>
</div>


@endsection
