<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = ['nisn', 'nama', 'kelas', 'status_pembayaran', 'tahun_masuk_id'];

    public function tahunMasuk()
    {
        return $this->belongsTo(TahunMasuk::class);
    }
}
