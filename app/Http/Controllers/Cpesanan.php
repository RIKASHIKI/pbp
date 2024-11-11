<?php

namespace App\Http\Controllers;


use App\Models\Mbarang;
use App\Models\Mpembeli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Cpesanan extends Controller
{
    public function index(){
        $judul = 'pesanan';
        $pesanan = DB::table('pesanan')
        ->leftJoin('barang','barang.id_barang','=','barang.id_barang')
        ->leftJoin('pembeli','pembeli.id_pembeli','=','pembeli.id_pembeli')
        ->select('pesanan.*','barang.nama as nama_barang','barang.nama as nama_pembeli')
        ->get();
        return view('pesanan.index',compact('pesanan','judul'));
    }
    public function cetak()
    {
    $barang = Mbarang::get();
    return view('pesanan.cetak', compact('pesanan'));
    }

}
