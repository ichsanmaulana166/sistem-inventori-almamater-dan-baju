<?php

namespace App\Http\Controllers;

use App\Models\LaporanPengambilan;
use Illuminate\Http\Request;

class LaporanPengambilanController extends Controller
{
    public function index()
    {
        $almamaterReports = LaporanPengambilan::where('jenis', 'almamater')->get();

        $bajuReports = LaporanPengambilan::where('jenis', 'baju')->get();

        return view('dashboard_barang.laporan_pengambilan', compact('almamaterReports', 'bajuReports'));
    }
}
