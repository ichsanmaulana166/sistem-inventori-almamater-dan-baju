<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPengambilan extends Model
{
    use HasFactory;

    protected $table = 'laporan_pengambilans';

    protected $fillable = [
        'nisn',
        'tanggal',
        'jumlah',
        'ukuran',
        'jenis',
    ];
}

