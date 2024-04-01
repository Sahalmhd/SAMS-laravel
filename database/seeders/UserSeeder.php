<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'incharge',
            'email' => 'incharge@example.com', // Change this email if needed
            'password' => Hash::make('incharge'),
            'username' => 'incharge',
            'role' => 'incharge', // Assuming 'admin' role for the admin user
        ]);
    }
}
