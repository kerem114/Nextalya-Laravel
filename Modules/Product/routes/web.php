<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\ProductController;

Route::middleware(['auth'])->group(function () {
    Route::controller(ProductController::class)->group(function() {
        Route::get('/urun/kayit','productCreate')->name('product.create');
        Route::get('/urun-kayit/toplu','linkProductCreate')->name('link.product.create');
        Route::get('/urun-kayit/manuel','manualProductCreate')->name('manual.product.create');
        Route::post('/product-store','productStore')->name('product.store');
        Route::post('/product-manual-store','productManualStore')->name('product.manual.store');
        Route::get('/urun-duzenle/{id}','productEdit')->name('product.edit');
        Route::post('/product-update/{id}','productUpdate')->name('product.update');

        Route::get('/urunlerim','myProduct')->name('my.product');
        Route::get('/urunlerim/duzenle/{id}','myProductEdit')->name('my.product.edit');
        Route::post('/urunlerim/update/{id}','myProductUpdate')->name('my.product.update');
        Route::get('/detay/{slug}','productDetail')->name('product.detail');

        Route::post('/product/{id}/like','toggle')->name('product.like');

        Route::get('/export-topcats', 'exportTopcats')->name('export.topcats');
        Route::get('/export-products-update','exportProductsForUpdate')->name('export.products.update');
        Route::get('/export-products-delete','exportProductsForDelete')->name('export.products.delete');

        Route::get('/urunlerim','myProduct')->name('my.product');

        Route::post('/collection/{id}','collectionPost')->name('collection.post');

        Route::post('/repost/{id}','repostStore')->name('repost.store');
    });
});
