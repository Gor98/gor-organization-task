<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/buildings', [BuildingController::class, 'index']);

Route::get('/activities', [ActivityController::class, 'index']);

Route::prefix('organizations')->group(function () {
    Route::get('by-building/{building_id}', [OrganizationController::class, 'byBuilding']);
    Route::get('by-activity/{activity_id}', [OrganizationController::class, 'byActivity']);
    Route::get('search', [OrganizationController::class, 'searchByName']);
    Route::get('by-location', [OrganizationController::class, 'byLocation']);
    Route::get('{id}', [OrganizationController::class, 'show']);
});

Route::prefix('user')->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->middleware('auth:sanctum');
    Route::post('/login', [UserController::class, 'login']);
    Route::get('/logout', [UserController::class, 'logout'])->middleware('auth:sanctum');;
    Route::post('/register', [UserController::class, 'register']);
});

