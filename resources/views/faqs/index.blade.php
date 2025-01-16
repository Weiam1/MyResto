@extends('layouts.app')

@section('content')
<div class="container text-center pt-5 pb-3">
    <h1 class="display-4 fw-bold text-dark-orange">Frequently Asked Questions</h1>
</div>

<!-- Admin Button to Add FAQ -->
@if (Auth::check() && Auth::user()->is_admin)
    <div class="container py-5 text-center">
        <a href="{{ route('faqs.create') }}" class="btn-orange px-5 py-2">Add New FAQ</a>
    </div>
@endif

<!-- FAQ Categories -->
<div class="container py-5">
    @foreach ($categories as $category)
    <div class="faq-category mb-5 p-4 bg-light-beige rounded shadow">
        <h3 class="text-light-orange mb-4">{{ $category->name }}</h3>
        <div class="faq-items">
            @foreach ($category->faqs as $faq)
            <div class="faq-item mb-4 p-3 bg-white rounded shadow-sm">
                <strong class="text-dark">{{ $faq->question }}</strong>
                <p class="text-muted mt-2">{{ $faq->answer }}</p>
                <!-- Edit and Delete Buttons (Visible to Admins Only) -->
                @if (Auth::check() && Auth::user()->is_admin)
                <div class="mt-3 d-flex">
                    <a href="{{ route('faqs.edit', $faq->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                    <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>

@endsection
