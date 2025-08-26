<?php

use Illuminate\Support\Facades\Route;
use Modules\Save\Http\Controllers\SaveController;

Route::middleware(['auth'])->group(function () {
    Route::controller(SaveController::class)->group(function() {
        Route::get('/kaydedilenler', 'saveIndex')->name('save.index');
        Route::get('/favorilere-kaydet/{id}', 'productFavories')->name('product.favories');
        Route::delete('/favori-kaldir/{id}', 'favoriesDelete')->name('favories.delete');
    });
});
