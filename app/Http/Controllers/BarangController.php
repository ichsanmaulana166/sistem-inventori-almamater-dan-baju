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
    public function index()
    {
        $almamater = Almamater::all();
        $baju = Baju::all();
        
        return view('barang.index', compact('almamater', 'baju'));
    }

    public function createAlmamater()
    {
        return view('barang.create-almamater');
    }

    public function storeAlmamater(Request $request)
    {
        $request->validate([
            'size' => 'required|in:S,M,L,XL,XXL',
            'total' => 'required|integer|min:0'
        ]);

        $almamater = Almamater::create($request->only(['size', 'total']));
    
        LaporanPenambahan::create([
            'tipe_barang' => 'almamater',
            'size' => $almamater->size,
            'penambahan' => $almamater->total,
            'tanggal' => now(),
        ]);

        return redirect()->route('barang.index')->with('success', 'Almamater added successfully.');
    }

    public function editAlmamater($id)
    {
        $almamater = Almamater::findOrFail($id);
        return view('barang.edit-almamater', compact('almamater'));
    }

    public function updateAlmamater(Request $request, $id)
    {
        $request->validate([
            'size' => 'required|in:S,M,L,XL,XXL',
            'total' => 'required|integer|min:0'
        ]);

        $almamater = Almamater::findOrFail($id);
        $almamater->update($request->only(['size', 'total']));

    $almamater->update([
        'size' => $request->size,
        'total' => $request->total
    ]);

    LaporanPenambahan::where('tipe_barang', 'almamater')
        ->update([
            'size' => $request->size,
            'penambahan' => $request->total,
            'tanggal' => now() 
        ]);


        return redirect()->route('barang.index')->with('success', 'Almamater updated successfully.');
    }

    public function destroyAlmamater($id)
    {
        $almamater = Almamater::findOrFail($id);
    
    LaporanPenambahan::where('tipe_barang', 'almamater')
        ->where('size', $almamater->size)
        ->delete();

    $almamater->delete();
        return redirect()->route('barang.index')->with('success', 'Almamater deleted successfully.');
    }

    public function createBaju()
    {
        return view('barang.create-baju');
    }

    
    public function storeBaju(Request $request)
    {
        $request->validate([
            'size' => 'required|in:2,3,4,5,6',
            'total' => 'required|integer|min:0'
        ]);

        $baju = Baju::create($request->only(['size', 'total']));
    
        LaporanPenambahan::create([
            'tipe_barang' => 'baju',
            'size' => $baju->size,
            'penambahan' => $baju->total,
            'tanggal' => now(),
        ]);

        return redirect()->route('barang.index')->with('success', 'Baju added successfully.');
    }

    public function editBaju($id)
    {
        $baju = Baju::findOrFail($id);
        return view('barang.edit-baju', compact('baju'));
    }

    public function updateBaju(Request $request, $id)
    {
        $request->validate([
            'size' => 'required|in:2,3,4,5,6',
            'total' => 'required|integer|min:0'
        ]);

        $baju = Baju::findOrFail($id);
        $baju->update($request->only(['size', 'total']));

    $baju->update([
        'size' => $request->size,
        'total' => $request->total
    ]);

    LaporanPenambahan::where('tipe_barang', 'baju')
        ->update([
            'size' => $request->size,
            'penambahan' => $request->total,
            'tanggal' => now() 
        ]);

        return redirect()->route('barang.index')->with('success', 'Baju updated successfully.');
    }

    public function destroyBaju($id)
    {
        $baju = Baju::findOrFail($id);
    
    LaporanPenambahan::where('tipe_barang', 'baju')
        ->where('size', $baju->size)
        ->delete();

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
