<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CityController;
use App\Http\Controllers\Dashboard\ClientController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DonationController;
use App\Http\Controllers\Dashboard\GovernorateController;
use App\Http\Controllers\Dashboard\PostCntroller;
use App\Http\Controllers\Dashboard\ResetPasswordController;
use App\Http\Controllers\Dashboard\SettingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::get('admin', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('governorate', GovernorateController::class );
    Route::resource('city', CityController::class );
    Route::resource('category', CategoryController::class );
    Route::resource('post', PostCntroller::class );
    Route::resource('client', ClientController::class );
    Route::resource('donation', DonationController::class );
    Route::resource('setting', SettingController::class );

    Route::get('/reset-password', [ResetPasswordController::class, 'index'])->name('reset_password.index');
    Route::put('/reset-password', [ResetPasswordController::class, 'update'])->name('reset_password.update');
});
