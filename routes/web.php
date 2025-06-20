<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotPasswordController;

Route::get('/', function () {
    return view('login');
})->name('welcome');

Route::middleware('auth')->group(function () {
    Route::resource('posts', PostController::class);
});



Route::get('/login',[LoginController::class,'login'])->name('login'); 
Route::post('/login',[LoginController::class,'loginPost'])->name('login.post'); 
Route::get('/registration',[LoginController::class,'registration'])->name('registration'); 
Route::post('/registration',[LoginController::class,'registrationPost'])->name('registration.post'); 
Route::get('/logout',[LoginController::class,'logout'])->name('logout'); 

Route::get('/forgot',[ForgotPasswordController::class,'forgotPassword'])->name('forgot'); 
Route::post('/forgot',[ForgotPasswordController::class,'forgotPasswordPost'])->name('forgot.post'); 
