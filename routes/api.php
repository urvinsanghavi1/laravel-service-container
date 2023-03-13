<?php

use App\Http\Controllers\API\PaymentGetwayController;
use App\Http\Controllers\API\RegisterController;
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

Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::group( ['middleware' => ['auth:sanctum']], function() {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::controller(PaymentGetwayController::class)->group(function() {
        Route::post('/addCardDetails', 'store');
    });

});

