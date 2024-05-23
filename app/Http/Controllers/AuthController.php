<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('Auth.login');
    }

    public function postlogin(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // Attempt login
        if (Auth::attempt($credentials)) {
            // Jika otentikasi berhasil
            return redirect()->route('dashboard.index');
        }

        // Jika otentikasi gagal
        return back()->withErrors([
            'email' => 'Email atau kata sandi salah.',
        ])->withInput($request->except('password'));
    }


}
