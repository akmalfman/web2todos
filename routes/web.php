<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/about', function () {
    return view('about');
});


Route::prefix('user')->group(function () {
    Route::get('/register', [UserController::class, 'register']);
    Route::post('/register/store', [UserController::class, 'storeRegister']);
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login/auth', [UserController::class, 'loginAuth']);
    Route::post('/logout', [UserController::class, 'logout']);
});

Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
});


Route::middleware(['auth'])->group(function () {
    Route::prefix('todo')->group(function () {
        Route::get('/', [TodoController::class, 'index']);
        Route::get('/create', [TodoController::class, 'create']);
        Route::get('/edit/{id}', [TodoController::class, 'edit']);
        Route::get('/delete/{id}', [TodoController::class, 'destroy']);
        Route::post('/store', [TodoController::class, 'store']);
        Route::post('/update/{id}', [TodoController::class, 'update']);
    });
});
