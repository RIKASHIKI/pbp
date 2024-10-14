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
        $suplier = Msuplier::get();
        return view('suplier.index', compact('suplier'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suplier.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:20',
            'alamat' => 'required|string',
            'kode_pos' => 'required|string|max:10',
            'kota' => 'required|string|max:11',
        ]);
        Msuplier::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kode_pos' => $request->kode_pos,
            'kota' => $request->kota,
        ]);
        return redirect()->route('suplier.index')->with('success','data suplier berhasil disimpan');
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
        $suplier = Msuplier::findOrFail($id);
        return view('suplier.edit', compact('suplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:20',
            'alamat' => 'required|string',
            'kode_pos' => 'required|string|max:10',
            'kota' => 'required|string|max:11',
        ]);
        $suplier = Msuplier::findOrFail($id);
        $suplier->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kode_pos' => $request->kode_pos,
            'kota' => $request->kota,
        ]);
        return redirect()->route('suplier.index')->with('success','data suplier berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $suplier = Msuplier::FindOrFail($id);
        $suplier->delete();
        return redirect()->route('suplier.index')->with('success','data suplier berhasil di hapus');
    }
}
