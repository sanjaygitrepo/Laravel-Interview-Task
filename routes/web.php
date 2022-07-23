<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CategoryController;
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

Route::get('login',[LoginController::class,'login'])->name('user.login');
Route::post('login',[LoginController::class,'doLogin'])->name('user.doLogin');
Route::get('logout',[LoginController::class,'logout'])->name('user.logout')->middleware('guest');
Route::get('register',[RegisterController::class,'registerForm'])->name('user.registerForm');
Route::post('register',[RegisterController::class,'register'])->name('user.register');

Route::group(['middleware' => 'guest'], function () {
    //Route::resource('events',EventController::class);
    Route::get('categories/subcategories/{id}',[CategoryController::class,'subcategory']);
    Route::post('categories/add-subcategory',[CategoryController::class,'addSubcategory']);
    Route::resource('categories',CategoryController::class);

    Route::fallback(function () {

        return redirect()->route('categories.index');
    });
});
