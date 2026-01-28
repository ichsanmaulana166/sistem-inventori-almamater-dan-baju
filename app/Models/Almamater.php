<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almamater extends Model
{
    use HasFactory;

    protected $table = 'almamater';

    protected $fillable = [
        'size',
        'total',
    ];

}
