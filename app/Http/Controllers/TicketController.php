<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Role;

class TicketController extends Controller
{

    // public function index()
    // {
    //     $tickets = Ticket::all(); // Fetch all tickets

    //     return view('tickets.index', compact('tickets'));
    // }
    public function index(Request $request)
    {
        // Retrieve the selected filters
        $priority = $request->input('priority');
        $status = $request->input('status');

        // Build the base query
        $query = Ticket::query();

        // Apply filters based on selected values
        if ($priority) {
            $query->where('priority', $priority);
        }
        if ($status) {
            $query->where('status', $status);
        }

        // Fetch the filtered tickets
        $tickets = $query->get();

        return view('tickets.index', compact('tickets'));
    }





    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'name' => 'required',
            // Add validation rules for other fields
        ]);

        // Create a new user based on the request data
        $ticket = new Ticket;
        $ticket->title = $request->title;
        // Set other user properties

        // Save the user to the database
        $ticket->save();

        return redirect()->route('tickets.index')->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);

        return view('tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);

        return view('tickets.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $ticket = Ticket::findOrFail($id);

    if ($request->input('status') === 'Closed') {
        $ticket->status = 'Closed';
        $ticket->save();

        return redirect()->route('tickets.index')->with('success', 'Ticket closed successfully.');
    }

    // Handle other updates if needed

    return redirect()->route('tickets.show', $ticket->id)->with('success', 'Ticket updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);

        // Delete the user from the database
        $ticket->delete();

        return redirect()->route('tickets.index')->with('success', 'User deleted successfully');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
