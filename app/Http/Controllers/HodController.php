<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HodController extends Controller
{
    public function hod()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Check if the user is authenticated and has the 'hod' role
        if ($user->role === 'hod') {
            // Return the hod dashboard view with the username
            return view('hod.dashboard', ['username' => $user->name]);
        } else {
            // Redirect to login page or unauthorized page
            return redirect()->route('login.form');
        }
    }
}
