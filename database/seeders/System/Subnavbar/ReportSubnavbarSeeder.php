<?php

namespace Database\Seeders\System\Subnavbar;

use Illuminate\Database\Seeder;
use App\Models\System\Subnavbar;

class ReportSubnavbarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subnavbar::create([
            'navbar_id' => '4',
            'name' => 'Riwayat Error',
            'url' => '/report/crash-log'
        ]);
        Subnavbar::create([
            'navbar_id' => '4',
            'name' => 'Riwayat Aktivitas',
            'url' => '/report/activity-log'
        ]);
    }
}
