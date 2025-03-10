<?php

use App\Http\Controllers\SignUpController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('form');
});
Route::get('/data', [\App\Http\Controllers\ApiController::class, 'getData']);
Route::post('/', [SignUpController::class, 'signUp']);
Route::post('/clear', [SignUpController::class, 'clear']);