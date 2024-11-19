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
        return view('barang.tambah', compact('judul'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required|string|max:20',
            'nama' => 'required|string|max:50',
            'varian' => 'required|string|max:20',
            'harga_beli' => 'required|string|max:20',
            'harga_jual' => 'required|string|max:20',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);
        $foto = $request->file('foto');
        $filename = null;
        if ($foto) {
            $extension     = $foto->getClientOriginalExtension();
            $filename     = date('YmdHis') . '.' . $extension;
            $foto->move(public_path('storage/foto_barang'), $filename);
        }
        Mbarang::create([
            'id_barang' => $request->id_barang,
            'nama' => $request->nama,
            'varian' => $request->varian,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'foto' => $filename,
        ]);
        return redirect()->route('barang.index')->with('status', ['pesan' => 'Data berhasil disimpan', 'icon' => 'success']);
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
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);
        $barang = Mbarang::findOrFail($id);
        $foto = $request->file('foto');
        $filename = null;
        if ($foto) {
            $extension     = $foto->getClientOriginalExtension();
            $filename     = date('YmdHis') . '.' . $extension;
            $foto->move(public_path('storage/foto_barang'), $filename);
        }
        $barang->update([
            'nama' => $request->nama,
            'varian' => $request->varian,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'foto' => $filename,
        ]);
        return redirect()->route('barang.index')->with('status', ['pesan' => 'Data berhasil disimpan', 'icon' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $barang = Mbarang::findOrFail($id);
        $barang->delete();
        return redirect()->route('barang.index')->with('status', ['pesan' => 'Data berhasil dihapus', 'icon' => 'success']);
    }
    public function cetak(){
        $barang = Mbarang::get();
        return view('barang.cetak',compact('barang'));
    }
}
