<?php

namespace App\Http\Controllers;

use App\Models\Mbarang;
use App\Models\Msuplier;
use App\Models\Mpembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Cpembelian extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $judul = 'pembelian';
        $pembelian = DB::table('pembelian')
        ->leftJoin('barang','barang.id_barang','=','barang.id_barang')
        ->leftJoin('suplier','suplier.id_suplier','=','suplier.id_suplier')
        ->select('pembelian.*','barang.nama as nama_barang','suplier.nama as nama_suplier')
        ->get();
        return view('pembelian.index',compact('pembelian','judul'));
    }

}
