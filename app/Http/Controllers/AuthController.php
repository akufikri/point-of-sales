<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login_view()
    {
        return view("layouts.login");
    }
    public function login(Request $request)
    {
    }
}