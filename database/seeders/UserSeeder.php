<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert or update users with hashed passwords
        DB::table('users')->updateOrInsert(
            ['email' => 'admin@gmail.com'], // Email as unique identifier
            [ 
                'name' => 'Admin',
                'password' => Hash::make('admin1234') // Hashing the password
            ]
        
        );
    }
}