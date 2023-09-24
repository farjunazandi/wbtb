<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthAdmin extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function viewLogin()
    {
        return view('auth');
    }

    public function viewRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required'
        ]);

        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);

        return redirect('login')->with('registersuccess', 'Akun berhasil dibuat! Mohon hubungi administrator untuk aktivasi akun anda!');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (auth()->user()->aktif == 1) {
                if (auth()->user()->role == 'Admin') {
                    return redirect()->intended('/admin/home');
                } else {
                    return redirect()->intended('/admin/home');
                }
            } else {
                return redirect('login')->with('loginerror', 'Akun anda belum diaktivasi! Mohon hubungi administrator untuk aktivasi akun!');
            }
        } else {
            return back()->with('loginerror', 'Login Failed!');
        }
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('login')->with('registersuccess', 'Anda berhasil keluar!');
    }
}
