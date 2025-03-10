<?php

use App\Http\Controllers\CreateTableController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

Route::get('/create', [CreateTableController::class, 'createTable']);
Route::get('/create-db', function (){
    Schema::create('products', function ($table) {
        $table->increments('id');
        $table->string('name');
        $table->float('price');
        $table->string('image');
    });
});