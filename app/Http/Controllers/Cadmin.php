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
    public function update(Request $request, $id)
{
    $admin = User::findOrFail($id);

    // Validasi data
    $request->validate([
        'name' => 'required|string|max:255',
        // Jika username yang baru sama dengan username yang lama, abaikan validasi 'unique'
        'username' => 'required|string|max:255|unique:users,username,' . $admin->id,
        'email' => 'required|string|email|max:255|unique:users,email,' . $admin->id,
        'level' => 'required|string|in:admin,user',
        'password' => 'nullable|string|min:4|confirmed', // Membuat password tidak wajib
    ]);

    // Update data selain password 
    if ($request->filled('username') && $request->username != $admin->username) {
        $admin->username = $request->username; // Hanya update username jika ada perubahan
    }

    $admin->name = $request->name;
    $admin->email = $request->email;
    $admin->level = $request->level;

    // Jika password diisi, lakukan hash dan update password
    if ($request->filled('password')) {
        $admin->password = Hash::make($request->password);
    }

    $admin->save();

    return redirect()->route('admin.index')->with('status', [
        'pesan' => 'Pendaftaran diperbarui! Silakan login.',
        'icon' => 'success'
    ]);
}


    public function delete($id){
        $admin = User::FindOrFail($id);
        $admin->delete();
        return redirect()->route('admin.index')->with('status', ['pesan' => 'pendaftaran diperbarui! silahkan login', 'icon' => 'success']);
        }
}


