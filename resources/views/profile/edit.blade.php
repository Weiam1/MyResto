@extends('layouts.app')

@section('content')
<div class="container text-center pt-5 pb-3">
    <h1 class="display-4 fw-bold text-dark-orange">Edit Profile</h1>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container py-5">
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="p-4 rounded shadow-lg bg-light-beige">
        @csrf
        @method('PATCH')

        <!-- Username -->
        <div class="mb-4">
            <label for="username" class="form-label fw-bold text-dark">Username</label>
            <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}" class="form-control rounded-lg p-3 shadow-sm border" required>
        </div>

        <!-- Birthday -->
        <div class="mb-4">
            <label for="birthday" class="form-label fw-bold text-dark">Birthday</label>
            <input type="date" id="birthday" name="birthday" value="{{ old('birthday', $user->birthday) }}" class="form-control rounded-lg p-3 shadow-sm border">
        </div>

        <!-- Profile Picture -->
        <div class="mb-4">
            <label for="profile_picture" class="form-label fw-bold text-dark">Profile Picture</label>
            <input type="file" id="profile_picture" name="profile_picture" class="form-control p-2 shadow-sm border" accept="image/*">
        </div>

        <!-- About Me -->
        <div class="mb-4">
            <label for="about_me" class="form-label fw-bold text-dark">About Me</label>
            <textarea id="about_me" name="about_me" rows="4" class="form-control rounded-lg p-3 shadow-sm border">{{ old('about_me', $user->about_me) }}</textarea>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="btn-orange px-5 py-2">
                Save Changes
            </button>
        </div>
    </form>
</div>
@endsection
