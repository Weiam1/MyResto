@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center text-light-orange">Contact Us</h1>

    @if(session('success'))
        <div class="alert alert-success text-center mt-3">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('contact.send') }}" method="POST" class="p-4 rounded shadow-lg bg-light-beige mt-4">
        @csrf

        <!-- Name -->
        <div class="mb-4">
            <label for="name" class="form-label fw-bold text-dark">Your Name</label>
            <input type="text" id="name" name="name" class="form-control rounded-lg p-3 shadow-sm border" required>
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="form-label fw-bold text-dark">Your Email</label>
            <input type="email" id="email" name="email" class="form-control rounded-lg p-3 shadow-sm border" required>
        </div>

        <!-- Message -->
        <div class="mb-4">
            <label for="message" class="form-label fw-bold text-dark">Your Message</label>
            <textarea id="message" name="message" rows="5" class="form-control rounded-lg p-3 shadow-sm border" required></textarea>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="btn-orange px-5 py-2">
                Send Message
            </button>
        </div>
    </form>
</div>
@endsection
