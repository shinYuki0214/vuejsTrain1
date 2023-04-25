<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;

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

// Route::get('users', [UserController::class, 'index']);
// Route::get('list', [UserController::class, 'list']);

// Route::get('/', function () {
//     return view('app');
// });
Route::get('/', [UserController::class, 'index']);



Route::get('list', [UserController::class, 'list']);
Route::get('tasklist', [TaskController::class, 'list']);
Route::post('taskpost', [TaskController::class, 'store']);
Route::post('taskdelete', [TaskController::class, 'delete']);
