<?php

use App\Http\Controllers\Website\Auth\ClientLoginController;
use App\Http\Controllers\Website\Auth\ClientRegisterController;
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
    return view('website.home.index');
});




Auth::routes();

Route::get('/client-login', [ClientLoginController::class, 'index'])->name('client-login');
Route::get('/client-register', [ClientRegisterController::class, 'index'])->name('client-register');

Route::middleware(['auth:clients'])->group(function () {
});


