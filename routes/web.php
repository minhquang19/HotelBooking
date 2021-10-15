<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEnd\HomeController;
use App\Http\Controllers\FrontEnd\RoomController;
use App\Http\Controllers\FrontEnd\BlogController;
use App\Http\Controllers\FrontEnd\BookingController;
use App\Http\Controllers\FrontEnd\ServiceController;
use App\Http\Controllers\FrontEnd\LangController;
use App\Http\Controllers\FrontEnd\ContactController;
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
    Route::get('/',[HomeController::class,'index'])->name('home.index');
    Route::resource('/room',RoomController::class)->only('index','show');
    Route::resource('/blog',BlogController::class)->only('index','show');
    Route::resource('/service',ServiceController::class)->only('index','show');
    Route::get('lang/{locale}',[LangController::class,'index'])->name('lang');
    Route::get('/contact',[ContactController::class,'index'])->name('contact.index');
    Route::prefix('/booking')->name('booking.')->group(function(){
        Route::resource('/',BookingController::class)->only(['index','store', 'destroy'])->middleware('auth:web');
        Route::get('/add',[BookingController::class,'add'])->name('add');
        Route::post('/updateAvatar',[BookingController::class,'updateAvatar'])->name('updateAvatar');
        Route::post('/updateInfo',[BookingController::class,'updateInfo'])->name('updateinfo');
        Route::post('/payment',[BookingController::class,'payMent'])->name('payment');
        Route::post('/payment/online',[BookingController::class,'createPayment'])->name('createPayment');
        Route::get('/payment/return',[BookingController::class,'payMentReturn'])->name('payment.return');
        Route::get('/detail/',[BookingController::class,'bookingDetail'])->name('detail');
    });
});

require __DIR__.'/admin.php';
