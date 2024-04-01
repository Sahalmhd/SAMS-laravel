<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Check if the user is authenticated and has the 'admin' role
        if ($user && $user->role === 'admin') {
            // Return the admin dashboard view with the username
            return view('admin.dashboard', ['username' => $user->name]);
        } else {
            // Redirect to login page or unauthorized page
            return redirect()->route('login.form');
        }
    }

    public function addhod()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Check if the user is authenticated and has the 'admin' role to access addhod page
        if ($user->role === 'admin') {
            // Return the addhod view with the username
            return view('admin.addhod', ['username' => $user->name]);
        } else {
            // Redirect to login page or unauthorized page
            return redirect()->route('login.form');
        }
    }
}
