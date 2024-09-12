<?php

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\User\BookController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\PaymentController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProfileeController;
use App\Http\Controllers\User\UserProfilleController;

Route::middleware('auth')->group(function(){
Route::post('/cart/payment', [PaymentController::class, 'index'])->name('payment.index');
Route::post('/payment/checkout', [PaymentController::class, 'checkout'])->name('payment.checkout');
    
   

Route::get('/payment/success', function () {
    return view('user.payment.success');
})->name('user.payment.success');
   

    Route::prefix('cart')->controller(CartController::class)->group(function (){
        Route::post('/remove','remove')->name('cart.remove');
        Route::post('/select-all','selectAll')->name('cart.selectAll');
        Route::post('/update','update')->name('cart.update');
        Route::get('/', 'viewCart')->name('cart.view');
        Route::post('/','cart')->name('cart');
    });
    Route::get('/diskon',[BookController::class,'more'])->name('diskon');
    Route::get('/recommend',[BookController::class,'load'])->name('load');
    Route::get('/cart/payment/success', function(){
        return view('user.payment.success');
    });
    Route::get('/filter-price', [UserController::class, 'filterPrice'])->name('filterPrice');
    Route::get('/history', function(){
        return view('user.history.history');
    });
    Route::get('/book', function(){
        return view('user.product.product');
    });

    Route::get('/profile/edit', [UserProfilleController::class, 'edit'])->name('user.edit');
    Route::patch('/profile', [UserProfilleController::class, 'update'])->name('profile.update');
}); 