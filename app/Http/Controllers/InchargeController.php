<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class InchargeController extends Controller
{
    public function incharge()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Check if the user is authenticated and has the 'incharge' role
        if ($user->role === 'incharge') {
            // Return the incharge dashboard view with the username
            return view('incharge.dashboard', ['username' => $user->name]);
        } else {
            // Redirect to login page or unauthorized page
            return redirect()->route('login.form');
        }
    }

    public function addStudents(){

        // Get the authenticated user
        $user = Auth::user();

        return view('incharge.addStudents',['username' => $user->name]);
    }
}
