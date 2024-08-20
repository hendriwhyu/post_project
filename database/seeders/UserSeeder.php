<?php

namespace Database\Seeders;

use App\Models\Accounts;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create admin user
        Accounts::updateOrCreate(
            ['username' => 'admin'],
            [
                'name' => 'Admin User',
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'role' => 'admin',
            ]
        );

        // Create author user
        User::updateOrCreate(
            ['username' => 'author'],
            [
                'name' => 'Author User',
                'username' => 'author',
                'password' => Hash::make('author'),
                'role' => 'author',
            ]
        );
    }
}
