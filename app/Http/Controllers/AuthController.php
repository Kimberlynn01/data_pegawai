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
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt login
        if (Auth::attempt($credentials)) {
            // Jika otentikasi berhasil
            return redirect()->route('dashboard.index');
        }

        // Jika otentikasi gagal
        return back()->withErrors([
            'name' => 'Nama pengguna atau kata sandi salah.',
        ])->withInput($request->except('password'));
    }


}
