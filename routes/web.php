<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\MemberController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Auth::routes();

// Route::get('/', [HomeController::class, 'index'])->name('selection');

// Route::group(['namespace' => 'Auth'], function () {

// Route::get('/login/{type}', [LoginController::class, 'loginForm'])->middleware('guest')->name('login.show');

// Route::post('/login', [LoginController::class, 'login'])->name('login');
//  });

// Route::middleware(['role:admin_role'], 'auth')->group(function () {

    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::get('mainCategory', [AdminController::class, 'createMainCategory'])->name('create_main_category');
    Route::post('mainCategory', [AdminController::class, 'storeMainCategories'])->name('add_main_category');

    Route::get('subCategory', [AdminController::class, 'createSubCategory'])->name('create_sub_category');
    Route::post('subCategory', [AdminController::class, 'storeSubCategories'])->name('add_sub_category');

    Route::get('book', [AdminController::class, 'createBook'])->name('create_book');
    Route::post('book', [AdminController::class, 'storeBook'])->name('add_book');
// });



Route::middleware('auth')->group(function () { 


    // Our resource routes
    Route::resource('roles', RoleController::class);
    Route::resource('users', MemberController::class);
});
