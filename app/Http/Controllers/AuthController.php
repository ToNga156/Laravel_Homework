<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showSignupForm() {
        return view('page.register');
    }

    public function register(Request $request) {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:6'
        // ]);

        $user = new Users();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect('/login')->with('success', 'Đăng ký thành công, hãy đăng nhập!');
    }

    public function showLoginForm() {
        return view('page.login');
    }

    public function login(Request $request) {
        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required|min:6',
        // ]);

        $user = Users::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('user_id', $user->id);
            return redirect('/page/trangchu')->with('success', 'Login successful!');
        }

        return back()->withErrors(['email' => 'Invalid email or password.']);
    }
}