<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function admin()
    {
        // Get the authenticated user
        $user = Auth::user();
        
        // Check if user is authenticated
        if ($user) {
            // Get the username
            $username = $user->name; // Assuming the username field is 'name', modify it according to your User model
        } else {
            // User is not authenticated
            $username = 'Guest';
        }

        // Pass the username to the view
        return view('admin.dashboard', ['username' => $username]);
    }

    public function hod()
    {
        // Get the authenticated user
        $user = Auth::user();
        
        // Check if user is authenticated and has the 'hod' role
        if ($user && $user->role === 'hod') {
            // Get the username
            $username = $user->name; // Assuming the username field is 'name', modify it according to your User model
        } else {
            // User is not authenticated or does not have the 'hod' role
            // You can handle this case as per your application's requirements
            // For now, let's redirect to the login page
            return redirect()->route('login');
        }

        // Pass the username to the view
        return view('hod.dashboard', ['username' => $username]);
    }

    public function incharge()
    {
        $user = Auth::user();
        // Check if user is authenticated
        if ($user) {
            // Get the username
            $username = $user->name; // Assuming the username field is 'name', modify it according to your User model
        } else {
            // User is not authenticated
            $username = 'Guest';
        }

        return view('incharge.dashboard', ['username' => $username]);
    }
}
