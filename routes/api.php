<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoList\GetTaskList;
use App\Http\Controllers\TodoList\AddTask;
use App\Http\Controllers\TodoList\DeleteTask;
use App\Http\Controllers\TodoList\UpdateTask;

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


Route::get('/tasks', \App\Http\Controllers\TodoList\GetTaskList::class);
Route::get('/tasks/{id}', \App\Http\Controllers\TodoList\GetTask::class);
Route::post('/tasks', \App\Http\Controllers\TodoList\AddTask::class);
Route::delete('/tasks/{id}', \App\Http\Controllers\TodoList\DeleteTask::class);
Route::put('/tasks/{id}', \App\Http\Controllers\TodoList\UpdateTask::class);
