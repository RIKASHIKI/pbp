<?php

namespace App\Http\Controllers;

use App\Models\Mbarang;
use App\Models\Msuplier;
use App\Models\Mpembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\error;

class Cpembelian extends Controller
{
    // Menampilkan daftar pembelian
    public function index(Request $request){
        $judul = 'pembelian';
        $query = DB::table('pembelian')
            ->leftJoin('barang', 'pembelian.id_barang', '=', 'barang.id_barang')
            ->leftJoin('suplier', 'pembelian.id_suplier', '=', 'suplier.id_suplier')
            ->select('pembelian.*', 'barang.nama as nama_barang', 'suplier.nama as nama_suplier')
            ->orderBy('pembelian.tgl','DESC');
            if ($request->filled('dari') && $request->filled('sampai')) {
                $query->whereBetween('pembelian.tgl', [$request->dari, $request->sampai]);
            }
            $pembelian = $query->get();
        return view('pembelian.index', compact('pembelian', 'judul'));
    }

    // Menampilkan halaman tambah pembelian
    public function tambah(){
        $judul = 'tambah data pembelian';
        $barang = DB::table('barang')
            ->select('id_barang', 'nama')
            ->get();
        $suplier = DB::table('suplier')
            ->select('id_suplier', 'nama')
            ->get();
        $kode_pembelian_baru = $this->kode_pembelian();
        return view('pembelian.tambah', compact('barang', 'suplier', 'judul', 'kode_pembelian_baru'));
    }

    // Menyimpan data pembelian
    public function simpan(Request $request){
        $request->validate([
            'id_pembelian' => 'required|unique:pembelian,id_pembelian',
            'id_barang' => 'required',
            'id_suplier' => 'required',
            'qty' => 'required|integer',
            'tgl' => 'required|date',
        ]);

        Mpembelian::create([
            'id_pembelian' => $request->id_pembelian,
            'id_barang' => $request->id_barang,
            'id_suplier' => $request->id_suplier,
            'qty' => $request->qty,
            'tgl' => $request->tgl,
        ]);

        return redirect()->route('pembelian.index')->with('status', ['pesan' => 'Data berhasil disimpan', 'icon' => 'success']);
    }

    // Menampilkan halaman edit pembelian
    public function edit(string $id_pembelian){
        $barang = DB::table('barang')
            ->select('id_barang', 'nama as nama_barang')
            ->get();
        $suplier = DB::table('suplier')
            ->select('id_suplier', 'nama as nama_suplier')
            ->get();
        $pembelian = Mpembelian::where("id_pembelian", $id_pembelian)->firstOrFail();
        $judul = "edit data pembelian";
        return view("pembelian.edit", compact('pembelian', 'judul', 'barang', 'suplier'));
    }

    // Update data pembelian
    public function update(Request $request, String $id_pembelian){
        $request->validate([
            'id_pembelian' => 'required|exists:pembelian,id_pembelian',
            'id_barang' => 'required',
            'id_suplier' => 'required',
            'qty' => 'required|integer',
            'tgl' => 'required|date',
        ]);

        $pembelian = Mpembelian::where("id_pembelian", $id_pembelian)->firstOrFail();
        $pembelian->update([
            "id_pembelian" => $request->id_pembelian,
            "id_barang" => $request->id_barang,
            "id_suplier" => $request->id_suplier,
            "qty" => $request->qty,
            "tgl" => $request->tgl,
        ]);

        return redirect()->route('pembelian.index')->with('status', ['pesan' => 'Data berhasil diperbarui', 'icon' => 'success']);
    }

    // Hapus data pembelian
    public function hapus($id_pembelian){
        $pembelian = Mpembelian::where('id_pembelian', $id_pembelian)->firstOrFail();
        $pembelian->delete();
        return redirect()->route('pembelian.index')->with('status', ['pesan' => 'Data berhasil dihapus', 'icon' => 'success']);
    }

    // Cetak data pembelian
    public function cetak(){
        $pembelian = DB::table('pembelian')
            ->leftJoin('barang', 'barang.id_barang', '=', 'barang.id_barang')
            ->leftJoin('suplier', 'suplier.id_suplier', '=', 'suplier.id_suplier')
            ->select('pembelian.*', 'barang.nama as nama_barang', 'suplier.nama as nama_suplier')
            ->get();
        return view('pembelian.cetak', compact('pembelian'));
    }

    // Cetak Excel data pembelian
    public function cetakex(){
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=data_pembelian.xls");

        $pembelian = DB::table('pembelian')
            ->leftJoin('barang', 'barang.id_barang', '=', 'barang.id_barang')
            ->leftJoin('suplier', 'suplier.id_suplier', '=', 'suplier.id_suplier')
            ->select('pembelian.*', 'barang.nama as nama_barang', 'suplier.nama as nama_suplier')
            ->get();

        return view('pembelian.excel', compact('pembelian'));
    }

    // Method untuk menghasilkan kode pembelian baru (contoh)
    private function kode_pembelian(){
        $lastPesanan = DB::table('pembelian')->orderBy('id_pembelian', 'desc')->first();
        if ($lastPesanan) {
            $kodeTerakhir = intval(substr($lastPesanan->id_pembelian, -3));
            $kodeBaru = 'PEM-' . str_pad($kodeTerakhir + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $kodeBaru = 'PEM-0001';
        }
        return $kodeBaru;
    }
}
