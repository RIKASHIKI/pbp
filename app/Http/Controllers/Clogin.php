<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class Clogin extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function login_proses(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ],[
            'username.required' => 'username wajib diisi',
            'password.required' => 'password wajib diisi',
        ]);

        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        $credentials = $request->only('username', 'password');
        $user = User::where('username', $request->username)->first();

        if (!$user) {
            return redirect()->route('login')->withErrors(['username' => 'Username tidak ditemukan']);
        }

        if (!Auth::attempt($credentials)){
            return redirect()->route('login')->withErrors(['password' => 'Password salah']);
        }

        if (Auth::attempt($data)){
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->with('failed', 'username atau password salah');
        }

    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('logout','berhasil logout');
    }
}
