<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backEnd\roomController;
use App\Http\Controllers\backEnd\blogController;
use App\Http\Controllers\backEnd\homeController;
use App\Http\Controllers\backEnd\categoryController;
use App\Http\Controllers\backEnd\imageController;
use App\Http\Controllers\backEnd\serviceController;
use App\Http\Controllers\backEnd\tagController;
use App\Http\Controllers\backEnd\tagRoomController;
use App\Http\Controllers\backEnd\priceController;
// Admin Controller
Route::prefix('admin')->name('admin.')->group(function () {
    Route::view('/login','backEnd.login')->name('login');
    Route::post('/login',[homeController::class,'store']);
    Route::middleware(['auth:admin'])->group(function(){
        Route::post('/logout',[homeController::class,'destroy'])->name('logout');
        Route::get('/home',[homeController::class,'index']);
        Route::resource('/category',categoryController::class);
        Route::resource('/room',roomController::class);
        Route::resource('/tag',tagController::class);
        Route::resource('/price',priceController::class);
        Route::resource('/tag_room',tagRoomController::class)->only('store','destroy');
        Route::resource('/service',serviceController::class);
        Route::resource('/image',imageController::class)->only('store','destroy');
        Route::resource('/blog',blogController::class);
    });
});
