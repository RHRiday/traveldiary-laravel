<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\HireController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PostController;
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
Route::get('/memberships', [AdminController::class, 'membership']);
Route::post('/memberships/{id}', [AdminController::class, 'approval']);

Route::resource('/packages', PackageController::class);
Route::resource('/guides', GuideController::class);
Route::post('/guides/{id}/apply', [HireController::class, 'applications'])->name('guides.apply');
Auth::routes();

Route::get('/places', [PlaceController::class, 'index']);
Route::get('/places/{id}', [PlaceController::class, 'show']);
Route::post('/places/{id}', [PlaceController::class, 'saveRating']);
Route::get('/places/{id}/hire', [HireController::class, 'create']);
Route::post('/places/{id}/hire', [HireController::class, 'store'])->name('hires.store');

Route::get('/hires', [HireController::class, 'index']);
Route::get('/hires/{id}', [HireController::class, 'show'])->name('hires.show');
Route::post('/hires/{id}', [HireController::class, 'hire'])->name('hires.hire');
