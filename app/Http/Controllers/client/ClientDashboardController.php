<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class clientDashboardController extends Controller
{
    public function index()
    {
        return view('pointakses.client.dashboard.dashboard');
    }
}
