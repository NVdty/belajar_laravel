<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(){

        return view('login');
    }

    // validasi untuk login
    public function authenticating(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); //pengecekan data dan role
 
            return redirect()->intended('/'); //jika berhasil
        }
        Session::flash('status', 'failed');
        Session::flash('message', 'Failed Login!');

        return redirect('/login'); //jika gagal

    }

    // //untuk logout
    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }

}
