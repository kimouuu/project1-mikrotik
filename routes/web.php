<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\multirocontroller;
use App\Http\Controllers\nservicecontroller;
use App\Http\Controllers\AuthController;
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

//

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'view'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'index'])->name('loginin');
Route::post('/login', [LoginController::class, 'store'])->name('loginin');

// Route::get('multiro', [multiroController::class, 'index'])->name('multiro.index');

Route::get('mikrotik', [MikrotikController::class, 'index'])->name('home');

Route::post('mikrotik', [MikrotikController::class, 'store'])->name('home.store');

Route::get('guzzle', [GuzzleController::class, 'index'])->name('guzzlehttp');

//gatau
// Route::get('register', [LoginController::class, 'store'])->name('registerpost');

Route::middleware(['auth'])->group(function () {
    Route::resource('multiro', MultiroController::class);
    Route::post('logout', LogoutController::class)->name('logout');

    Route::resource('nservice', nservicecontroller::class)->middleware('can:staff'); // penerapan can staff

    // Route::get('/multiro', [multiroController::class, 'index'])->name('multiro.index');

    Route::middleware(['can:admin'])->group(function () {
        Route::resource('users', UserController::class); //penerapan can admin
        // Route::view('/', 'welcome')->name('multiro');
        Route::view('/nservices', 'nservices')->middleware('can:staff');
        Route::view('index', 'users')->middleware('can:jabatan,admin')->name('users');
        Route::view('index', 'nservice')->middleware('can:jabatan,staff')->name('nservice');



        // Route::get('/', 'LoginController@showRegistrationForm')->name('register');
        // Route::post('/register', 'LoginController@register');
        // Route::get('/multiro', [multiroController::class, 'index'])->name('multiro.index');

        // Route::get('/login', [AuthController::class, 'index'])->name('login');

        // Route::post('login', [AuthController::class, 'login'])->name('loginpost');

        // Route::middleware(['auth'])->group(function () {
        // Route::get('multiro', 'multirocontroller@index');
        // Route::get('users', 'UserController@index');
        // Route::get('nservice', 'nservicecontroller@index');

        // Route::group(['middleware' => ['auth']], function () {
        // Route::get('/multiro', [multiroController::class, 'index'])->name('multiro.index');
        // });
        // });

    });

    // Route::group(['middleware' => ['auth', 'admin:admin']], function() {
// });


    // Route::view('/multiro', 'data-admin')->name('admin')->middleware('can:admin');
// Route::view('/nservice', 'data-staff')->name('staff')->middleware('can:staff');

    // Route::redirect('/', 'register');

    // Route::get('register', function () {
//     return 'Register';
// });

});
