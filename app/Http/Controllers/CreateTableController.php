<?php

namespace App\Http\Controllers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class CreateTableController extends Controller
{
    public function createTable () {
        Schema::create('productss', function ($table) {
            $table->incresement('id');
            $table->string('name');
            $table->float('price');
            $table->string('image');
        });
    }
}