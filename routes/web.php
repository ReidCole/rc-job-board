<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// listing routes

Route::get('/', function () {
  return view('index');
});

Route::get('/listings', [ListingController::class, 'index']);

Route::get('/listings/create', [ListingController::class, 'create']);

Route::get('/listings/{id}/edit', [ListingController::class, 'edit']);

Route::get('/listings/{id}', [ListingController::class, 'show']);

Route::post('/listings', [ListingController::class, 'store']);

Route::put('/listings/{listing}', [ListingController::class, 'update']);

Route::delete('/listings/{listing}/delete', [ListingController::class, 'destroy']);

Route::get('/practice', [ListingController::class, 'practice']);

// user routes

Route::get('/signup', [UserController::class, 'signup'])->middleware('guest');

Route::post('/users', [UserController::class, 'store']);

Route::get('/account', [UserController::class, 'account'])->middleware('auth');

Route::get('/login', [UserController::class, 'login'])->middleware('guest')->name('login');

Route::post('/authenticate', [UserController::class, 'authenticate']);

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// application routes

Route::post('/listings/{id}/apply', [ApplicationController::class, 'apply'])->middleware('auth');
