<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SkillController;
use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\ResearchController;
use App\Http\Controllers\Api\BiographyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Flutter / Mobile App এর জন্য সব API এখানে থাকবে
|--------------------------------------------------------------------------
*/

// 🔐 Default Sanctum User Route
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// ============================
// 🧠 SKILLS / EXPERTISE API
// ============================
Route::get('/skills', [SkillController::class, 'index']);


// ভবিষ্যতে দরকার হলে add করতে পারো:

// Route::get('/expertise', [ExpertiseController::class, 'index']);
// Route::post('/contact', [ContactController::class, 'store']);
// Route::get('/biography', [BiographyController::class, 'index']);

Route::get('/about', [AboutController::class, 'index']);
Route::get('/research', [ResearchController::class, 'index']);
Route::get('/biography', [BiographyController::class, 'index']);