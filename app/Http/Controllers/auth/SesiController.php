<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index()
    {
        return view('auth.login');
    }

    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infoLogin)) {
            if (Auth::user()->role == 'admin') {
                return redirect('/admin/dashboard');
            } else if (Auth::user()->role == 'user') {
                return redirect('/user/dashboard');
            } else {
                Auth::logout();
                return redirect('/');
            }
        } else {
            return redirect('/login')->withErrors('Username atau Password tidak sesuai');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
