@extends('layouts.app')

@section('content')
<div class="container py-5">
    @if(isset($error))
        <h1 class="text-dark-orange">{{ $error }}</h1>
    @else
        <h1 class="text-dark-orange">Search Results</h1>
        <ul class="list-group mt-4">
            @foreach ($users as $user)
                <li class="list-group-item">
                    <a href="{{ route('profile.show', ['username' => $user->username]) }}">
                        {{ $user->username }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
