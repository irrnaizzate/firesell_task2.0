<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TodoListController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Files;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//User
Route::resource('users', App\Http\Controllers\UserController::class)->only(['index','store','show','update','destroy']);
// Route::get('/users', [UserController::class, 'index']);
// Route::prefix('/user')->group( function(){
//         Route::post('/store', [UserController::class, 'store']);
//         Route::post('/{id}', [UserController::class, 'update']); //put
//         Route::delete('/{id}', [UserController::class, 'destroy']);
// } );

//Todo
Route::resource('todo', App\Http\Controllers\TodoListController::class)->only(['index','store','show','update','destroy']);
// Route::get('/todos', [TodoListController::class,'index']);
// Route::prefix('/todo')->group( function(){
//         Route::post('/store', [TodoListController::class, 'store']);
//         Route::post('/{id}', [TodoListController::class, 'update']); //put
//         Route::delete('/{id}', [TodoListController::class, 'destroy']);
// } );

//files
Route::resource('files', App\Http\Controllers\Files::class)->only(['index','store','show','update','destroy']);
