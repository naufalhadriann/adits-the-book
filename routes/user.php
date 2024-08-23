<?php

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\User\BookController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProfileeController;
use App\Http\Controllers\User\UserProfilleController;

Route::middleware('auth')->group(function(){
    Route::get('/testing', function(){
        return view('user.testing');
    });

    Route::prefix('cart')->controller(CartController::class)->group(function (){
        Route::post('/remove','remove')->name('cart.remove');
        Route::post('/select-all','selectAll')->name('cart.selectAll');
        Route::post('/remove-all', 'removeAll')->name('cart.removeAll');
        Route::post('/update','update')->name('cart.update');
        Route::get('/', 'viewCart');
        Route::post('/','cart')->name('cart');
    });
    Route::get('/search',[UserController::class,'search'])->name('search');
    Route::get('/diskon',[BookController::class,'more'])->name('diskon');

    Route::get('/recommend',[BookController::class,'load'])->name('load');

    
    Route::get('/history', function(){
        return view('user.history.history');
    });
    Route::get('/book', function(){
        return view('user.product.product');
    });
    Route::get('/book/{title}',[BookController::class,'show'])->name('book.show');


    Route::get('/profile/edit', [UserProfilleController::class, 'edit'])->name('user.edit');
    Route::patch('/profile', [UserProfilleController::class, 'update'])->name('profile.update');
}); 