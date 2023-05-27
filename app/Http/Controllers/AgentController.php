<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Ticket;
use App\Models\Role;
use Illuminate\Http\Request;

class AgentController extends Controller
{ public function index(Request $request)
    {
        // $role = Role::find(3);
        // $agents = Ticket::all();

        // return view('agent.index', compact('agents'));
        $tickets = Ticket::all();
    $agents = Agent::all();

    return view('agent.index', compact('tickets', 'agents'));
    }
    public function create()
    {
        return view('agents.create');
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
        $agent = new Agent();
        $agent->name = $request->name;
        // Set other user properties

        // Save the user to the database
        $agent->save();

        return redirect()->route('agents.index')->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $agent = Agent::findOrFail($id);

        return view('agents.show', compact('agent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $agent = Ticket::findOrFail($id);

        return view('agents.edit', compact('agent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $agent = Agent::findOrFail($id);

    // if ($request->input('status') === 'Closed') {
    //     $ticket->status = 'Closed';
    //     $ticket->save();

        // return redirect()->route('tickets.index')->with('success', 'Ticket closed successfully.');
    // }

    // Handle other updates if needed

    return redirect()->route('agents.show', $agent->id)->with('success', 'Ticket updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $agent = Agent::findOrFail($id);

        // Delete the user from the database
        $agent->delete();

        return redirect()->route('agents.index')->with('success', 'User deleted successfully');
    }
    // public function logout()
    // {
    //     Auth::logout();
    //     return redirect()->route('login');
    // }
}
