<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/redirects');
        }

        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors(['loginError' => 'Invalid credentials']);
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('/'); // Redirect to the login page after logout
    }

    public function auth(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/redirects');
        }

        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors(['loginError' => 'Invalid credentials']);
    }
}