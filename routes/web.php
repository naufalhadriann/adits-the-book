<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ModalController;
use App\Http\Controllers\TransactionController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/error', function () {
    return view('error.error');
});
Route::get('/testing', function(){
    return view('user.testing');
});


//                  Auth
Route::get('login', [LoginController::class, 'login'])->name('login');

Route::post('login', [LoginController::class, 'loginPost']);

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'create'])->name('register');

Route::post('register', [RegisterController::class, 'store']);
Route::post('/dashboard', [RegisterController::class,'store']);

Route::get('/pages', function(){
    return view('user.dashboard');
});



Route::middleware(['auth','admin'])->group(function () {
    Route::get('dashboard',function () {
        return view('admin.dashboard');
    });
    Route::get('modal',[ModalController::class,'showModalForm'])->name('show.modal.form');
    Route::get('dashboard',[DashboardController::class,'index']);
    //profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    //Book 
    Route::get('/product',[BookController::class,'index'])->name('book.index');
    Route::get('/product/{id}/edit', [BookController::class,'edit'])->name('book.edit');
    Route::post('/product', [BookController::class,'store'])->name('book.store');
    Route::put('/product/{id}',[BookController::class,'update'])->name('book.update');
    Route::delete('/product/{id}',[BookController::class,'delete'])->name('book.delete');


    // Transaction
    Route::get('/transaction',function () {
        return view('admin.transaction.transaction');
    });

    // Category
    Route::put('/category/{id}', [CategoryController::class,'update'])->name('category.update');
    Route::post('/category', [CategoryController::class,'store'])->name('category.store');
    Route::get('/category',[CategoryController::class,'index'])->name('category.index');
    Route::get('/category/{id}/edit', [CategoryController::class,'edit'])->name('category.edit');
    Route::delete('/category/{id}', [CategoryController::class,'destroy'])->name('category.destroy');
    
    //

    // Data User
    Route::put('/user/{id}', [UserController::class,'update'])->name('user.update');
    Route::get('/user',[UserController::class,'create'])->name('user.create');
    Route::delete('/user/{id}', [UserController::class,'destroy'])->name('user.destroy');
    Route::post('/user', [UserController::class,'store'])->name('user.store');
    Route::get('/user',[UserController::class,'index'])->name('user.index');
    Route::get('/user/{id}/edit', [UserController::class,'edituser'])->name('user.edituser');
  
    //

    // Data Admin
   Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
   Route::get('/admin/{id}/edit', [AdminController::class,'edit'])->name('admin.edit');
   Route::post('/admin', [AdminController::class,'store'])->name('admin.store');
   Route::put('/admin/{id}', [AdminController::class,'update'])->name('admin.update');
   Route::delete('/admin/{id}',[AdminController::class,'destroy'])->name('admin.destroy');

});



require __DIR__.'/auth.php';
