<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardSuperAdminController;
use App\Http\Controllers\DashboardKeuanganController;
use App\Http\Controllers\DashboardBarangController;
use App\Http\Controllers\TahunMasukController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LaporanPengambilanController;
use App\Http\Controllers\Auth\RegisteredUserController;


Route::post('/siswa/import', [SiswaController::class, 'import'])->name('siswa.import');
Route::get('/siswa/datatahunsiswa', [SiswaController::class, 'datahunsiswa'])->name('siswa.datatahunsiswa');


Route::get('/register', function () {
    return view('register');
})->middleware(['auth', 'verified'])->name('register');

Route::get('register', [RegisteredUserController::class, 'create'])
->name('register');

Route::post('register', [RegisteredUserController::class, 'store']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/tahun_masuk', [DashboardKeuanganController::class, 'index'])->middleware('role:admin keuangan');
    Route::get('/barang', [DashboardBarangController::class, 'index'])->middleware('role:admin barang');
    Route::get('/dashboardsuperadmin', [DashboardSuperAdminController::class, 'index'])->middleware('role:super admin');
});

Route::get('/dashboard_barang/laporan_pengambilan', [LaporanPengambilanController::class, 'index'])->name('laporan_pengambilan.index');


Route::post('/siswa/savePengambilan', [SiswaController::class, 'savePengambilan'])->name('siswa.savePengambilan');


Route::get('/barang/siswa', [SiswaController::class, 'getPaidStudents'])->name('barang.siswa');
Route::post('/barang/siswa/save', [SiswaController::class, 'saveStudentData'])->name('barang.siswa.save');


// Barang routes
Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
Route::get('/barang/laporan-penambahan', [BarangController::class, 'laporanPenambahan'])->name('barang.laporan-penambahan');


// Almamater CRUD routes
Route::get('/barang/almamater/create', [BarangController::class, 'createAlmamater'])->name('barang.create-almamater');
Route::post('/barang/almamater', [BarangController::class, 'storeAlmamater'])->name('barang.store-almamater');
Route::get('/barang/almamater/{id}/edit', [BarangController::class, 'editAlmamater'])->name('barang.edit-almamater');
Route::put('/barang/almamater/{id}', [BarangController::class, 'updateAlmamater'])->name('barang.update-almamater');
Route::delete('/barang/almamater/{id}', [BarangController::class, 'destroyAlmamater'])->name('barang.destroy-almamater');

// Baju CRUD routes
Route::get('/barang/baju/create', [BarangController::class, 'createBaju'])->name('barang.create-baju');
Route::post('/barang/baju', [BarangController::class, 'storeBaju'])->name('barang.store-baju');
Route::get('/barang/baju/{id}/edit', [BarangController::class, 'editBaju'])->name('barang.edit-baju');
Route::put('/barang/baju/{id}', [BarangController::class, 'updateBaju'])->name('barang.update-baju');
Route::delete('/barang/baju/{id}', [BarangController::class, 'destroyBaju'])->name('barang.destroy-baju');


Route::resource('tahun_masuk', TahunMasukController::class);
Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::resource('siswa', SiswaController::class);
Route::post('/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
Route::get('/laporan', [SiswaController::class, 'laporan'])->name('laporan.index');



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboardsuperadmin', function () {
    return view('dashboardsuperadmin');
})->middleware(['auth', 'verified'])->name('dashboardsuperadmin');

Route::get('/dashboard', function () {
    $user = auth()->user();
    
    switch ($user->role) {
        case 'super admin':
            return redirect('/dashboardsuperadmin');
        case 'admin keuangan':
            return redirect('/tahun_masuk');
        case 'admin barang':
            return redirect('/barang');
        default:
            return redirect('/'); // Halaman default
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
