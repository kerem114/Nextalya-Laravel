<?php

use Illuminate\Support\Facades\Route;
use Modules\Comment\Http\Controllers\CommentController;

Route::middleware(['auth'])->group(function () {
    Route::controller(CommentController::class)->group(function() {
        Route::post('/comment-store/{id}', 'commentStore')->name('comment.store');
    });
});
