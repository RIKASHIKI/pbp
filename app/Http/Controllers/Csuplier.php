<?php

namespace App\Http\Controllers;

use App\Models\Msuplier;
use Illuminate\Http\Request;

class Csuplier extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $judul = 'Suplier';
        $suplier = Msuplier::get();
        return view('suplier.index', compact('suplier','judul'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $judul = 'tambah data suplier';
        return view('suplier.tambah',compact('judul'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_suplier' => 'required|string|max:20',
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string|max:200',
            'kode_pos' => 'required|string|max:10',
            'kota' => 'required|string|max:50',
        ]);
        Msuplier::create([
            'id_suplier' => $request->id_suplier,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kode_pos' => $request->kode_pos,
            'kota' => $request->kota,
        ]);
        return redirect()->route('suplier.index')->with('status', ['pesan' => 'Data berhasil disimpan', 'icon' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Msuplier $msuplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $judul = 'edit data suplier';
        $suplier = Msuplier::findOrFail($id);
        return view('suplier.edit', compact('suplier','judul'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_suplier' => 'required|string|max:20',
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string|max:200',
            'kode_pos' => 'required|string|max:10',
            'kota' => 'required|string|max:50',
        ]);
        $suplier = Msuplier::findOrFail($id);
        $suplier->update([
            'id_suplier' => $request->id_suplier,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kode_pos' => $request->kode_pos,
            'kota' => $request->kota,
        ]);
        return redirect()->route('suplier.index')->with('status', ['pesan' => 'Data berhasil diperbarui', 'icon' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $suplier = Msuplier::FindOrFail($id);
        $suplier->delete();
        return redirect()->route('suplier.index')->with('status', ['pesan' => 'Data berhasil dihapus', 'icon' => 'success']);
    }
}
