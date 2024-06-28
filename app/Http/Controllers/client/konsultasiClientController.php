<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class konsultasiClientController extends Controller
{
    public function index()
    {
        return view('pointakses.client.konsultasi.konsultasi');
    }
}
