<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session as FacadesSession;
use App\Http\Controllers\Auth;

use Illuminate\Container\Attributes\Auth as AttributesAuth;

class UserController extends Controller
{
    public function Register(request $request) {
        $input = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password'
        ]);

        $input['password'] = bcrypt($input['password']);
        User::create($input);

        echo '
            <script>
                alter("Đăng ký thành công. Vui lòng đăng nhập.");
                window.location.assign("login");
            </script>
        ';
    }

    // public function Login(Request $request) {
    //     $login = [
    //         'email' => $request->input('email'),
    //         'password' => $request->input('pw')
    //     ];
    //     if (Auth::attempt($login)) {
    //         $user = Auth::user();
    //         Session::put('user', $user);
    //         echo '<script>
    //                 alert("Đăng nhập thành công.";
    //                 window.location.assign("trangchu");
    //             </script>';
    //     } else {
    //         echo '<script>
    //                 alert("Đăng nhập thất bại.";
    //                 window.location.assign("trangchu");
    //             </script>';
    //     }
    // }

    // public function Logout() {
    //     Session::forget('user');
    //     Session::forget('cart');
    //     return redirect('/trangchu');
    // }
}
