<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerifiedMiddleware;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('welcome');
// });

Route::post('/user', [UserController::class,'UserRegisgter']);

Route::post('/user/login', [UserController::class,'UserLogin']);

Route::post('/user/otp', [UserController::class,'OTPMail']);

Route::post('/user/send-otp', [UserController::class,'OTPVerified']);

//token verified and reset passeword
Route::post('/user/resetPassword', [UserController::class,'resetPassword'])
            ->middleware(TokenVerifiedMiddleware::class);


