<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TransactionController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;




Route::middleware(['auth','admin'])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    //profile
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('admin.profile.update');


    //Book 
    Route::prefix('product')->controller(BookController::class)->group( function(){
        Route::get('/','index')->name('book.index');
        Route::get('/{id}/edit', 'edit')->name('book.edit');
        Route::post('/', 'store')->name('book.store');
        Route::put('/{id}','update')->name('book.update');
        Route::delete('/{id}','destroy')->name('product.destroy');
    });
  


    // Transaction
    Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction.index');

    // Category
    Route::prefix('category')->controller(CategoryController::class)->group( function (){
        Route::put('/{id}', 'update')->name('category.update');
        Route::post('/', 'store')->name('category.store');
        Route::get('/','index')->name('category.index');
        Route::get('/{id}/edit', 'edit')->name('category.edit');
        Route::delete('/{id}', 'destroy')->name('category.destroy');
    });

    
    //

    // Data User
    Route::prefix('user')->controller(UserController::class)->group(function(){
        Route::put('/{id}', 'update')->name('user.update');
        Route::get('/','create')->name('user.create');
        Route::delete('/{id}', 'destroy')->name('user.destroy');
        Route::post('/', 'store')->name('user.store');
        Route::get('/','index')->name('user.index');
        Route::get('/{id}/edit', 'edituser')->name('user.edituser');
    });
   
  
    //

    // Data Admin
    Route::prefix('admin')->controller(AdminController::class)->group( function(){
        Route::get('/','index')->name('admin.index');
        Route::get('/{id}/edit','edit')->name('admin.edit');
        Route::post('/','store')->name('admin.store');
        Route::put('/{id}','update')->name('admin.update');
        Route::delete('/{id}','destroy')->name('admin.destroy');
    });

});

