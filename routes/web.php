<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PlaceController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::resource('/admin', AdminController::class);
Auth::routes();

Route::get('/places/{id}', [PlaceController::class, 'show']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
