<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // Cek manual apakah user dengan username ini ada dan statusnya aktif
        $user = \App\Models\User::where('username', $request->username)->first();

        if ($user && $user->status === 'tidak_aktif') {
            return back()->withErrors([
                'username' => 'Akun Anda tidak aktif. Silakan hubungi admin.',
            ])->onlyInput('username');
        }

        // Coba login pakai Auth::attempt
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();

            return redirect()->intended('/admin');
        }

        // Kalau gagal
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('public.dashboard')->with('success', 'Anda telah berhasil keluar dari sistem');
    }

    public function store(Request $request) {}
    public function show(string $id) {}
    public function update(Request $request, string $id) {}
    public function destroy(string $id) {}
}
