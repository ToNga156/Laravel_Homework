<?php

use App\Http\Controllers\SignUpController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('form');
});
Route::post('/', [SignUpController::class, 'signUp']);