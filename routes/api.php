<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::patch('tasks/{task}/complete', [TaskController::class, 'complete']);
Route::apiResource('tasks', TaskController::class);