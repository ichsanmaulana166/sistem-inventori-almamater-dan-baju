<?php

// app/Http/Controllers/TahunMasukController.php
namespace App\Http\Controllers;

use App\Models\TahunMasuk;
use Illuminate\Http\Request;

class TahunMasukController extends Controller
{
    public function index(Request $request)
    {
        $tahunMasuks = TahunMasuk::all();

        // Mengambil nilai 'search' dari input pencarian jika ada
        $search = $request->input('search');
        
        // Mengambil nilai 'entries' untuk jumlah data per halaman jika ada, default ke 10
        $entries = $request->input('entries', 10);
    
        // Query data dengan pencarian dan paginasi
        $tahunMasuks = TahunMasuk::when($search, function($query) use ($search) {
                            $query->where('tahun', 'like', '%' . $search . '%');
                        })
                        ->paginate($entries);
    
        // Passing 'search' dan 'entries' ke view agar tetap terlihat di input
        return view('tahun_masuk.index', compact('tahunMasuks', 'search', 'entries'));
    }
    

    public function create()
    {
        return view('tahun_masuk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|unique:tahun_masuks|digits:4',
        ]);

        TahunMasuk::create($request->all());
        return redirect()->route('tahun_masuk.index')->with('success', 'Tahun Masuk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $tahunMasuks = TahunMasuk::find($id);
        return view('tahun_masuk.edit', compact('tahunMasuks'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun' => 'required|digits:4|unique:tahun_masuks,tahun,'.$id,
        ]);

        $tahunMasuks = TahunMasuk::find($id);
        $tahunMasuks->update($request->all());
        return redirect()->route('tahun_masuk.index')->with('success', 'Tahun Masuk berhasil diubah.');
    }

    public function destroy($id)
    {
        $tahunMasuks = TahunMasuk::find($id);
        $tahunMasuks->delete();
        return redirect()->route('tahun_masuk.index')->with('success', 'Tahun Masuk berhasil dihapus.');
    }
}
