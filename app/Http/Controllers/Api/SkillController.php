<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Expertise;

class SkillController extends Controller
{
    public function index()
    {
        return response()->json(Expertise::all());
    }
}
