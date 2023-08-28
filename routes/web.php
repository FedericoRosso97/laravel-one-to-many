<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashController as AdminDashController;
use App\Http\Controllers\Guest\DashboardController as DashController;
use App\Http\Controllers\Admin\PostController as PostController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [ AdminDashController::class , 'home'])->name('home');
    Route::resource('/posts', PostController::class);
});

Route::prefix('guest')->name('guest')->group(function () {
    Route::get('/home', [ DashController::class , 'home'])->name('home');
 
});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
