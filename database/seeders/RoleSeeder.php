<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RoleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roles = [
            ['id' => 1, 'title' => 'System Admin'],
            ['id' => 2, 'title' => 'HR'],
            ['id' => 3, 'title' => 'User'],
        ];

        foreach ($roles as $role) {
            DB::table('roles')->updateOrInsert(
                ['id' => $role['id']], // Ensure ID is fixed
                [
                    'title' => $role['title'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
