<?php

namespace App\Http\Controllers;


use App\Models\Almamater;
use App\Models\Baju;
use App\Models\TahunMasuk;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Models\LaporanPengambilan;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use Exception;



class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $tahunMasukId = $request->get('tahun_masuk_id');
        $entriesPerPage = $request->get('entries_per_page', 10); // Jumlah entri per halaman dengan default 10
        $searchNISN = $request->get('search');
    
        $query = Siswa::query();
    
        if ($tahunMasukId) {
            $query->where('tahun_masuk_id', $tahunMasukId);
        }
    
        if ($searchNISN) {
            $query->where('nisn', 'like', '%' . $searchNISN . '%');
        }
    
        $siswas = $query->paginate($entriesPerPage);

        $tahunMasukId = $request->get('tahun_masuk_id');

    
        $tahunMasuks = TahunMasuk::all();
        
        return view('siswa.index', compact('siswas', 'tahunMasuks'));
    }

    public function datahunsiswa()
    {
    
        $query = Siswa::query();
    
        $tahunMasuks = TahunMasuk::all();
        
        return view('siswa.datatahunsiswa', compact( 'tahunMasuks'));
    }
    
    
    public function create()
    {
        $tahunMasuks = TahunMasuk::all();
        return view('siswa.create', compact('tahunMasuks'));
    }
    public function store(Request $request,Siswa $siswa)
    {
        $request->validate([
            'nisn' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'status_pembayaran' => 'required',
            'tahun_masuk_id' => 'required'
        ]);
    
        Siswa::create($request->all());
        return redirect()->route('siswa.index', ['tahun_masuk_id' => $siswa->tahun_masuk_id]);
    }
    public function edit(Siswa $siswa)
    {
        $tahunMasuks = TahunMasuk::all();
        return view('siswa.edit', compact('siswa', 'tahunMasuks'));
    }
    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nisn' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'status_pembayaran' => 'required',
            'tahun_masuk_id' => 'required'
        ]);
    
        $siswa->update($request->all());
        return redirect()->route('siswa.index', ['tahun_masuk_id' => $siswa->tahun_masuk_id]);
    }
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswa.index', ['tahun_masuk_id' => $siswa->tahun_masuk_id]);
    }

    public function laporan()
{
    $sudahMembayar = Siswa::where('status_pembayaran', 'Sudah Membayar')->get();

    $belumMembayar = Siswa::where('status_pembayaran', 'Belum Membayar')->get();

    return view('laporan.index', compact('sudahMembayar', 'belumMembayar'));
}

public function getPaidStudents(Request $request)
{
    $tahunMasukId = $request->get('tahun_masuk_id');
    $entriesPerPage = $request->get('entries_per_page', 10); // Default 10 entri per halaman
    $searchNISN = $request->get('search');

    $query = Siswa::query();

    if ($tahunMasukId) {
        $query->where('tahun_masuk_id', $tahunMasukId);
    }

    if ($searchNISN) {
        $query->where('nisn', 'like', '%' . $searchNISN . '%');
    }

    $students = $query->paginate($entriesPerPage);

    $almamaterSizes = Almamater::all();
    $bajuSizes = Baju::all();
    $tahunMasuks = TahunMasuk::all();

    return view('barang.siswa', compact('students', 'almamaterSizes', 'bajuSizes', 'tahunMasuks'));
}


public function savePengambilan(Request $request)
{
    $students = $request->input('students'); // Data siswa dari form

    foreach ($students as $studentData) {
        if (!empty($studentData['almamater_size'])) {
            $almamater = Almamater::where('size', $studentData['almamater_size'])->first();
            if ($almamater && $almamater->total > 0) {
                LaporanPengambilan::create([
                    'nisn' => $studentData['nisn'],
                    'tanggal' => now(),
                    'jumlah' => 1, // Tambah jumlah almamater yang diambil
                    'ukuran' => $studentData['almamater_size'],
                    'jenis' => 'almamater',
                ]);

                $almamater->decrement('total', 1);
            } else {
                return redirect()->back()->with('error', 'Stok almamater tidak mencukupi untuk ukuran ' . $studentData['almamater_size']);
            }
        }

        if (!empty($studentData['baju_size'])) {
            $baju = Baju::where('size', $studentData['baju_size'])->first();
            if ($baju && $baju->total > 0) {
                LaporanPengambilan::create([
                    'nisn' => $studentData['nisn'],
                    'tanggal' => now(),
                    'jumlah' => 1, // Tambah jumlah baju yang diambil
                    'ukuran' => $studentData['baju_size'],
                    'jenis' => 'baju',
                ]);

                $baju->decrement('total', 1);
            } else {
                return redirect()->back()->with('error', 'Stok baju tidak mencukupi untuk ukuran ' . $studentData['baju_size']);
            }
        }
    }

    return redirect()->back()->with('success', 'Data pengambilan berhasil disimpan.');
}

public function import(Request $request)
    {
        try {
            $request->validate([
                'file' => 'required|mimes:xlsx,xls',
            ]);

            Excel::import(new SiswaImport, $request->file('file'));

            return redirect()->route('siswa.index')->with('success', 'Berhasil.');
        } catch (Exception $e) {
            return redirect()->route('siswa.index')->with('error', 'Gagal' . $e->getMessage());
        }
    }
            
}
