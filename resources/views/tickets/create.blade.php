@extends('tickets.layout')

@section('content')
    <h1>Create Ticket</h1>

    <form action="{{ route('tickets.store') }}" method="POST">
        @csrf

        <!-- Form fields for creating a ticket -->

        <button type="submit">Submit</button>
    </form>
@endsection

