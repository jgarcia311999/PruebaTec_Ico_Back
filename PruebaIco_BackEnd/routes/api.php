<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\RunnerController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\ReportController;

Route::middleware('auth:api')->group(function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('teams', TeamController::class);
    Route::apiResource('runners', RunnerController::class);
    Route::apiResource('trainings', TrainingController::class);
    Route::apiResource('reports', ReportController::class);
});