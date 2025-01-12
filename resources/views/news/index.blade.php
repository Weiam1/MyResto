@extends('layouts.app')
@section('content')

<div class="container text-center pt-5 pb-3">
    <h1 class="display-4 fw-bold text-dark-orange">All News</h1>
</div>


<!-- admin privilages -->
@if(Auth::check() && Auth::user()->is_admin)
<div class="container py-5">
    <a href="/news/create" class="btn-orange">Add New Post</a>
</div>
@endif

@foreach ($news as $item)






<!-- Post Section -->
<div class="container py-5">
   <!-- Post 1 -->
   <div class="post-item border-bottom pb-4 mb-4">
      <div class="row align-items-center">
         <!-- Image Section -->
         <div class="col-md-6 mb-4">
            <img class="img-fluid rounded" src="/images/{{$item->image}}" alt="Recipe Image">
         </div>

         <!-- Content Section -->
         <div class="col-md-6">
            <div class="text-box">
               <h2 class="text-light font-weight-bold text-uppercase">{{$item->title}}</h2>
               <span class="text-light font-weight-bold pt-3">By: {{ $item->user->name }} | 
               {{ $item->updated_at ? $item->updated_at->format('d-m-Y') : 'No Date Available' }}</span>
           
               <p class="text-muted-light py-3">
                  {{$item->description}}
               </p>
               <a href="/news/{{$item->slug}}" class="btn-orange">Read More</a>
            </div>
         </div>
      </div>
   </div>


    
@endforeach
@endsection