<?php

use Illuminate\Support\Facades\Route;
use Modules\Page\Http\Controllers\PageController;

Route::middleware(['auth'])->group(function () {
    Route::controller(PageController::class)->group(function() {
        Route::get('/hakkimizda','aboutus')->name('about.index');
        Route::get('/gizlilik-politikasi','privacyPolicy')->name('privacy.policy');
        Route::get('/is-firsatlari','carrierIndex')->name('carrier.index');
        Route::get('/kisisel-verilerin-korunmasi','kvkkIndex')->name('kvkk.index');
        Route::get('/kullanici-sozlesmesi','userPolicy')->name('user.policy');
        Route::get('/topluluk-kurallari','communityRule')->name('community.rule');
        Route::get('/yardim','help')->name('help.index');
    });
});
