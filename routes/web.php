<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [SiteController::class, 'index'])->name('home');


Route::group(['middleware' => 'guest'], function() {
    Route::get('/register', [AuthController::class, 'create'])->name('register');
    Route::post('/register', [AuthController::class, 'store'])->name('create');
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function() {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('categories', CategoryController::class);
    // Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories');
    // Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    // Route::post('/categories/save', [CategoryController::class, 'store'])->name('admin.categories.save');
    // Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->where('id', '\d+')->name('admin.categories.edit');
    // Route::post('/categories/update/{id}', [CategoryController::class, 'update'])->where('id', '\d+')->name('admin.categories.update');
    // Route::post('/categories/delete/{id}', [CategoryController::class, 'delete'])->where('id', '\d+')->name('admin.categories.delete');
});


