<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mpembeli;

class Cpembeli extends Controller
{
    public function tampil(){
        $pembeli = Mpembeli::get();
        return view('pembeli.tampil', compact('pembeli'));
    }
    public function tambah(){
        return view('pembeli.tambah');
    }
    public function simpan(Request $request){
        $request->validate([
            'id_pembeli' => 'unique:pembeli,id_pembeli',
        ]);
        $pembeli = new Mpembeli();
        $pembeli->id_pembeli = $request->id_pembeli;
        $pembeli->nama = $request->nama;
        $pembeli->jns_kelamin = $request->jns_kelamin;
        $pembeli->alamat = $request->alamat;
        $pembeli->kode_pos = $request->kode_pos;
        $pembeli->kota = $request->kota;
        $pembeli->tgl_lahir = $request->tgl_lahir;
        $pembeli->save();
        return redirect()->route('pembeli.tampil')->with('berhasil','data berhasil disimpan');
    }
    public function ubah(){
        //
    }
    public function hapus($id){
        //
    }
}
