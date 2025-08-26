<?php

use Illuminate\Support\Facades\Route;
use Modules\Save\Http\Controllers\SaveController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('saves', SaveController::class)->names('save');
});
