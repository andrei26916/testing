<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FeedbackController;
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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'auth'])->name('auth');

Route::get('/registration', [RegisterController::class, 'registration'])->name('registration');
Route::post('/registration', [RegisterController::class, 'register'])->name('register');

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/', [FeedbackController::class, 'show'])->name('show');

Route::post('/store', [FeedbackController::class, 'store'])->name('store')->middleware('auth');
