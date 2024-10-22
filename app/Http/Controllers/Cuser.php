<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\password;
//register
class Cuser extends Controller
{
    public function index(){
        $user = User::get();
        return view('auth.register',compact('user'));
    }

    public function register_proses(Request $request){
        $validator = validator::make($request->all(),[
            'username' => 'required|string|max:255|unique:users',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:4|confirmed',
        ]);
        if ($validator->fails()){
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'user'
        ]);
        return redirect()->route('login')->with('status', ['pesan' => 'pendaftaran berhasil! silahkan login', 'icon' => 'success']);
    }


}
