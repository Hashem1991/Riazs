<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Biography;
use Illuminate\Http\Request;

class BiographyController extends Controller
{
    // GET SINGLE BIO (main profile)
    public function index()
    {
        return response()->json(Biography::all());
    }
}