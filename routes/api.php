<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\OrganizationController;
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
