<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::post('/register', [UserController::class, 'store'])->name('user.store');

Route::post('/store-account', [AccountController::class, 'store'])->name('account.store');


//add web middleware to all routes
Route::group(['middleware' => 'web'], function () {
  Route::get('/deposit', [AccountController::class, 'initiateDeposit'])->name('account.deposit');
 Route::post('/deposit', [AccountController::class, 'deposit'])->name('deposit');

Route::get('/withdraw', [AccountController::class, 'initiateWithdraw'])->name('account.withdraw');
Route::post('/withdraw', [AccountController::class, 'withdraw'])->name('withdraw');

Route::get('/dashboard', [AccountController::class, 'index'])->name('dashboard');
});

