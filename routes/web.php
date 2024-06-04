<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

Route::prefix('todo')->group(function () {
    Route::get('/', [TodoController::class, 'index']);
    Route::get('/create', [TodoController::class, 'create']);
    Route::get('/edit/{id}', [TodoController::class, 'edit']);
    Route::get('/delete/{id}', [TodoController::class, 'destroy']);
    Route::post('/store', [TodoController::class, 'store']);
    Route::post('/update/{id}', [TodoController::class, 'update']);
});
