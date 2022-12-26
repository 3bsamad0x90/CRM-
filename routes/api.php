<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\NoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Customer routes
Route::get('/customers', [CustomerController::class, 'index']);
Route::get('/customers/{id}', [CustomerController::class, 'show']);
Route::post('/customers', [CustomerController::class, 'store']);
Route::Put('/customers/{id}', [CustomerController::class, 'update']);
Route::Delete('/customers/{id}', [CustomerController::class, 'destroy']);


//Note routes
Route::prefix('customer/')->group(function () {
    Route::get('note', [NoteController::class, 'index']);
    Route::get('note/{id}', [NoteController::class, 'show']);
    Route::post('{customer_id}/note', [NoteController::class, 'store']);
    Route::put('{customer_id}/note/{id}', [NoteController::class, 'update']);
    Route::Delete('{customer_id}/note/{id}', [NoteController::class, 'destroy']);
});
