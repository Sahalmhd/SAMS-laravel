<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Correct import for handling incoming HTTP requests
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Facades\Session;


use App\Models\User;

class AdminController extends Controller
{
    public function admin()
    {
        // Get the authenticated user
        $user = Auth::user();

        $userCount = User::count();

        // Check if the user is authenticated and has the 'admin' role
        if ($user && $user->role === 'admin') {
            // Return the admin dashboard view with the username
            return view('admin.dashboard', ['username' => $user->name, 'userCount' => $userCount]);
        } else {
            // Redirect to login page or unauthorized page
            return redirect()->route('login.form');
        }
    }

    public function showadduser()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Check if the user is authenticated and has the 'admin' role to access addhod page
        if ($user->role === 'admin') {
            // Return the addhod view with the username
            return view('admin.adduser', ['username' => $user->name]);
        } else {
            // Redirect to login page or unauthorized page
            return redirect()->route('login.form');
        }
    }

    public function add_user(Request $request)
    {
        try {
            // Validate incoming request data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string',
                'role' => 'required|string|in:HOD,incharge' // Assuming role is either HOD or incharge
            ]);

            // Create a new user instance
            $user = new User();
            $user->name = $validatedData['name'];
            $user->username = $validatedData['username'];
            $user->email = $validatedData['email'];
            $user->password = Hash::make($validatedData['password']);
            $user->role = $validatedData['role'];

            // Save the user to the database
            $user->save();
            Session::flash('success', 'User created successfully');

            // Redirect back to the admin dashboard
            return redirect()->route('showadduser')->with('success', 'User created successfully');
        } catch (\Exception $e) {
            Session::flash('failed', 'failed to create user ');

            // Return an error response
            return redirect()->route('showadduser')->with('failde', 'User created falid');
        }
    }

    public function show_allUsers()
    {
        $user = Auth::user();

        $count=1;

        $users = User::all();
        return view('admin.showuser', ['username' => $user->name, 'users' => $users,'count' => $count]);
    }
}
