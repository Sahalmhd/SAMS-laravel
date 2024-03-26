<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com', // Change this email if needed
            'password' => Hash::make('admin'),
            'username' => 'admin',
            'role' => 'admin', // Assuming 'admin' role for the admin user
        ]);
    }
}
