<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'email' => 'admin@example.com',
                'first_name' => 'Admin',
                'last_name' => 'User',
                'position' => 'Administrator',
                'role_id' => 1,
                'image_url' => null,
                'password' => Hash::make('Password@123'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];
    
        foreach ($users as $user) {
            DB::table('users')->updateOrInsert(
                ['email' => $user['email']], 
                $user 
            );
        }
    }
}
