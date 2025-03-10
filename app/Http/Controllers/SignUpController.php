<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\SignUpRequest;

class SignUpController extends Controller
{
    public function signUp(SignUpRequest $request)
    {
        // Retrieve existing session data or initialize an empty array
        $userSession = session('userSession', []);
        $user = [
            'name' => $request->input('name'),
            'age' => $request->input('age'),
            'date' => $request->input('date'),
            'phone' => $request->input('phone'),
            'web' => $request->input('web'),
            'address' => $request->input('address')
        ];
        $userSession[] = $user;
        session(['userSession' => $userSession]);
        return view('form')->with('userSession', $userSession);
    }

    public function clear() {
        Session::forget('userSession');
        return redirect('/');
    }
}