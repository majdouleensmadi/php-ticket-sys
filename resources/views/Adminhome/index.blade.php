@extends('Adminhome.layout')


@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
              Dashboard
            </div>
            <div class="card-body">
                <table class="table">
                    {{-- <thead>
                        <tr>
                            <th>User</th>
                        </tr>
                        <tr>
                            <th>Agent</th>
                        </tr>
                        <tr>
                            <th>Tickets</th>
                        </tr>

                    </thead> --}}
                  <tbody>
                        {{-- @foreach ($users as $user) --}}
                            <tr>
                                {{-- <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td> --}}
                                <td>
                                    <a href="{{ route('dashboard') }}" class="btn btn-primary">User</a>
                                    {{-- <a href="{{ route('tickets.create') }}" class="btn btn-primary">show ticket</a> --}}
                                    <a href="{{ route('tickets.index') }}" class="btn btn-primary">Ticket</a>

                                    <a href="{{ route('agentdashboard.index') }}" class="btn btn-primary">Agent</a>
                                    {{-- <a href="{{ route('tickets', $user->id) }}" class="btn btn-success">Ticket</a> --}}
                                </td>
                            </tr>
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

