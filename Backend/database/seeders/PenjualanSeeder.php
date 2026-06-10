<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Penjualan::create([
            'id_rider' => 1,
            'tanggal_penjualan' => '2026-06-10',
            'jumlah_susu_basi' => 2,
            'jumlah_susu_rusak' => 1,
            'sisa_stok' => 15,
            'setoran_cash' => 250000,
            'setoran_qris' => 150000,
            'bukti_transfer' => null,
            'total_pendapatan' => 400000,
            'jumlah_produk_terjual' => 25,
        ]);

        \App\Models\Penjualan::create([
            'id_rider' => 1,
            'tanggal_penjualan' => '2026-06-09',
            'jumlah_susu_basi' => 1,
            'jumlah_susu_rusak' => 0,
            'sisa_stok' => 12,
            'setoran_cash' => 200000,
            'setoran_qris' => 180000,
            'bukti_transfer' => 'transfers/bukti-qris-20260609.jpg',
            'total_pendapatan' => 380000,
            'jumlah_produk_terjual' => 22,
        ]);

        \App\Models\Penjualan::create([
            'id_rider' => 1,
            'tanggal_penjualan' => '2026-06-08',
            'jumlah_susu_basi' => 3,
            'jumlah_susu_rusak' => 2,
            'sisa_stok' => 18,
            'setoran_cash' => 300000,
            'setoran_qris' => 200000,
            'bukti_transfer' => 'transfers/bukti-qris-20260608.jpg',
            'total_pendapatan' => 500000,
            'jumlah_produk_terjual' => 30,
        ]);
    }
}
