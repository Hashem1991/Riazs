<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{



    public function index()
{
    $totalBiography = \App\Models\Biography::count();

    return view('backend.dashboard');
}
}

