<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

Route::get('/trangchu', [PageController::class, 'getIndex']);
Route::get('/addToCart', [PageController::class, 'addToCart'])->name('themgiohang');

Route::get('/type/{id}', [PageController::class, 'getLoaiSp']);