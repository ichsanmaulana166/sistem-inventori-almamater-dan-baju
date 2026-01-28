<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPenambahan extends Model
{
    use HasFactory;

    protected $table = 'laporan_penambahan';

    protected $fillable = [
        'tipe_barang',  
        'size',         
        'penambahan',   
        'tanggal'       
    ];


}
