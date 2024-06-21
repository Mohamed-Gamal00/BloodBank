<?php

use App\Http\Controllers\Website\Auth\ClientLoginController;
use App\Http\Controllers\Website\Auth\ClientRegisterController;
use App\Http\Controllers\Website\HomeController;
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

// Route::get('/', function () {
//     return view('website.home.index');
// });

// Route::get('/', [HomeController::class, 'index'])->name('home');



Auth::routes();

Route::get('/client-login', [ClientLoginController::class, 'index'])->name('client-login');
Route::post('check', [ClientLoginController::class, 'check'])->name('check-client');

Route::get('/client-register', [ClientRegisterController::class, 'index'])->name('client-register');

Route::middleware(['client'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/logout', [ClientLoginController::class, 'logout'])->name('client-logout');
});


