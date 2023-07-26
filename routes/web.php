<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\multirocontroller;
use App\Http\Controllers\nservicecontroller;
// use App\Http\Controllers\AuthController;
use App\Http\Controllers\MikrotikController;
use App\Http\Controllers\GuzzleController;
use App\Http\Controllers\UserController;


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

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'index'])->name('loginin');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('loginin');

// Route::get('register', [LoginController::class, 'store'])->name('registerpost');

// Route::get('/', 'LoginController@showRegistrationForm')->name('register');
// Route::post('/register', 'LoginController@register');

Route::get('/multiro', [multiroController::class, 'index'])->name('multiro.index');

// Route::get('/login', [AuthController::class, 'index'])->name('login');

// Route::post('login', [AuthController::class, 'login'])->name('loginpost');

Route::get('mikrotik', [MikrotikController::class, 'index'])->name('home');

Route::post('mikrotik', [MikrotikController::class, 'store'])->name('home.store');

Route::get('guzzle', [GuzzleController::class, 'index'])->name('guzzlehttp');


Route::resource('users', UserController::class)->middleware('can:admin'); //penerapan can admin


// Route::middleware(['auth'])->group(function () {
//     Route::resource('multiro', MultiroController::class);

//     Route::resource('nservice', nservicecontroller::class)->middleware('can:staff'); // penerapan can staff
//     Route::get('logout','LoginController@logout')->name('admin.register');

//     Route::middleware(['auth', 'can:admin'])->group(function () {
//         Route::post('logout', 'LoginAdminController@logout')->name('admin.logout');
//         // Route::view('/', 'multiro')->name('multiro');
//         Route::view('/nservices', 'nservices')->middleware('can:staff');
//         Route::view('index', 'users')->middleware('can:role,admin')->name('users');
//         Route::view('index', 'nservice')->middleware('can:role,staff')->name('nservice');
//     });

// });

// Route::view('/multiro', 'data-admin')->name('admin')->middleware('can:admin');
// Route::view('/nservice', 'data-staff')->name('staff')->middleware('can:staff');

// Route::redirect('/', 'register');

// Route::get('register', function () {
//     return 'Register';
// });

