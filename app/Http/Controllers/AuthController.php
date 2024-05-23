<?php

namespace App\Http\Controllers;

use App\Models\User;
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


    public function update(Request $request)
{
    // Validate the request
    $request->validate([
        'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max size 2MB
    ]);

    // Check if the user is authenticated
    if (Auth::check()) {
        // Get the authenticated user ID
        $userId = Auth::id();

        // Check if a picture file was uploaded
        if ($request->hasFile('picture')) {
            try {
                // Get the uploaded file
                $file = $request->file('picture');

                // Generate a unique file name
                $fileName = time() . '.' . $file->getClientOriginalExtension();

                // Store the file in the storage/picture folder
                $path = $file->storeAs('picture', $fileName);

                // Update the user's profile picture path in the database using the User model
                \App\Models\User::where('id', $userId)->update(['picture' => $path]);

                return response()->json(['message' => 'Profile picture updated successfully', 'path' => $path]);
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


}
