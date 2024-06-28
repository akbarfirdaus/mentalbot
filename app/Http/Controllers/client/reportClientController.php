<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class reportClientController extends Controller
{
    public function index()
    {
        return view('pointakses.client.report.report');
    }

    public function riwayat()
    {
        return view('pointakses.client.report.riwayat');
    }
}
