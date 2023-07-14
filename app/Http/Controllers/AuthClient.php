<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthClient extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return view('pages.client.index');
        } else {
            return view('pages.client.login');
        }
    }
    public function prosesLogin(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        if (auth()->attempt($validatedData)) {
            $request->session()->regenerate();
    
            // Dapatkan pengguna yang masuk
            $user = auth()->user();
    
            // Periksa peran pengguna
            if ($user->role === 'Admin') {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('index.client');
            }
        } else {
            return redirect()->back()->with('error', 'Email dan Password Salah');
        }    
    }
    
    public function register()
    {
        return view('pages.client.register');
    }
    public function registerProses(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'age' => 'required',

        ]);

        $user = User::firstOrCreate(
            ['email' => $validasi['email']],
            [
                'name' => $validasi['nama'],
                'age' => $validasi['age'],
                'password' => Hash::make($validasi['password'])
            ]
        );

        if ($user->wasRecentlyCreated) {
            // User baru berhasil dibuat
            return redirect()->route('login')->with('success', 'User telah dibuat, silakan login');
        } else {
            // User sudah ada dalam database
            return redirect()->back()->with('error', 'Email sudah terdaftar');
        }
    }
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index.client');
    }
}
