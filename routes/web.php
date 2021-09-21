<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontEnd\homeController;
use App\Http\Controllers\frontEnd\roomController;
use App\Http\Controllers\frontEnd\blogController;
use App\Http\Controllers\frontEnd\bookingController;
use App\Http\Controllers\frontEnd\serviceController;
use App\Http\Controllers\frontEnd\langController;
use App\Http\Controllers\frontEnd\contactController;
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
Auth::routes();

Route::prefix('')->group(function(){
    Route::get('/',[homeController::class,'index'])->name('home.index');
    Route::resource('/room',roomController::class)->only('index','show');
    Route::resource('/blog',blogController::class)->only('index','show');
    Route::resource('/service',serviceController::class)->only('index','show');
    Route::get('lang/{locale}',[langController::class,'index'])->name('lang');
    Route::resource('/booking',bookingController::class)->only(['index','store', 'destroy'])->middleware('auth:web');
    Route::get('booking/add',[bookingController::class,'add'])->name('booking.add');
    Route::get('/contact',[contactController::class,'index'])->name('contact.index');
});

require __DIR__.'/admin.php';
