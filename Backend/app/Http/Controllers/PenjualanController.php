<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use Carbon\Carbon;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::all();

        return response()->json([
            'success' => true,
            'data' => $penjualan,
        ]);
    }

    public function show($id)
    {
        $penjualan = Penjualan::find($id);
        
        if (!$penjualan) {
            return response()->json([
                'success' => false,
                'message' => 'Penjualan tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $penjualan,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_rider' => 'required|exists:riders,id_rider',
            'tanggal_penjualan' => 'required|date',
            'jumlah_susu_basi' => 'integer|default:0',
            'jumlah_susu_rusak' => 'integer|default:0',
            'sisa_stok' => 'integer|default:0',
            'setoran_cash' => 'integer|default:0',
            'setoran_qris' => 'integer|default:0',
            'bukti_transfer' => 'nullable|string',
            'total_pendapatan' => 'required|integer',
            'jumlah_produk_terjual' => 'required|integer',
        ]);

        $penjualan = Penjualan::create($validated);

        return response()->json([
            'success' => true,
            'data' => $penjualan,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $penjualan = Penjualan::find($id);
        
        if (!$penjualan) {
            return response()->json([
                'success' => false,
                'message' => 'Penjualan tidak ditemukan',
            ], 404);
        }

        $validated = $request->validate([
            'tanggal_penjualan' => 'date',
            'jumlah_susu_basi' => 'integer',
            'jumlah_susu_rusak' => 'integer',
            'sisa_stok' => 'integer',
            'setoran_cash' => 'integer',
            'setoran_qris' => 'integer',
            'bukti_transfer' => 'nullable|string',
            'total_pendapatan' => 'integer',
            'jumlah_produk_terjual' => 'integer',
        ]);

        $penjualan->update($validated);

        return response()->json([
            'success' => true,
            'data' => $penjualan,
        ]);
    }

    public function destroy($id)
    {
        $penjualan = Penjualan::find($id);
        
        if (!$penjualan) {
            return response()->json([
                'success' => false,
                'message' => 'Penjualan tidak ditemukan',
            ], 404);
        }

        $penjualan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Penjualan berhasil dihapus',
        ]);
    }

    // Get latest penjualan for a rider
    public function getLatestByRider($riderId)
    {
        $penjualan = Penjualan::where('id_rider', $riderId)
            ->orderBy('tanggal_penjualan', 'desc')
            ->first();

        if (!$penjualan) {
            return response()->json([
                'success' => false,
                'message' => 'Belum ada data penjualan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $penjualan,
        ]);
    }

    // Get today's penjualan for a rider
    public function getTodayByRider($riderId)
    {
        $today = Carbon::now()->toDateString();
        
        $penjualan = Penjualan::where('id_rider', $riderId)
            ->where('tanggal_penjualan', $today)
            ->first();

        if (!$penjualan) {
            return response()->json([
                'success' => false,
                'message' => 'Belum ada data penjualan hari ini',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $penjualan,
        ]);
    }
}
