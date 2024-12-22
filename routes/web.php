<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[App\Http\Controllers\FrontController::class,'shop'])->name('shop');

Route::get('/shop-item/{id}',[App\Http\Controllers\FrontController::class,'ShopItem'])->name('shop-item');

Route::get('item-carts',[App\Http\Controllers\FrontController::class,'carts'])->name('item-carts.carts');

Route::post('order-now',[App\Http\Controllers\FrontController::class,'orderNow'])->name('orderNow');

Route::group(['middleware'=>['auth','role:Super Admin|Admin'],'prefix'=>'backend','as'=>'backend.'],function(){
    Route::get('/',[App\Http\Controllers\Admin\DashboardController::class,'index'])->name('dashboard');
    Route::resource('items',App\Http\Controllers\Admin\ItemController::class);
    Route::resource('categories',App\Http\Controllers\Admin\CategoryController::class);


});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
