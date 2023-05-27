<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $role = Role::find(2); // Retrieve the role with id = 2

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        
        $user->password = bcrypt($request->input('password'));
        $user->Confirmpassword = bcrypt ($request->input('password_confirmation')) ;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move('user/image',$imageName);
            $user->image = $imageName;
        }
    
        $user->role_id = $role->id; // Assign the role_id

        $user->save();

        Auth::login($user);

        return redirect('home');
    }
}
