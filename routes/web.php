<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SslCommerzPaymentController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('/');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile/edit', [App\Http\Controllers\HomeController::class, 'edit']);
Route::put('/profile/edit', [App\Http\Controllers\HomeController::class, 'update']);
Route::get('/profile/{username}', [App\Http\Controllers\HomeController::class, 'show']);
Route::get('/follow/{id}', [App\Http\Controllers\HomeController::class, 'followRequest']);
Route::get('/search', [App\Http\Controllers\HomeController::class, 'search']);

Route::resource('/story', PostController::class);
Route::get('/story/report/{id}', [PostController::class, 'report'])->name('story.report');

Route::resource('/admin', AdminController::class);
Route::resource('/packages', PackageController::class);
Auth::routes();

Route::get('/places/{id}', [PlaceController::class, 'show']);
Route::post('/places/{id}', [PlaceController::class, 'saveRating']) ;


// SSLCOMMERZ Start
Route::get('/example1/{id}', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/buypackage/{id}', [SslCommerzPaymentController::class, 'paymentGetWayCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END