<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProjectController;
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

Route::middleware('auth:sanctum')->group(function(){
    Route::Resource('customers', CustomerController::class);
    Route::Resource('projects', ProjectController::class);

});


//Note routes
Route::prefix('customer/')->group(function () {
    Route::get('note', [NoteController::class, 'index']);
    Route::get('note/{id}', [NoteController::class, 'show']);
    Route::post('{customer_id}/note', [NoteController::class, 'store']);
    Route::put('{customer_id}/note/{id}', [NoteController::class, 'update']);
    Route::Delete('{customer_id}/note/{id}', [NoteController::class, 'destroy']);
});
