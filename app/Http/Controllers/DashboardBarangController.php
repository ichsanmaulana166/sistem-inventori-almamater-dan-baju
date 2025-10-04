<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardBarangController extends Controller
{
    public function index()
    {
        return view('barang.index');
    }
}
