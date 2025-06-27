<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function store(Request $request)
    {

        $fields = $request->validate([
            'name' => 'required|min:3|max:55',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ]);

        User::create($fields);

        return redirect()->route('users.index')->with('message', 'New User created!');
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($fields)) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'))->with('message', 'Login Successful');
        }

        return back()->withErrors([
            'email' => 'The Provided credentials do not match our records.'
        ])->onlyInput('email');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('message', 'Logout Successfully!');
    }
}
