<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporan_penambahan', function (Blueprint $table) {
            $table->id();
            $table->string('tipe_barang'); // 'almamater' atau 'baju'
            $table->string('size');
            $table->integer('penambahan');
            $table->date('tanggal');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_penambahan');
    }
};
