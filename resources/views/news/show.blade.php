@extends('layouts.app')
@section('content')



<div class="container text-center pt-5 pb-3">
    <h1 class="display-4 fw-bold text-dark-orange">{{$news->title}}</h1>
</div>




<!-- Post Section -->
<div class="container py-5">
   <!-- Post 1 -->
   <div class="post-item border-bottom pb-4 mb-4">
      <div class="row align-items-center">
         <!-- Image Section -->
         <div class="col-md-6 mb-4">
         <img class="img-fluid rounded" src="{{ asset($news->image) }}" alt="Recipe Image">
         </div>

        
         <div class="col-md-6">
            <div class="text-box">
               <span class="text-light font-weight-bold pt-3">By: {{ $news->user->name }} | 
               {{ $news->updated_at ? $news->updated_at->format('d-m-Y') : 'No Date Available' }}</span>
           
               <p class="text-muted-light py-3">
                  {{$news->description}}
               </p>
            </div>
         </div>
      </div>

<!-- Only the admin that posted the post can edit -->

@if(Auth::check() && Auth::user()->id === $news->user_id && Auth::user()->is_admin)
<div class="container py-5">
<a href="{{ route('news.edit', $news->slug) }}" class="btn-orange" style="display: inline-block; margin-right: 10px;">Edit Post</a>
</div>


<form action="/news/{{$news->slug}}" method="post" style="inline-block;">
@csrf
@method('delete')


<button type="submit" class="btn btn-danger"style="display: inline-block;" onclick="return confirm('Are you sure you want to delete this post?')">
        Delete Post
    </button>

</form>
@endif
      <!-- admin privilages Any admin can edit
@if(Auth::check() && Auth::user()->is_admin)
<div class="container py-5">
    <a href="{{ route('news.edit', $news->slug) }}" class="btn-orange">Edit Post</a>
</div>
@endif -->

   </div>


        
   @endsection