<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MikrotikController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'index'])->name('login'); 

Route::post('login', [AuthController::class, 'login'])->name('loginpost');

Route::get('mikrotik', [MikrotikController::class, 'index'])->name('home');

Route::post('mikrotik', [MikrotikController::class, 'store'])->name('home .store');
