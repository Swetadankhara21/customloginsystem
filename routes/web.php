<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
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
    return view('welcome');
});
Route::get('/login',[CustomAuthController::class,'login'])->middleware('alerylogin');
Route::post('/login-user',[CustomAuthController::class,'loginuser'])->name('login-user');

Route::get('/register',[CustomAuthController::class,'register'])->middleware('alerylogin');
Route::post('/register-user',[CustomAuthController::class,'registeruser'])->name('register-user');

Route::get('/dashboard',[CustomAuthController::class,'dashboard'])->middleware('isLoggedIn');
Route::get('/logout',[CustomAuthController::class,'logout']);
