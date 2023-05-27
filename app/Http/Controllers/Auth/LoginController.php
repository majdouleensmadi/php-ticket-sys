<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; //

class LoginController extends Controller
{

     public function showLoginForm()
    {
        return view('login');
    }public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $userId = Auth::user()->id;
            $request->session()->put('user_id', $userId);

            $roleId = Auth::user()->role_id;

            if ($roleId == 1) {

                return redirect('Adminhome');
            } elseif ($roleId == 2) {
                return view('home');
            }
            elseif ($roleId == 3) {
                return redirect('agents');
            } else {
                return redirect('/');
            }
        } else {
            return back()->withErrors([
                'email' => 'Invalid credentials',
            ]);
        }
    }
}
