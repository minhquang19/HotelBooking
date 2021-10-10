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
    Route::get('/contact',[contactController::class,'index'])->name('contact.index');
    Route::prefix('/booking')->name('booking.')->group(function(){
        Route::resource('/',bookingController::class)->only(['index','store', 'destroy'])->middleware('auth:web');
        Route::get('/add',[bookingController::class,'add'])->name('add');
        Route::post('/updateAvatar',[bookingController::class,'updateAvatar'])->name('updateAvatar');
        Route::post('/updateInfo',[bookingController::class,'updateInfo'])->name('updateinfo');
        Route::post('/payment',[bookingController::class,'payMent'])->name('payment');
        Route::post('/payment/online',[bookingController::class,'createPayment'])->name('createPayment');
        Route::get('/payment/return',[bookingController::class,'payMentReturn'])->name('payment.return');
        Route::get('/detail/',[bookingController::class,'bookingDetail'])->name('detail');
    });
});

require __DIR__.'/admin.php';
