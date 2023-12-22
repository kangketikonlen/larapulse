<?php

namespace Database\Seeders\System;

use App\Models\System\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Module::create([
            'icon' => 'fa-wrench',
            'code' => 'general',
            'description' => 'General Setting',
            'url' => '/dashboard/general',
            'navbars' => '1,2,3,4',
            'subnavbars' => '1,2,3,4,5,6'
        ]);
    }
}
