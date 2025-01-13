@extends('layouts.app')

@section('content')
<div class="container">
<div class="container text-center pt-5 pb-3">
    <h1 class="display-4 fw-bold text-dark-orange">Edit the post</h1>
</div>

   
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        {{ $user->is_admin ? 'Admin' : 'User' }}
                    </td>
                    <td>
                        @if (!$user->is_admin)
                            <form action="{{ route('users.makeAdmin', $user) }}" method="POST" style="display: inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">Make Admin</button>
                            </form>
                        @else
                            <form action="{{ route('users.removeAdmin', $user) }}" method="POST" style="display: inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-warning">Remove Admin</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="container py-5">
    <a href="{{ route('users.create') }}" class="btn-orange">Add New User</a>
</div>
</div>
@endsection
