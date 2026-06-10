<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Outlet::create([
            'id_admin' => 1,
            'id_rider' => 1,
            'nama_outlet' => 'Gerobak Soto Ayam - Jalan Merdeka',
            'jenis_outlet' => 'Outlet Bergerak',
            'link_lokasi' => 'https://maps.google.com/?q=-6.2000,106.8000',
            'keterangan_lokasi' => 'Dekat sekolah, depan toko kelontong',
            'status_operasional' => 'Buka',
        ]);

        \App\Models\Outlet::create([
            'id_admin' => 1,
            'id_rider' => null,
            'nama_outlet' => 'Outlet Soto Ayam Pusat',
            'jenis_outlet' => 'Outlet Tetap',
            'link_lokasi' => 'https://maps.google.com/?q=-6.2050,106.8050',
            'keterangan_lokasi' => 'Jalan utama, sebelah ATM BCA',
            'status_operasional' => 'Buka',
        ]);

        \App\Models\Outlet::create([
            'id_admin' => 1,
            'id_rider' => null,
            'nama_outlet' => 'Gerobak Soto Ayam - Jalan Sudirman',
            'jenis_outlet' => 'Outlet Bergerak',
            'link_lokasi' => 'https://maps.google.com/?q=-6.2100,106.8100',
            'keterangan_lokasi' => 'Dekat universitas, pinggir jalan utama',
            'status_operasional' => 'Tutup',
        ]);
    }
}
