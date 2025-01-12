@extends('layouts.app')
@section('content')

<div class="container text-center pt-5 pb-3">
    <h1 class="display-4 fw-bold text-dark-orange">Edit post</h1>
</div>

<div class="container py-5">
<form action="/news/{{$news->slug}}" 
          method="POST" 
          enctype="multipart/form-data" 
          class="p-4 rounded shadow-lg bg-light-beige">
        @csrf
        @method('PUT')
        <!-- Title Input -->
        <div class="mb-4">
            <label for="title" class="form-label fw-bold text-dark">Title</label>
            <input 
                type="text" 
                id="title"
                name="title" 
                value="{{$news->title}}"
                class="form-control rounded-lg p-3 shadow-sm border"
                required>
        </div>

        <!-- Description Input -->
        <div class="mb-4">
            <label for="description" class="form-label fw-bold text-dark">Description</label>
            <textarea 
                id="description" 
                name="description" 
                placeholder="Write the description of your post"
                rows="5"
                class="form-control rounded-lg p-3 shadow-sm border"
                required>
                {{$news->description}}
            </textarea>
                </div>

<!-- Image Upload -->
<div class="mb-4">
    <label for="image" class="form-label fw-bold text-dark">Image</label>
    <input 
        type="file" 
        id="image" 
        name="image" 
        class="form-control p-2 shadow-sm border"
        accept="image/*">
</div>

<!-- Submit Button -->
<div class="text-center">
    <button type="submit" class="btn-orange px-5 py-2">
       Edit Post
    </button>
</div>
</form>
</div>



@endsection
