<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    public function model(array $row)
    {
        return new Siswa([
            'nisn' => $row[0],
            'nama' => $row[1],
            'kelas' => $row[2],
            'status_pembayaran' => $row[3],
            'tahun_masuk_id' => $row[4],
        ]);
    }
}
