<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function bio(Request $request)
    {
        return view('dashboard.bio');
    }

    public function log()
    {
        return view('dashboard.log');
    }
}
