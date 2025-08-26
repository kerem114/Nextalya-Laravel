<?php

use Illuminate\Support\Facades\Route;
use Modules\Group\Http\Controllers\GroupController;

Route::middleware(['auth'])->group(function () {
    Route::controller(GroupController::class)->group(function() {
        Route::get('/grup', 'groupIndex')->name('group.index');
    });
});
