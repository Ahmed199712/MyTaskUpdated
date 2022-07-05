<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\ProductController;

Route::get('/', [FrontendController::class,'index'])->name('frontend.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Cart Routes ..
Route::get('/cart' , [CartController::class,'index'])->name('carts.index');
Route::get('/add-to-cart/{product_id}' , [CartController::class,'addToCart'])->name('carts.add');
Route::get('/cart/delete/{rowId}' , [CartController::class,'deleteFromCart'])->name('carts.delete');

// Product Routes ...
Route::group(['prefix' => 'products'] , function(){
    Route::get('/' , [ProductController::class,'index'])->name('products.index');
    Route::get('/create' , [ProductController::class,'create'])->name('products.create');
    Route::get('/edit/{product}' , [ProductController::class,'edit'])->name('products.edit');
    Route::get('/show/{product}' , [ProductController::class,'show'])->name('products.show');
    Route::post('/store' , [ProductController::class,'store'])->name('products.store');
    Route::put('/update/{product}' , [ProductController::class,'update'])->name('products.update');
    Route::delete('/destroy/{product}' , [ProductController::class,'destroy'])->name('products.destroy');
});

// Route::resource('products',[ProductController::class]);
