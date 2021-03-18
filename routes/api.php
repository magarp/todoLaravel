<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;
use App\Http\Controllers\TodoItemController;

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

Route::POST('/todoList',[TodoListController::class,'store']);
Route::DELETE('/todoList/{todoList}',[TodoListController::class,'destroy']);
Route::PATCH('/todoList/{todoList}',[TodoListController::class,'update']);


Route::GET('/todoItems',[TodoItemController::class,'index']);
Route::POST('/todoItems',[TodoItemController::class,'store']);
Route::PATCH('/todoItems/{todoItem}',[TodoItemController::class,'update']);
Route::DELETE('/todoItems/{todoItem}',[TodoItemController::class,'destroy']);
