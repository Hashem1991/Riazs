<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutMe;

class AboutController extends Controller
{
    public function index()
    {
        return response()->json(AboutMe::first());
    }
}