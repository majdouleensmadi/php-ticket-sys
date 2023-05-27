@extends('admin.app')

@section('content')
    <div class="container">
        <h1>User Details</h1>

        <div class="card">
            <div class="card-header">
                User Information
            </div>
            <div class="card-body">
                <h5 class="card-title">Name: {{ $user->name }}</h5>
                <p class="card-text">Email: {{ $user->email }}</p>
                <p class="card-text">Role: {{ $user->role->name }}</p>
                <p class="card-text">Profile Picture: 
                    @if ($user->profile_picture)
                        <img src="{{ $user->profile_picture }}" alt="Profile Picture" width="50" height="50">
                    @else
                        N/A
                    @endif
                </p>
            </div>
        </div>

        <a href="{{ route('dashboard.index') }}" class="btn btn-primary mt-3">Back to Dashboard</a>
    </div>
@endsection
