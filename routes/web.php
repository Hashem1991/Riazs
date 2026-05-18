<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BiographyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Backend\MessageController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\CVController;

/*
|--------------------------------------------------------------------------
| FRONTEND ROUTES (6 PAGES)
|--------------------------------------------------------------------------
*/

Route::get('/cv/pdf', [CVController::class, 'downloadPDF'])->name('cv.pdf');
Route::get('/cv/word', [CVController::class, 'downloadWord'])->name('cv.word');

Route::controller(BiographyController::class)->group(function () {

    // Home
    Route::get('/', 'home')->name('home');

    // About Me
    Route::get('/about-me', 'aboutMe')->name('about');

    // Biography
    Route::get('/biography', 'biography')->name('biography.front');

    // Research
    Route::get('/research', 'research')->name('research.front');

    // Expertise
    Route::get('/expertise', 'expertiseFront')->name('expertise.front');

    // Contact
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
    
});


/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
  
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

   

    // Index (list)
    Route::get('/biography', [BiographyController::class, 'biographies'])
        ->name('biography.index');

    // Create form
    Route::get('/biography/create', [BiographyController::class, 'biographycreate'])
        ->name('biography.create');

    // Store
    Route::post('/biography', [BiographyController::class, 'store'])
        ->name('biography.store');

    // Show (single)
    Route::get('/biography/{id}', [BiographyController::class, 'show'])
        ->name('biography.show');

    // Edit form
    Route::get('/biography/{id}/edit', [BiographyController::class, 'edit'])
        ->name('biography.edit');

    // Update
    Route::put('/biography/{id}', [BiographyController::class, 'update'])
        ->name('biography.update');

    // Delete
    Route::delete('/biography/{id}', [BiographyController::class, 'destroy'])
        ->name('biography.destroy');
        /*
    |--------------------------------------------------------------------------
    | EXPERTISE
    |--------------------------------------------------------------------------
    */

    Route::get('/expertise', [BiographyController::class, 'expertise'])
        ->name('expertise.index');

    Route::get('/expertise/create', [BiographyController::class, 'createExpertise'])
        ->name('expertise.create');

    Route::post('/expertise', [BiographyController::class, 'storeExpertise'])
        ->name('expertise.store');

    Route::get('/expertise/{id}/edit', [BiographyController::class, 'editExpertise'])
        ->name('expertise.edit');
 Route::put('/expertise/{id}', [BiographyController::class, 'updateexpertise'])
        ->name('expertise.update');
    Route::delete('/expertise/{id}', [BiographyController::class, 'deleteExpertise'])
        ->name('expertise.delete');


    /*
    |--------------------------------------------------------------------------
    | RESEARCH
    |--------------------------------------------------------------------------
    */

    Route::get('/research', [BiographyController::class, 'researchAdmin'])
        ->name('research.index');

    Route::get('/research/create', [BiographyController::class, 'createResearch'])
        ->name('research.create');

    Route::post('/research', [BiographyController::class, 'storeResearch'])
        ->name('research.store');

    Route::delete('/research/{id}', [BiographyController::class, 'deleteResearch'])
        ->name('research.destroy');

Route::get('/research/{id}/edit', [BiographyController::class, 'editResearch'])
    ->name('research.edit');

Route::put('/research/{id}', [BiographyController::class, 'updateResearch'])
    ->name('research.update');
    /*
    |--------------------------------------------------------------------------
    | ABOUT
    |--------------------------------------------------------------------------
    */

    Route::get('/about', [BiographyController::class, 'about'])
        ->name('about.index');

    Route::get('/about/create', [BiographyController::class, 'createAbout'])
        ->name('about.create');

    Route::post('/about', [BiographyController::class, 'storeAbout'])
        ->name('about.store');

    Route::get('/about/edit', [BiographyController::class, 'editAbout'])
        ->name('about.edit');

    Route::put('/about', [BiographyController::class, 'updateAbout'])
        ->name('about.update');

    Route::delete('/about', [BiographyController::class, 'deleteAbout'])
        ->name('about.delete');

        //Contact ME 
     Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');



Route::get('/messages/{id}', [MessageController::class, 'show'])->name('messages.show');

Route::delete('/messages/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');
});