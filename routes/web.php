<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::get('/', function () {
        return view('auth.login');
    });

    Auth::routes();

    Route::middleware('auth')->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile.edit');
        Route::post('/profile', [App\Http\Controllers\UserController::class, 'update'])->name('profile.update');

        Route::resource('/vehicles', App\Http\Controllers\VehicleController::class);
        Route::resource('/vehiclesIn', App\Http\Controllers\VehicleInController::class);
    });

    // Admin
    Route::middleware('auth', 'admin')->group(function () {
        // Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
        Route::resource('/user', App\Http\Controllers\UserController::class);
        Route::resource('/customers', App\Http\Controllers\CustomerController::class);
        Route::resource('/categories', App\Http\Controllers\CategoryController::class);
        Route::resource('/vehiclesOut', App\Http\Controllers\VehicleOutController::class);
        Route::get('reports/index', [App\Http\Controllers\ReportController::class, 'index'])->name('reports.index');
    });


