<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }
    public function login(Request $request)
    {
        // Validasi input dari form login
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $credenstial = $request->only('username', 'password');
        if (Auth::guard('admin')->attempt($credenstial)) {
            // Jika password cocok, login admin

            return 'hai';
            // Redirect ke dashboard atau halaman yang diinginkan
            return redirect()->route('admin.dashboard');
        } else {
            // Jika gagal login, redirect kembali dengan error
            return redirect()->back()->with('error', 'Email Atau Password Anda Salah');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
