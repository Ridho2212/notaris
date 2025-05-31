<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    // Coba login sebagai admin
    if (Auth::guard('admin')->attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }

    // Kalau gagal, coba login sebagai user biasa
    if (Auth::guard('web')->attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }

    // Kalau dua-duanya gagal
    return back()->withErrors([
        'email' => 'Login gagal. Email atau password salah.',
    ]);
}

    public function logout(Request $request)
{
    Auth::guard('admin')->logout();
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
}

}