<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\MediaController;

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', [DashboardController::class, 'index']);
Route::get('/admin/login', [AuthController::class, 'show'])
    ->name('login');

Route::post('/admin/login', [AuthController::class, 'login']);

Route::middleware('auth')->prefix('admin')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/', [DashboardController::class, 'index'])
        ->middleware('role:admin,contributor');

    Route::resource('content', ContentController::class)
        ->except(['show'])
        ->middleware('role:admin,contributor');

    Route::resource('users', UserController::class)
        ->only(['index', 'store', 'update'])
        ->middleware('role:admin');

    Route::get('/settings', [SettingsController::class, 'index'])
        ->middleware('role:admin,super-admin');

    Route::put('/settings', [SettingsController::class, 'update'])
        ->middleware('role:admin,super-admin');

    Route::resource('media', MediaController::class)
        ->only(['index', 'store', 'destroy'])
        ->middleware('role:admin,super-admin');

    Route::resource('categories', CategoryController::class)
        ->only(['index', 'store', 'update', 'destroy'])
        ->middleware('role:admin');
});

Route::view('/admin/health', 'admin.health')
    ->middleware('auth');
