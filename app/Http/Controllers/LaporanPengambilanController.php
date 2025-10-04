<?php

namespace App\Http\Controllers;

use App\Models\LaporanPengambilan;
use Illuminate\Http\Request;

class LaporanPengambilanController extends Controller
{
    public function index()
    {
        // Mengambil data pengambilan almamater
        $almamaterReports = LaporanPengambilan::where('jenis', 'almamater')->get();

        // Mengambil data pengambilan baju
        $bajuReports = LaporanPengambilan::where('jenis', 'baju')->get();

        // Kirim data ke view
        return view('dashboard_barang.laporan_pengambilan', compact('almamaterReports', 'bajuReports'));
    }
}
