<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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


    public function update(Request $request)
    {
        $request->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if (Auth::check()) {
            $userId = Auth::id();

            if ($request->hasFile('picture')) {
                try {
                    $file = $request->file('picture');
                    $fileName = time() . '.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('public/picture', $fileName);

                    $user = User::find($userId);
                    if ($user) {
                        if ($user->picture) {
                            Storage::delete($user->picture);
                        }

                        $user->picture = 'picture/' . $fileName;
                        $user->save();

                        return response()->json(['message' => 'Profile picture updated successfully', 'path' => $path]);
                    } else {
                        return response()->json(['message' => 'User not found'], 404);
                    }
                } catch (\Exception $e) {
                    return response()->json(['message' => 'Error updating profile picture'], 500);
                }
            } else {
                return response()->json(['message' => 'No picture uploaded'], 400);
            }
        } else {
            return response()->json(['message' => 'User not authenticated'], 401);
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
