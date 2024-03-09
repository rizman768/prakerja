<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login(Request $request){
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/mahasiswa');
        }
        Session::flash('error', 'Username atau Password Salah');
        // dd([$request->email,$request->password]);
        return redirect('/login');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}

