<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;

Route::resourceWithTrashed("task", TaskController::class);