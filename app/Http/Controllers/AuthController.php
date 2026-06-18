<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman form login admin.
     */
    public function showLogin()
    {
        // Mengarahkan ke file view login (biasanya ditaruh di resources/views/auth/login.blade.php)
        // Jika file login Anda ada di luar folder auth, cukup ganti menjadi: return view('login');
        return view('login');
    }

    /**
     * Memproses data login yang dimasukkan oleh admin/pengelola.
     */
    public function login(Request $request)
    {
        // Validasi input form terlebih dahulu
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Proses pencocokan data ke database
        if (Auth::attempt($credentials)) {
            // Amankan session jika login berhasil
            $request->session()->regenerate();

            // Alihkan ke halaman dashboard admin
            return redirect()->intended('/dashboard');
        }

        // Jika gagal, kembali ke halaman form login dengan pesan error berbahasa Indonesia
        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah / tidak terdaftar.',
        ])->onlyInput('email');
    }

    /**
     * Memproses logout admin dan menghancurkan session aktif.
     */
    public function logout(Request $request)
    {
        // Proses keluar dari sistem autentikasi Laravel
        Auth::logout();

        // Bersihkan dan hancurkan session token yang lama agar aman
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Alihkan kembali ke halaman login utama
        return redirect('/login');
    }
}