<?php

use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

Route::group(['prefix' => 'page'], function(){
    Route::get('/trangchu', [PageController::class, 'getIndex']);
    Route::get('/product', [ProductController::class, 'getAllProduct']);
    Route::get('/about', [PageController::class, 'getAbout']);
    Route::get('/contact', [PageController::class, 'getContact']);
    Route::get('/detail/{id}', [PageController::class, 'getDetail'])->name('chitietsanpham');
    Route::get('/product/type/{id}', [ProductController::class, 'showProduct']);
});

Route::group(['prefix' => 'admin'], function(){
    Route::get('/', [PageController::class, 'getIndexAdmin']);

    Route::get('/admin-add-form', [PageController::class, 'getAdminAdd'])->name('add-product');

    Route::post('/admin-add-form', [PageController::class, 'postAdminAdd']);

    Route::get('/admin-edit-form/{id}', [PageController::class, 'getAdminEdit']);

    Route::post('/admin-edit', [PageController::class, 'postAdminEdit']);

    Route::post('/admin-delete/{id}', [PageController::class, 'postAdminDelete']);

    Route::get('/admin-export', [PageController::class, 'exportAdminProduct'])->name('export');

});

Route::get('/', function () {
    return view('home');
});
