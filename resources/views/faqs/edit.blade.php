@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center text-dark-orange mb-4">Edit FAQ</h1>
    <form action="{{ route('faqs.update', $faq->id) }}" method="POST" class="p-4 rounded shadow-lg bg-light-beige">
        @csrf
        @method('PUT')

        <!-- Question -->
        <div class="mb-4">
            <label for="question" class="form-label fw-bold text-dark">Question</label>
            <input type="text" id="question" name="question" value="{{ $faq->question }}" class="form-control rounded-lg p-3 shadow-sm border" required>
        </div>

        <!-- Answer -->
        <div class="mb-4">
            <label for="answer" class="form-label fw-bold text-dark">Answer</label>
            <textarea id="answer" name="answer" rows="5" class="form-control rounded-lg p-3 shadow-sm border" required>{{ $faq->answer }}</textarea>
        </div>

        <!-- Category -->
        <div class="mb-4">
            <label for="category_id" class="form-label fw-bold text-dark">Category</label>
            <select id="category_id" name="category_id" class="form-control rounded-lg p-3 shadow-sm border" required>
                <option value="" disabled>Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $faq->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="btn-orange px-5 py-2">Update FAQ</button>
        </div>
    </form>
</div>
@endsection
