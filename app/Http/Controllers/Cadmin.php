<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class Cadmin extends Controller
{

    public function index(){
        $judul = 'data user';
        $admin = User::all();
        return view('admin.index',compact('admin','judul'));
    }
    public function edit($id){
        $judul = 'edit data user';
        $admin = User::findOrFail($id);
        return view('admin.edit',compact('admin','judul'));
    }
    public function update(Request $request,$id){
        $admin = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $admin->id,
            'level' => 'required|string|in:admin,user',
        ]);
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'level' => $request->level,
        ]);
        return redirect()->route('admin.index')->with('status', ['pesan' => 'pendaftaran berhasil! silahkan login', 'icon' => 'success']);

    }
}


