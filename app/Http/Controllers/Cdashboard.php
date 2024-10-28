<?php

namespace App\Http\Controllers;

use App\Models\Mdashboard;
use Illuminate\Http\Request;

class Cdashboard extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dash = new Mdashboard();
        $jumlah_barang = $dash->jumlah_barang();
        $jumlah_pembeli = $dash->jumlah_pembeli();
        $jumlah_suplier = $dash->jumlah_suplier();
        $jumlah_pesanan = $dash->jumlah_pesanan();
        $jumlah_user  = $dash->jumlah_user();
        return view('index',compact('jumlah_pembeli','jumlah_barang','jumlah_suplier','jumlah_pesanan','jumlah_suplier','jumlah_pesanan','jumlah_user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Mdashboard $mdashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mdashboard $mdashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mdashboard $mdashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mdashboard $mdashboard)
    {
        //
    }
}
