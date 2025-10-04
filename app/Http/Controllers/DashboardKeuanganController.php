<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardKeuanganController extends Controller
{
    public function index()
    {
        return view('tahun_masuk.index');
    }
}
