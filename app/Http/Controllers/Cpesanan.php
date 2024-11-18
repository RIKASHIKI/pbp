<?php

namespace App\Http\Controllers;

use App\Models\Mbarang;
use App\Models\Mpembeli;
use App\Models\Mpesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Cpesanan extends Controller
{
    public function index(Request $request)
    {
        $judul = 'pesanan';
        $query = DB::table('pesanan')
            ->leftJoin('barang', 'pesanan.id_barang', '=', 'barang.id_barang')
            ->leftJoin('pembeli', 'pesanan.id_pembeli', '=', 'pembeli.id_pembeli')
            ->select('pesanan.*', 'barang.nama as nama_barang', 'pembeli.nama as nama_pembeli')
            ->orderBy('pesanan.tgl_pesan', 'DESC');

            if ($request->filled('dari') && $request->filled('sampai')) {
                $query->whereBetween('pesanan.tgl_pesan', [$request->dari, $request->sampai]);
            }
        

            $pesanan = $query->get();
        return view('pesanan.index', compact('pesanan', 'judul'));
    }

    public function tambah()
    {
        $judul = 'tambah data pesanan';
        $pembeli = DB::table('pembeli')
            ->select('id_pembeli', 'nama')->get();

        $barang = DB::table('barang')
            ->select('id_barang', 'nama')->get();

        $kode_pesanan_baru = $this->kode_pesanan();
        return view('pesanan.tambah', compact('pembeli', 'barang', 'judul', 'kode_pesanan_baru'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'id_pesanan' => 'required|unique:pesanan,id_pesanan',
            'id_pembeli' => 'required',
            'id_barang' => 'required',
            'qty' => 'required|integer',
            'tgl_pesan' => 'required|date',
        ]);

        Mpesanan::create([
            'id_pesanan' => $request->id_pesanan,
            'id_pembeli' => $request->id_pembeli,
            'id_barang' => $request->id_barang,
            'qty' => $request->qty,
            'tgl_pesan' => $request->tgl_pesan,
        ]);

        return redirect()->route('pesanan.index')->with('success', "Data berhasil ditambahkan");
    }
    //     public function save(Request $request)
    // {
    //     $request->validate([
    //         'id_pesanan'    => 'required|max:15|unique:pesanan,id_pesanan'
    //     ]);

    //     $pesanan = new Mpesanan;
    //     $pesanan->id_pesanan    = $request->id_pesanan;
    //     $pesanan->id_barang     = $request->nama_barang;
    //     $pesanan->id_pembeli  = $request->nama_pembeli;
    //     $pesanan->qty           = $request->qty;
    //     $pesanan->tgl_pesan     = $request->tgl_pesan;
    //     $pesanan->save();

    //     return redirect()->route('pesanan.index')->with('Sukses', 'Data tersimpan');
    // }


    public function edit(string $id_pesanan)
    {
        $pembeli = DB::table('pembeli')
            ->select('id_pembeli', 'nama as nama_pembeli')
            ->get();

        $barang = DB::table('barang')
            ->select('id_barang', 'nama as nama_barang')
            ->get();

        $pesanan = Mpesanan::where("id_pesanan", $id_pesanan)->firstOrFail();
        $judul = "edit data pesanan";
        return view("pesanan.edit", compact('pesanan', 'judul', 'barang', 'pembeli'));
    }

    public function update(Request $request, String $id_pesanan)
    {
        $request->validate([
            'id_pesanan' => 'required|exists:pesanan,id_pesanan',
            'id_pembeli' => 'required',
            'id_barang' => 'required',
            'qty' => 'required|integer',
            'tgl_pesan' => 'required|date',
        ]);

        $pesanan = Mpesanan::where("id_pesanan", $id_pesanan)->firstOrFail();
        $pesanan->update([
            "id_pesanan" => $request->id_pesanan,
            "id_pembeli" => $request->id_pembeli,
            "id_barang" => $request->id_barang,
            "qty" => $request->qty,
            "tgl_pesan" => $request->tgl_pesan,
        ]);

        return redirect()->route('pesanan.index')->with("success", "Data pesanan berhasil diupdate");
    }
    public function hapus($id_pesanan)
    {
        $pesanan = Mpesanan::where('id_pesanan', $id_pesanan)->firstOrFail();
        $pesanan->delete();
        return redirect()->route('pesanan.index')->with('status', ['icon' => 'success', 'pesan' => 'Data pesanan berhasil dihapus!']);
    }

    public function cetak(Request $request)
    {
        $query = DB::table('pesanan')
            ->leftJoin('barang', 'pesanan.id_barang', '=', 'barang.id_barang')
            ->leftJoin('pembeli', 'pesanan.id_pembeli', '=', 'pembeli.id_pembeli')
            ->select('pesanan.*', 'barang.nama as nama_barang', 'pembeli.nama as nama_pembeli')
            ->orderBy('pesanan.tgl_pesan', 'DESC');

            if ($request->filled('dari') && $request->filled('sampai')) {
                $query->whereBetween('pesanan.tgl_pesan', [$request->dari, $request->sampai]);
            }
        

            $pesanan = $query->get();
        return view('pesanan.cetak', compact('pesanan'));
    }

    public function cetakex()
    {
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=pesanan.xls");

        $pesanan = DB::table('pesanan')
            ->leftJoin('barang', 'barang.id_barang', '=', 'barang.id_barang')
            ->leftJoin('pembeli', 'pembeli.id_pembeli', '=', 'pembeli.id_pembeli')
            ->select('pesanan.*', 'barang.nama as nama_barang', 'pembeli.nama as nama_pembeli')
            ->get();

        return view('pesanan.excel', compact('pesanan'));
    }

    // Method untuk menghasilkan kode pesanan baru (contoh)
    private function kode_pesanan()
    {
        $lastPesanan = DB::table('pesanan')->orderBy('id_pesanan', 'desc')->first();
        if ($lastPesanan) {
            $kodeTerakhir = intval(substr($lastPesanan->id_pesanan, -3));
            $kodeBaru = 'PE-' . str_pad($kodeTerakhir + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $kodeBaru = 'PE-0001';
        }
        return $kodeBaru;
    }
}
