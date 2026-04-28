<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Log; 

class AuthController extends Controller
{
    // 🔹 tampilkan halaman login
    public function loginForm()
    {
        return view('auth.login');
    }

    // 🔹 proses login
public function login(Request $request)
{
    $user = \App\Models\User::where('email', $request->email)
                ->where('password', $request->password)
                ->first();

    if ($user) {

        // simpan session
        session(['user' => $user]);

        // ✅ CATAT LOG LOGIN
        Log::create([
            'user' => $user->email,
            'aktivitas' => 'Login'
        ]);

        // redirect sesuai role
        if ($user->role == 'manajer') {
            return redirect('/manajer');
        } elseif ($user->role == 'admin') {
            return redirect('/admin');
        } else {
            return redirect('/transaksi');
        }

    } else {
        return back()->with('error', 'Login gagal');
    }
}

    // 🔹 logout
    public function logout()
    {
        session()->forget('user');
        return redirect('/login');
    }
}