<?php

namespace App\Http\Controllers;

use App\Models\Almamater;
use App\Models\Baju;
use App\Models\TahunMasuk;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Models\LaporanPenambahan;

class BarangController extends Controller
{
    // Index for both Almamater and Baju
    public function index()
    {
        $almamater = Almamater::all();
        $baju = Baju::all();
        
        return view('barang.index', compact('almamater', 'baju'));
    }

    // Create for Almamater
    public function createAlmamater()
    {
        return view('barang.create-almamater');
    }

    // Store for Almamater
    public function storeAlmamater(Request $request)
    {
        $request->validate([
            'size' => 'required|in:S,M,L,XL,XXL',
            'total' => 'required|integer|min:0'
        ]);

        // Save Almamater
        $almamater = Almamater::create($request->only(['size', 'total']));
    
        // Simpan data ke laporan penambahan
        LaporanPenambahan::create([
            'tipe_barang' => 'almamater',
            'size' => $almamater->size,
            'penambahan' => $almamater->total,
            'tanggal' => now(),
        ]);

        return redirect()->route('barang.index')->with('success', 'Almamater added successfully.');
    }

    // Edit for Almamater
    public function editAlmamater($id)
    {
        $almamater = Almamater::findOrFail($id);
        return view('barang.edit-almamater', compact('almamater'));
    }

    // Update for Almamater
    public function updateAlmamater(Request $request, $id)
    {
        $request->validate([
            'size' => 'required|in:S,M,L,XL,XXL',
            'total' => 'required|integer|min:0'
        ]);

        $almamater = Almamater::findOrFail($id);
        $almamater->update($request->only(['size', 'total']));

        // Update Almamater data
    $almamater->update([
        'size' => $request->size,
        'total' => $request->total
    ]);

    // Update LaporanPenambahan record
    LaporanPenambahan::where('tipe_barang', 'almamater')
        ->update([
            'size' => $request->size,
            'penambahan' => $request->total,
            'tanggal' => now() // Update with the current timestamp
        ]);


        return redirect()->route('barang.index')->with('success', 'Almamater updated successfully.');
    }

    // Destroy for Almamater
    public function destroyAlmamater($id)
    {
        $almamater = Almamater::findOrFail($id);
    
    // Delete LaporanPenambahan record
    LaporanPenambahan::where('tipe_barang', 'almamater')
        ->where('size', $almamater->size)
        ->delete();

    // Delete Almamater data
    $almamater->delete();
        return redirect()->route('barang.index')->with('success', 'Almamater deleted successfully.');
    }

    // Create for Baju
    public function createBaju()
    {
        return view('barang.create-baju');
    }

    // Store for Baju
    public function storeBaju(Request $request)
    {
        $request->validate([
            'size' => 'required|in:2,3,4,5,6',
            'total' => 'required|integer|min:0'
        ]);

        // Save Baju
        $baju = Baju::create($request->only(['size', 'total']));
    
        // Simpan data ke laporan penambahan
        LaporanPenambahan::create([
            'tipe_barang' => 'baju',
            'size' => $baju->size,
            'penambahan' => $baju->total,
            'tanggal' => now(),
        ]);

        return redirect()->route('barang.index')->with('success', 'Baju added successfully.');
    }

    // Edit for Baju
    public function editBaju($id)
    {
        $baju = Baju::findOrFail($id);
        return view('barang.edit-baju', compact('baju'));
    }

    // Update for Baju
    public function updateBaju(Request $request, $id)
    {
        $request->validate([
            'size' => 'required|in:2,3,4,5,6',
            'total' => 'required|integer|min:0'
        ]);

        $baju = Baju::findOrFail($id);
        $baju->update($request->only(['size', 'total']));

        // Update Baju data
    $baju->update([
        'size' => $request->size,
        'total' => $request->total
    ]);

    // Update LaporanPenambahan record
    LaporanPenambahan::where('tipe_barang', 'baju')
        ->update([
            'size' => $request->size,
            'penambahan' => $request->total,
            'tanggal' => now() // Update with the current timestamp
        ]);

        return redirect()->route('barang.index')->with('success', 'Baju updated successfully.');
    }

    // Destroy for Baju
    public function destroyBaju($id)
    {
        $baju = Baju::findOrFail($id);
    
    // Delete LaporanPenambahan record
    LaporanPenambahan::where('tipe_barang', 'baju')
        ->where('size', $baju->size)
        ->delete();

    // Delete Baju data
    $baju->delete();
        return redirect()->route('barang.index')->with('success', 'Baju deleted successfully.');
    }

    public function laporanPenambahan()
{
    $laporanAlmamater = LaporanPenambahan::where('tipe_barang', 'almamater')->get();
    $laporanBaju = LaporanPenambahan::where('tipe_barang', 'baju')->get();

    return view('barang.laporan-penambahan', compact('laporanAlmamater', 'laporanBaju'));
}

}
