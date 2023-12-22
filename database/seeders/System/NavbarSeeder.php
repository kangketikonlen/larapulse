<?php

namespace Database\Seeders\System;

use App\Models\System\Navbar;
use Illuminate\Database\Seeder;
use App\Models\System\Subnavbar;
use Illuminate\Support\Facades\DB;

class NavbarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Navbar::truncate();
        Subnavbar::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        Navbar::create([
            'name' => 'Master',
            'icon' => 'database',
            'url' => '#',
            'type' => 'dropdown'
        ]);

        Navbar::create([
            'name' => 'Setting',
            'icon' => 'settings-1',
            'url' => '#',
            'type' => 'dropdown'
        ]);

        Navbar::create([
            'name' => 'Administrasi',
            'icon' => 'edit-square',
            'url' => '#',
            'type' => 'dropdown'
        ]);

        Navbar::create([
            'name' => 'Laporan',
            'icon' => 'book',
            'url' => '#',
            'type' => 'dropdown'
        ]);
    }
}
