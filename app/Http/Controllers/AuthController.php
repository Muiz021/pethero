<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class AuthController extends Controller
{
    public function proses_login(Request $request)
    {
        request()->validate(['username' => 'required', 'password' => 'required']);

        $kredensil = $request->only('username', 'password');

        if (Auth::attempt($kredensil)) {
            Auth::user();
            if (Auth::user()->roles == 'member') {
                Alert::success(Auth::user()->nama, "Kamu berhasil login");
                return redirect()->route('front.akun');
            }else if(Auth::user()->roles == 'admin'){
                Alert::success(Auth::user()->nama, "Kamu berhasil login");
                return redirect()->route('dashboard');
            }else{
                Alert::error( "Gagal","Username atau Password Salah");
                return redirect()->route('front.masuk');
            }
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        Alert::success("Berhasil","Kamu berhasil Logout");
        return Redirect()->route('front.akun');
    }
}
