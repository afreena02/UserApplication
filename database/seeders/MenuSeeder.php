<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            ['title' => 'User Account', 'route_name' => 'user.account'],
            ['title' => 'Human Resource', 'route_name' => 'human.resource'],
            ['title' => 'Employee Profile', 'route_name' => 'profile'],
            ['title' => 'Quit', 'route_name' => 'quit'],
        ];

        foreach ($menus as $menu) {
            DB::table('menus')->updateOrInsert(
                ['route_name' => $menu['route_name']], // Unique field to check
                [
                    'title' => $menu['title'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
