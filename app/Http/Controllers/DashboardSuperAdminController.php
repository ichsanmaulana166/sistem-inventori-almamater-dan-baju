<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardSuperAdminController extends Controller
{
    public function index()
    {
        return view('dashboardsuperadmin');
    }
}
