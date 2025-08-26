<?php

use Illuminate\Support\Facades\Route;
use Modules\Member\Http\Controllers\BusinessController;
use Modules\Member\Http\Controllers\MemberController;



Route::middleware(['auth'])->group(function () {
    Route::controller(MemberController::class)->group(function() {
        Route::get('/kullanici/{username}','userAccount')->name('user.account');

        Route::get('/profilim','myProfile')->name('my.profile');
        Route::get('/profil/duzenle','profileEdit')->name('edit.profile');
        Route::post('/profile/update','profileUpdate')->name('update.profile');
        Route::post('/password/change','passwordChange')->name('password.change');

        Route::get('/paylasimlarim','myPost')->name('my.post');
        Route::get('/urunlerim','myProduct')->name('my.product');
        Route::delete('/save/delete/{id}','saveDelete')->name('delete.save');

        // Follow and Unfollow routes
        Route::post('/follow/{user}','follow')->name('follow');
        Route::delete('/unfollow/{user}','unfollow')->name('unfollow');

        Route::get('/takipcilerim','follower')->name('follower.index');
        Route::get('/takip-ettiklerim','following')->name('following.index');
        Route::delete('/takipci/sil/{id}','followerDelete')->name('follower.delete');
        Route::delete('/takipten-cikar/{id}','followingDelete')->name('following.delete');
    });

    Route::controller(BusinessController::class)->group(function() {
        Route::get('/isletme-hesabi','businessAccount')->name('business.account');
        Route::post('/business-request','businessRequest')->name('business.request');
    });
});
