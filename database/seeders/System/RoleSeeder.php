<?php

namespace Database\Seeders\System;

use App\Models\System\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $count = 1;
        Role::create([
            'code' => 'RLS-' . date("ymd") . '-' . str_pad(strval($count), 4, "0", STR_PAD_LEFT),
            'name' => 'support',
            'description' => 'System Support',
            'dashboard_url' => '/dashboard',
            'is_landing' => 1
        ]);

        $count += 1;
        Role::create([
            'code' => 'RLS-' . date("ymd") . '-' . str_pad(strval($count), 4, "0", STR_PAD_LEFT),
            'name' => 'admin',
            'description' => 'Administrator',
            'dashboard_url' => '/dashboard/administration',
            'is_landing' => 1
        ]);

        $count += 1;
        Role::create([
            'code' => 'RLS-' . date("ymd") . '-' . str_pad(strval($count), 4, "0", STR_PAD_LEFT),
            'name' => 'user',
            'description' => 'User',
            'dashboard_url' => '/dashboard/user',
            'is_landing' => 1
        ]);
    }
}
