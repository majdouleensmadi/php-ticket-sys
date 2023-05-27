<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $role = Role::find(2);
        $users = User::all();
        
        return view('Admin.index', compact('users'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            // Add validation rules for other fields
        ]);
        
        // Create a new user based on the request data
        $user = new User;
        $user->name = $request->name;
        // Set other user properties
        
        // Save the user to the database
        $user->save();
        
        return redirect()->route('dashboard.index')->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        
        return view('Admin.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        
        return view('Admin.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            // Add validation rules for other fields
        ]);
        
        // Find the user to update
        $user = User::findOrFail($id);
        
        // Update the user properties based on the request data
        $user->name = $request->name;
        // Update other user properties
        
        // Save the updated user to the database
        $user->save();
        
        return redirect()->route('dashboard.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        
        // Delete the user from the database
        $user->delete();
        
        return redirect()->route('dashboard.index')->with('success', 'User deleted successfully');
    }
}
