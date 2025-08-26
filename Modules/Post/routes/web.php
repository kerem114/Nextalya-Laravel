<?php

use Illuminate\Support\Facades\Route;
use Modules\Post\Http\Controllers\PostController;

Route::middleware(['auth'])->group(function () {
    Route::controller(PostController::class)->group(function() {

        //redirect
        route::get('gonderi','post')->name('post.index');
        route::get('/gonderi/detay/{post_token}','postDetail')->name('post.detail');


        Route::get('/olustur','create')->name('post.create');
        Route::post('/post/store','postStore')->name('post.store');

        //discussion
        Route::get('/tartisma','createDiscussion')->name('discussion.create');
        Route::post('/discussion/store','discussionStore')->name('discussion.store');

        Route::get('/tartisma/{slug}','show')->name('discussion.show');
        Route::post('/review/store/{id}','reviewStore')->name('discussion.review.store');
    });
});
