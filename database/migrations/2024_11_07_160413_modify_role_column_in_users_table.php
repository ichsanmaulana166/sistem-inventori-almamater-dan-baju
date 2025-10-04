<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyRoleColumnInUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Ubah tipe kolom role menjadi enum dengan pilihan 'admin keuangan' dan 'admin barang'
            $table->enum('role', ['admin keuangan', 'admin barang'])->default('admin barang')->change();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Kembalikan kolom role menjadi string jika diperlukan
            $table->string('role')->default('admin barang')->change();
        });
    }
}

