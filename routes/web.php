<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AboutMeController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProfileController;


/*
|--------------------------------------------------------------------------
| Public Portfolio
|--------------------------------------------------------------------------
*/

Route::get('/', [ProjectController::class, 'index']);


/*
|--------------------------------------------------------------------------
| Admin Panel
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Dashboard

    Route::get('/admin', [ProjectController::class, 'dashboard'])
        ->name('admin.dashboard');


    // Projects

    Route::get('/admin/projects/create', [ProjectController::class, 'create'])
        ->name('projects.create');

    Route::post('/admin/projects', [ProjectController::class, 'store'])
        ->name('projects.store');

    Route::get('/admin/projects', [ProjectController::class, 'adminIndex'])
        ->name('projects.index');

    Route::get('/admin/projects/{project}/edit', [ProjectController::class, 'edit'])
        ->name('projects.edit');

    Route::put('/admin/projects/{project}', [ProjectController::class, 'update'])
        ->name('projects.update');

    Route::delete('/admin/projects/{project}', [ProjectController::class, 'destroy'])
        ->name('projects.destroy');


    // About Me

    Route::get('/admin/about', [AboutMeController::class, 'index'])
        ->name('about.index');

    Route::put('/admin/about', [AboutMeController::class, 'update'])
        ->name('about.update');


    // Skills

    Route::get('/admin/skills', [SkillController::class, 'index'])
        ->name('skills.index');

    Route::post('/admin/skills', [SkillController::class, 'store'])
        ->name('skills.store');

    Route::get('/admin/skills/{skill}/edit', [SkillController::class, 'edit'])
        ->name('skills.edit');

    Route::put('/admin/skills/{skill}', [SkillController::class, 'update'])
        ->name('skills.update');

    Route::delete('/admin/skills/{skill}', [SkillController::class, 'destroy'])
        ->name('skills.destroy');


    // Breeze Profile

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});


/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';