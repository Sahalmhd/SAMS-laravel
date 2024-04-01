<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function showSignupForm()
    {
        return view('signup');
    }

   
    public function login(Request $request)
    {
        // Retrieve credentials from the request
        $credentials = $request->only('username', 'password');
    
        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // Get the authenticated user
            
            // Check the user's role
            switch ($user->role) {
                case 'admin':
                    return redirect()->route('admin.dashboard'); // Redirect to admin dashboard
                    break;
                case 'hod':
                    return redirect()->route('hod.dashboard'); // Redirect to hod dashboard
                    break;
                case 'incharge':
                    return redirect()->route('incharge.dashboard'); // Redirect to regular user dashboard
                    break;
                default:
                    return redirect()->route('login.form'); // Redirect to login page if role is unknown
                    break;
            }
        }
    
        // Authentication failed, redirect back with error message
        return back()->withErrors(['username' => 'Invalid credentials'])->withInput();
    }

    public function logout(Request $request)
{
    Auth::logout(); // Logout the user

    // Redirect to the login page after logout
    return redirect()->route('login.form');
}
}