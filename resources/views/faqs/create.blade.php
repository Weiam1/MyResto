@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center text-dark-orange mb-4">Add New FAQ</h1>
    <form action="{{ route('faqs.store') }}" method="POST" class="p-4 rounded shadow-lg bg-light-beige">
        @csrf

        <!-- Question -->
        <div class="mb-4">
            <label for="question" class="form-label fw-bold text-dark">Question</label>
            <input type="text" id="question" name="question" class="form-control rounded-lg p-3 shadow-sm border" required>
        </div>

        <!-- Answer -->
        <div class="mb-4">
            <label for="answer" class="form-label fw-bold text-dark">Answer</label>
            <textarea id="answer" name="answer" rows="5" class="form-control rounded-lg p-3 shadow-sm border" required></textarea>
        </div>

        <!-- Category -->
        <div class="mb-4">
            <label for="category_id" class="form-label fw-bold text-dark">Category</label>
            <select id="category_id" name="category_id" class="form-control rounded-lg p-3 shadow-sm border" required>
                <option value="" disabled selected>Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="btn-orange px-5 py-2">Add FAQ</button>
        </div>
    </form>
</div>
@endsection
