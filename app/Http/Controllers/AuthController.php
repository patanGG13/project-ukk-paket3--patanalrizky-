<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AuthController extends Controller
{
    // Menampilkan halaman form login admin
    public function index()
    {
        return view('admin.login');
    }

    // Memproses data login yang diinput
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // Mencari data admin di database berdasarkan username
        $admin = Admin::where('username', $request->username)->first();

        // Mencocokkan password
        if ($admin && $admin->password === $request->password) {
            // Jika benar, simpan sesi login
            $request->session()->put('admin_logged_in', true);
            $request->session()->put('admin_username', $admin->username);
            
            // Arahkan ke dasbor
            return redirect()->route('admin.dashboard');
        }

        // Jika salah, kembalikan ke halaman login dengan pesan error
        return back()->withErrors(['msg' => 'Username atau Password salah!']);
    }

    // Memproses logout admin
    public function logout(Request $request)
    {
        $request->session()->forget(['admin_logged_in', 'admin_username']);
        return redirect()->route('admin.login');
    }
}