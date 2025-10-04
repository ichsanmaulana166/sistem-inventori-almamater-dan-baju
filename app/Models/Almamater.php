<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almamater extends Model
{
    use HasFactory;

    protected $table = 'almamater';

    // Kolom yang dapat diisi
    protected $fillable = [
        'size',
        'total',
    ];

    // Jika ada logika tambahan, metode bisa ditambahkan di sini
}
