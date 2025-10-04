<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanPengambilansTable extends Migration
{
    public function up()
    {
        Schema::create('laporan_pengambilans', function (Blueprint $table) {
            $table->id();
            $table->string('nisn'); // NISN siswa
            $table->date('tanggal'); // Tanggal pengambilan
            $table->integer('jumlah'); // Jumlah barang yang diambil
            $table->string('ukuran'); // Ukuran barang yang diambil
            $table->string('jenis'); // Jenis barang, misalnya 'almamater' atau 'baju'
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('laporan_pengambilans');
    }
}

