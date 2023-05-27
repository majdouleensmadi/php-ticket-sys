@extends('tickets.layout')

@section('content')
    <div class="container">
        <h1>ticket Details</h1>

        <div class="card">
            <div class="card-header">
                ticket Information
            </div>
            <div class="card-body">
                <h5 class="card-title">Title: {{ $ticket->title }}</h5>
                <p class="card-text">Message: {{ $ticket->message }}</p>
                <p class="card-text">priority: {{ $ticket->priority }}</p>
                <p class="card-text">status: {{ $ticket->status }}</p>
                {{-- <p class="card-text">Profile Picture:
                    @if ($ticket->profile_picture)
                        <img src="{{ $ticket->profile_picture }}" alt="Profile Picture" width="50" height="50">
                    @else
                        N/A
                    @endif
                </p> --}}
            </div>
        </div>

        <a href="{{ route('tickets.index') }}" class="btn btn-primary mt-3">Back to Dashboard</a>
    </div>
@endsection
