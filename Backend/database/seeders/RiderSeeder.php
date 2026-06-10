<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RiderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Rider::create([
            'nama_rider' => 'Budi Santoso',
            'foto_rider' => 'riders/budi.jpg',
            'no_hp' => '081234567890',
            'username' => 'budi_rider',
            'password' => bcrypt('password123'),
            'status_akun' => 'Aktif',
            'status_jualan' => 'Tersedia',
            'status_live_location' => 'Nonaktif',
        ]);
    }
}
