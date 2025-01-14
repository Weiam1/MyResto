@extends('layouts.app')
@section('content')

<div class="container text-center pt-5 pb-3">
    <h1 class="display-4 fw-bold text-dark-orange">{{ $user->username ?? 'No Username' }}</h1>
</div>

<div class="container py-5">
   <div class="post-item border-bottom pb-4 mb-4">
      <div class="row align-items-center">
         <!-- Image Section -->
         <div class="col-md-6 mb-4">
         @if($user->profile_picture)
    <img class="img-fluid rounded" src="/storage/{{$user->profile_picture}}" alt="Profile Picture">
@else
<img class="img-fluid rounded" src="/storage/profile_pictures/{{ $user->profile_picture }}" alt="Profile Picture">
@endif


         </div>

         <!-- Content Section -->
         <div class="col-md-6">
            <div class="text-box">
               <h2 class="text-light font-weight-bold text-uppercase">About Me</h2>
               <p class="text-muted-light py-3">
                  {{ $user->about_me ?? 'No bio available.' }}
               </p>
               <p class="text-light font-weight-bold pt-3">Birthday: 
                  {{ $user->birthday ? \Carbon\Carbon::parse($user->birthday)->format('d-m-Y') : 'Not provided' }}
               </p>
               <p class="text-light font-weight-bold pt-3">Email: {{ $user->email }}</p>
            
            @if (Auth::check() && Auth::user()->username === $user->username)
    <div class="text-center mt-4">
    <a href="{{ route('profile.edit') }}" class="btn-orange px-5 py-2">
        Edit Profile
    </a>
    </div>
    </div>
@endif

         </div>
      </div>
   </div>
</div>

@endsection
