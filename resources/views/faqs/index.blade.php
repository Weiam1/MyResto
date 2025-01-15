@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center text-light-orange mb-4">Frequently Asked Questions</h1>

    <!-- Admin Button to Add FAQ -->
    @if (Auth::check() && Auth::user()->is_admin)
        <div class="text-center mb-4">
            <a href="{{ route('faqs.create') }}" class="btn-orange px-5 py-2">Add New FAQ</a>
        </div>
    @endif

    @foreach ($categories as $category)
        <div class="mb-5">
            <h3 class="text-light-orange">{{ $category->name }}</h3>
            <ul class="list-unstyled mt-3">
                @foreach ($category->faqs as $faq)
                    <li class="mb-3">
                        <strong class="text-muted-light">{{ $faq->question }}</strong>
                        <p class="text-muted-light">{{ $faq->answer }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>
@endsection
