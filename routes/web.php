<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\GoodController as AdminGoodController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\GoodController;
use App\Http\Controllers\ReviewController;
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

Route::get('/catalog', [GoodController::class, 'index'])->name('catalog.index');
Route::get('/catalog/{url}', [GoodController::class, 'show'])->name('catalog.view');

Route::group(['middleware' => 'guest'], function() {
    Route::get('/register', [AuthController::class, 'create'])->name('register');
    Route::post('/register', [AuthController::class, 'store'])->name('create');
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function() {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/goods', AdminGoodController::class);
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/favorite', [FavoriteController::class, 'index'])->name('favorite.index');
    Route::post('/favorite/add/{good}', [FavoriteController::class, 'add'])->name('favorite.add');
    Route::post('/favorite/remove/{good}', [FavoriteController::class, 'remove'])->name('favorite.remove');
});

Route::post('review/create', [ReviewController::class, 'store'])->name('review.store');




