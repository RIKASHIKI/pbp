<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mpembeli;
use Illuminate\Support\Facades\DB;

class Cpembeli extends Controller
{
    public function tampil(){
        $judul = 'pembeli';
        $pembeli = Mpembeli::get();
        return view('pembeli.tampil', compact('pembeli','judul'));
    }
    public function tambah(){
        $judul = 'tambah data pembeli';
        $kode_pembeli = $this->kode_pembeli();
        return view('pembeli.tambah',compact('judul','kode_pembeli'));
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
        return redirect()->route('pembeli.tampil')->with('status', ['pesan' => 'Data berhasil disimpan', 'icon' => 'success']);
    }
    public function ubah(string $id){
        $judul = 'Barang';
        $pembeli = Mpembeli::findOrFail($id);
        return view('pembeli.ubah', compact('pembeli', 'judul'));
    }
    public function hapus($id){
        $pembeli = Mpembeli::findOrFail($id);
        $pembeli->delete();
        return redirect()->route('barang.index')->with('status', ['pesan' => 'Data berhasil disimpan', 'icon' => 'succes']);
    }
    private function kode_pembeli()
    {
        $lastPesanan = DB::table('pesanan')->orderBy('id_pesanan', 'desc')->first();
        if ($lastPesanan) {
            $kodeTerakhir = intval(substr($lastPesanan->id_pesanan, -3));
            $kodeBaru = 'P-' . str_pad($kodeTerakhir + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $kodeBaru = 'P-0001';
        }
        return $kodeBaru;
    }
    public function cetak()
{
    $pembeli = Mpembeli::get();
    return view('pembeli.cetak', compact('pembeli'));
}

}
