<?php

use Illuminate\Support\Facades\Route;
use Modules\Help\Http\Controllers\HelpController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('helps', HelpController::class)->names('help');
});
