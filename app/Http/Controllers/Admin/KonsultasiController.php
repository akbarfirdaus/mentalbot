<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KonsultasiController extends Controller
{
    function index()
    {
        return view('konsultasi.index');
    }
}
