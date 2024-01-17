<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login_view()
    {
        return view("layouts.login");
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            switch ($user->role_id) {
                case 1:
                    return redirect('/');
                case 2:
                    return redirect('/transaksi');
                    // Add more cases for other roles if needed
                default:
                    // Redirect to a default route for unknown roles
                    return redirect('/')->with('error', 'Unauthorized access. Please log in.');
            }
        }

        return redirect('/login')->with('error', 'Invalid credentials. Please try again.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
