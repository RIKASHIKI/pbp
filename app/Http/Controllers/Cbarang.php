<?php

namespace App\Http\Controllers;

use App\Models\Mbarang;
use Illuminate\Http\Request;

class Cbarang extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $judul = 'Barang';
        $barang = Mbarang::get();
        return view('barang.index', compact('barang', 'judul'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $judul = 'tambahkan data barang';
        return view('barang.tambah' , compact('judul'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:20',
            'varian' => 'required|string|max:20',
            'harga_beli' => 'required|string|max:11',
            'harga_jual' => 'required|string|max:11',
        ]);
        Mbarang::create([
            'nama' => $request->nama,
            'varian' => $request->varian,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
        ]);
        return redirect()->route('barang.index')->with('success','data barang berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mbarang $mbarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $judul = 'edit data barang';
        $barang = Mbarang::findOrFail($id);
        return view('barang.edit', compact('barang', 'judul'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:20',
            'varian' => 'required|string|max:20',
            'harga_beli' => 'required|string|max:11',
            'harga_jual' => 'required|string|max:11',
        ]);
        $barang = Mbarang::findOrFail($id);
        $barang->update([
            'nama' => $request->name,
            'variant' => $request->varian,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
        ]);
        return redirect()->route('barang.index')->with('success','data barang berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $barang = Mbarang::findOrFail($id);
        $barang->delete();
        return redirect()->route('barang.index')->with('success','daat berhasil di hapus');
    }
}