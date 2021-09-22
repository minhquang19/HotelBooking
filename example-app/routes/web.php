<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontEnd\roomController;
use App\Http\Controllers\frontEnd\homeController;
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
Route::prefix('')->group(function(){
    Route::get('/',[homeController::class,'index'])->name('home.index');
    Route::resource('/room',roomController::class)->only('index','show');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
