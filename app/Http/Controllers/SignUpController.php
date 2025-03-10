<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignUpRequest;

class SignUpController extends Controller
{
    public function signUp(SignUpRequest $request)
    {
        $user = [
            'name' => $request->input('name'),
            'age' => $request->input('age'),
            'date' => $request->input('date'),
            'phone' => $request->input('phone'),
            'web' => $request->input('web'),
            'address' => $request->input('address')
        ];
//        var_dump($user);
        return view('form')->with('user', $user);
    }
}