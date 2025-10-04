<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPenambahan extends Model
{
    use HasFactory;

    // Tentukan tabel yang akan digunakan (opsional, jika tabel sesuai dengan nama model dalam bentuk jamak)
    protected $table = 'laporan_penambahan';

    // Tentukan kolom-kolom yang dapat diisi melalui mass assignment
    protected $fillable = [
        'tipe_barang',  // 'almamater' atau 'baju'
        'size',         // Ukuran barang
        'penambahan',   // Jumlah penambahan
        'tanggal'       // Tanggal penambahan
    ];


}
