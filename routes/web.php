<?php

use App\Http\Controllers\CreateTableController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

Route::get('/', function () {
    return view('home');
});