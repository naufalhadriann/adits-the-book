<?php

use App\Http\Controllers\User\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/',[BookController::class,'index'])->name('home');
Route::get('/welcome', [BookController::class, 'index'])->name('book.index');
Route::get('/error', function () {
    return view('error.error');
});



require __DIR__.'/user.php';
require __DIR__.'/admin.php';
require __DIR__.'/auth.php';
