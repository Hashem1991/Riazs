<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Research as ModelsResearch;
use Illuminate\Http\Request;
use Apps\Models\Research;

class ResearchController extends Controller
{

   public function index()
    {
        return response()->json(ModelsResearch::all());
    }
}

