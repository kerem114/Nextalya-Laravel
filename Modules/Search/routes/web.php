<?php

use Illuminate\Support\Facades\Route;
use Modules\Search\Http\Controllers\SearchController;

Route::middleware(['auth'])->group(function () {
    Route::controller(SearchController::class)->group(function() {
        Route::get('/kesfet', 'discoverIndex')->name('discover.index');
        Route::get('/ara', 'search')->name('search.products');
    });
});
