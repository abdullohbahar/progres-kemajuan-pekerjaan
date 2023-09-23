<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function authenticate(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => ':attribute harus diisi',
            'password.required' => ':attribute harus diisi',
        ]);

        if (Auth::attempt($validateData)) {
            $request->session()->regenerate();

            switch (Auth::user()->role) {
                case 'Admin':
                    return redirect()->route('dashboard.index');
                    break;
                case 'Admin Donasi':
                    return redirect()->route('admin.donasi.dashboard');
                    break;
                case 'Admin LKSA':
                    return redirect()->route('admin.lksa.dashboard');
                    break;
                case 'Admin Keuangan':
                    return redirect()->route('admin.keuangan.dashboard');
                    break;
                default:
                    return redirect()->back()->with('message', 'Username atau password salah');
            }
        }

        return redirect()->back()->with([
            'message' =>  'Username atau password salah',
        ]);
    }
}
