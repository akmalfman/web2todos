<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\APITodoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('todo')->group(function () {
    Route::get('/', [APITodoController::class, 'index']);
    Route::delete('/delete/{id}', [APITodoController::class, 'destroy']);
    Route::post('/store', [APITodoController::class, 'store']);
    Route::put('/update/{id}', [APITodoController::class, 'update']);
});
