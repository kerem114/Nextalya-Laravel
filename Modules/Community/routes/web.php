<?php

use Illuminate\Support\Facades\Route;
use Modules\Community\Http\Controllers\CommunityController;

Route::middleware(['auth'])->group(function () {
    Route::controller(CommunityController::class)->group(function() {
        Route::get('/koleksiyon', 'communityIndex')->name('community.index');
        Route::get('/koleksiyon-olustur', 'communityCreate')->name('community.create');
        Route::get('/uye-koleksiyon-detay/{id}', 'userCommunityDetail')->name('user.community.detail');
        Route::get('/kayit-koleksiyon-detay/{community_token}', 'communityCreateSave')->name('community.create.save');
        Route::get('/koleksiyon-detay/{community_token}', 'communityDetail')->name('community.detail');

        Route::post('/community/store', 'communityStore')->name('community.store');
        Route::post('/community/product/save/{community_id}', 'communityProductSave')->name('community.product.save');

    });
});
