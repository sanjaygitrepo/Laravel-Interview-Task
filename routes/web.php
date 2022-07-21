<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
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

Route::match(['get', 'post'], 'login',[LoginController::class,'login'])->name('user.login');
Route::get('register',[RegisterController::class,'registerForm'])->name('user.registerForm');
Route::post('register',[RegisterController::class,'register'])->name('user.register');

Route::resource('events',EventController::class);

Route::fallback(function () {
	
    return redirect()->route('events.index');
});
