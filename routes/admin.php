<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\TagRoomController;
use App\Http\Controllers\Admin\PriceController;
// Admin Controller
Route::prefix('admin')->name('admin.')->group(function () {
    Route::view('/login','backEnd.login')->name('login');
    Route::get('/createAdmin19',[HomeController::class,'createAdminAccount']);
    Route::post('/login',[HomeController::class,'store']);
    Route::middleware(['auth:admin'])->group(function(){
        Route::post('/logout',[HomeController::class,'destroy'])->name('logout');
        Route::get('/',[HomeController::class,'index']);
        Route::resource('/category',CategoryController::class);
        Route::resource('/room',RoomController::class);
        Route::post('/room/search/',[RoomController::class,'filterRoom'])->name('room.search');
        Route::resource('/tag',TagController::class);
        Route::resource('/price',PriceController::class);
        Route::resource('/booking',BookingController::class);
        Route::resource('/tag_room',TagRoomController::class)->only('store','destroy');
        Route::resource('/service',ServiceController::class);
        Route::resource('/image',ImageController::class)->only('store','destroy');
        Route::resource('/blog',BlogController::class);
    });
});
