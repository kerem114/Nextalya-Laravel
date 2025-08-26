<?php

use App\Http\Controllers\Frontend\MainController as FrontendMainController;
use Illuminate\Support\Facades\Route;



Auth::routes();

Route::controller(FrontendMainController::class)->group(function(){

    Route::get('/','homeIndex')->name('home.index');

    //Login
    Route::post('/signin','signin')->name('signin');

});
