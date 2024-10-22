<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class Cadmin extends Controller
{

    public function index(){
        $judul = 'data user';
        $admin = User::all();
        return view('admin.index',compact('admin','judul'));
    }
    public function tambah(){
        $judul = 'tambahkan data user';
        return view('admin.tambah' , compact('judul'));
    }
    public function adminregister_proses(Request $request){
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
            'level' => $request->level
        ]);
        return redirect()->route('admin.index')->with('status', ['pesan' => 'pendaftaran berhasil! silahkan login', 'icon' => 'success']);
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
    public function delete($id){
        $admin = User::FindOrFail($id);
        $admin->delete();
        return redirect()->route('admin.index')->with('success','data suplier berhasil di hapus');
        }
}


