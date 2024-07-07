<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pointakses.admin.dashboard.index');
    }

    public function tabs()
    {
        return view('pointakses.admin.dashboard.tabs');
    }
}
