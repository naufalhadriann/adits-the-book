<?php

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/',[BookController::class,'index'])->name('home');
Route::get('/welcome', [BookController::class, 'index'])->name('book.index');
Route::get('/error', function () {
    return view('error.error');
});
Route::get('/search',[UserController::class,'search'])->name('search');




require __DIR__.'/user.php';
require __DIR__.'/admin.php';
require __DIR__.'/auth.php';
