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
        Accounts::create(
            [
                'name' => 'Admin User',
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'role' => 'admin',

            ]
        );

        // Create author user
        Accounts::create([
            'username' => 'author',
            'name' => 'Author User',
            'password' => bcrypt('author'),
            'role' => 'author',
        ]);
    }
}
