@extends('layouts.app')
@section('content')

<div class="container text-center pt-5 pb-3">
    <h1 class="display-4 fw-bold text-dark-orange">Create New User</h1>
</div>

<div class="container py-5">
    <form action="{{ route('users.store') }}" 
          method="POST" 
          class="form-container">
        @csrf

        <!-- Name Input -->
        <div class="form-group">
            <label for="name" class="form-label">Name</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                placeholder="Enter the name of the user"
                class="form-control" 
                required>
        </div>

        <!-- Email Input -->
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input 
                type="email" 
                id="email" 
                name="email" 
                placeholder="Enter the email of the user"
                class="form-control" 
                required>
        </div>

        <!-- Password Input -->
        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input 
                type="password" 
                id="password" 
                name="password" 
                placeholder="Enter the password"
                class="form-control" 
                required>
        </div>

        <!-- Confirm Password Input -->
        <div class="form-group">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input 
                type="password" 
                id="password_confirmation" 
                name="password_confirmation" 
                placeholder="Confirm the password"
                class="form-control" 
                required>
        </div>

        <!-- Role Selection -->
        <div class="form-group">
            <label for="is_admin" class="form-label">Role</label>
            <select 
                id="is_admin" 
                name="is_admin" 
                class="form-control" 
                required>
                <option value="0">User</option>
                <option value="1">Admin</option>
            </select>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="btn-orange">
                Create User
            </button>
        </div>
    </form>
</div>

@endsection
