<?php

use App\Http\Controllers\Api\TodoController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->group(function (){
    Route::post('/register',[UserController::class,'register']);
    Route::post('/login',[UserController::class,'login']);
});

Route::prefix('todo')->middleware('auth:api')->group(function (){

});
Route::get('todo/list',[TodoController::class,'index']);
Route::post('todo/store',[TodoController::class,'store']);
Route::get('todo/{id}/edit',[TodoController::class,'edit']);
Route::put('todo/{id}/update',[TodoController::class,'update']);
Route::delete('todo/{id}/delete',[TodoController::class,'destroy']);
