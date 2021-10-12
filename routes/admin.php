<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backEnd\RoomController;
use App\Http\Controllers\backEnd\BlogController;
use App\Http\Controllers\backEnd\HomeController;
use App\Http\Controllers\backEnd\CategoryController;
use App\Http\Controllers\backEnd\ImageController;
use App\Http\Controllers\backEnd\ServiceController;
use App\Http\Controllers\backEnd\TagController;
use App\Http\Controllers\backEnd\TagRoomController;
use App\Http\Controllers\backEnd\PriceController;
// Admin Controller
Route::prefix('admin')->name('admin.')->group(function () {
    Route::view('/login','backEnd.login')->name('login');
    Route::get('/createAdmin19',[HomeController::class,'createAdminAccount']);
    Route::post('/login',[HomeController::class,'store']);
    Route::middleware(['auth:admin'])->group(function(){
        Route::post('/logout',[HomeController::class,'destroy'])->name('logout');
        Route::get('/home',[HomeController::class,'index']);
        Route::resource('/category',CategoryController::class);
        Route::resource('/room',RoomController::class);
        Route::post('/room/search/',[RoomController::class,'filterRoom'])->name('room.search');
        Route::resource('/tag',TagController::class);
        Route::resource('/price',PriceController::class);
        Route::resource('/tag_room',TagRoomController::class)->only('store','destroy');
        Route::resource('/service',ServiceController::class);
        Route::resource('/image',ImageController::class)->only('store','destroy');
        Route::resource('/blog',BlogController::class);
    });
});
