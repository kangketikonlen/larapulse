<?php

namespace Database\Seeders\System\Subnavbar;

use Illuminate\Database\Seeder;
use App\Models\System\Subnavbar;

class SettingSubnavbarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subnavbar::create([
            'navbar_id' => '2',
            'name' => 'Informasi Institusi',
            'url' => '/setting/institution'
        ]);
        Subnavbar::create([
            'navbar_id' => '2',
            'name' => 'Build Module',
            'url' => '/setting/module'
        ]);
    }
}
