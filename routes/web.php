<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Website\CategoryController;
use App\Http\Controllers\Website\HomeController as WebsiteHomeController;
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

Route::get('/', WebsiteHomeController::class);
Route::get('category/{id}', CategoryController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
