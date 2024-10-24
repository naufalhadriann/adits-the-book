<?php

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\BookController;
use Illuminate\Support\Facades\Route;



    Route::get('/',[BookController::class,'index'])->name('home');
    Route::get('/welcome', [BookController::class, 'index'])->name('book.index');

    Route::get('/search', [UserController::class, 'search'])->name('search');
    Route::post('/search', [UserController::class, 'search'])->name('search');
    Route::get('/book/{title}',[BookController::class,'show'])->name('book.show');

Route::get('/error', function () {
    return view('error.error');
});

require __DIR__.'/user.php';
require __DIR__.'/admin.php';
require __DIR__.'/auth.php';
