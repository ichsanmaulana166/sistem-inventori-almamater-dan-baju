<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunMasuk extends Model
{
    use HasFactory;

    protected $table = 'tahun_masuks';
    protected $fillable = ['tahun'];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
