<?php

use Illuminate\Support\Facades\Route;
use Modules\Poll\Http\Controllers\PollController;

Route::middleware(['auth'])->group(function () {
    Route::controller(PollController::class)->group(function() {
        Route::get('/anket-olustur','create')->name('poll.create');
        Route::post('/poll/store','pollStore')->name('poll.store');
    });
});
