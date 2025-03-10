<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class ApiController
{
    public function getData() {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        $data = $response->json();
        return view('dataShow', compact('data'));
    }
}