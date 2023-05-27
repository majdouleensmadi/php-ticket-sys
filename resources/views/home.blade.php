@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Home') }}</div>

                    <div class="card-body">
                        <h1>Welcome to the home Page</h1>

                        <!-- Add your content here -->
                        @if(session('user_id'))
                            <p>Welcome, {{ Auth::user()->name }}</p>
                            <br>
                            <a href="{{ route('tickets.index') }}" class="btn btn-primary">User</a>
                            <br>
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Logout</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
