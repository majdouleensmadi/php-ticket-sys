@extends('agent.layout')

@section('content')
    <h1>View Agent</h1>

    {{-- <form action="{{ route('tickets.index') }}" method="GET">
        <div class="form-group">
            <label for="priority">Category:</label>
            <select name="priority" id="priority">
                <option value="">All</option>
                <option value="low">low</option>
                <option value="mid">mid</option>
                <option value="high">High</option>
            </select>
            <label for="status">Status:</label>
            <select name="status" id="status">
                <option value="">All</option>
                <option value="open">Open</option>
                <option value="closed">Closed</option>
            </select>

            <button type="submit" class="btn btn-primary">Filter</button>
        </div>
    </form> --}}

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Message</th>
                <th>Priority</th>
                <th>Status</th>

            </tr>
        </thead>
        <tbody>
            <!-- Loop through tickets and display them in the table -->
            @foreach($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->id }}</td>
                    <td>{{ $ticket->title }}</td>
                    <td>{{ $ticket->message }}</td>
                    <td>{{ $ticket->priority }}</td>
                    <td>{{ $ticket->status }}</td>


                    <td>
                        @if ($ticket->status !== 'Closed')
                            <form action="{{ route('tickets.update', $ticket->id) }}" method="POST" style="display: inline">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="Closed">
                                <button type="submit" class="btn btn-danger">Close</button>
                            </form>
                        @endif
                        <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-primary">View</a>
                        <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-success">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
