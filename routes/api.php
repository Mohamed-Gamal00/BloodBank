<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DonationController;
use App\Http\Controllers\Api\MainController;
use App\Http\Controllers\Api\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [AuthController::class, "register"]);
Route::post('login', [AuthController::class, "login"]);
Route::get('blood_types', [MainController::class, "blood_types"]);

Route::get('governorates', [MainController::class, "governorates"]);
Route::get('cities', [MainController::class, "cities"]);

Route::get('categories', [MainController::class, "categories"]);
Route::get('posts', [MainController::class, "posts"]);
Route::get('post/{id}', [MainController::class, "post"]);

Route::post('contact-us', [MainController::class, "contactus"]);

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('notifications', [AuthController::class, "notifications"]);
    Route::get('notification/{id}', [AuthController::class, "notification"]);
    Route::post('register-token', [AuthController::class, "registerToken"]);
    Route::post('remove-token', [AuthController::class, "removeToken"]);
    Route::post('notification-settings', [AuthController::class, "notificationSettings"]);
    Route::get('settings', [AuthController::class, "settings"]);
    Route::get('profile', [AuthController::class, "profile"]);
    Route::post('profileUpdate', [AuthController::class, "profileUpdate"]);
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('donations', [DonationController::class, "donations"]);
    Route::get('donation/{id}', [DonationController::class, "donation"]);
    Route::post('donation/create', [DonationController::class, "createDonation"]);
});
    Route::post('toggleFavourite', [MainController::class, "toggleFavourite"]);
    Route::get('listFavourites', [MainController::class, "listFavourites"]);

//********************************************************************* */
  Route::get('test', [TestController::class, "test"]);
