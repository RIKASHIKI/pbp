@extends('layout.menu')

@section('konten')
<div class="container">
    <h2 class="mt-4">{{ $judul }}</h2>
    <form action="{{ route('pembelian.simpan') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="id_pembelian">Kode Pembelian</label>
            <input type="text" name="id_pembelian" id="id_pembelian" class="form-control" value="{{ $kode_pembelian_baru }}" readonly>
        </div>

        <div class="form-group mt-3">
            <label for="id_barang">Pilih Barang</label>
            <select name="id_barang" id="id_barang" class="form-control" required>
                <option value="">-- Pilih Barang --</option>
                @foreach ($barang as $b)
                    <option value="{{ $b->id_barang }}">{{ $b->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="id_suplier">Pilih Suplier</label>
            <select name="id_suplier" id="id_suplier" class="form-control" required>
                <option value="">-- Pilih Suplier --</option>
                @foreach ($suplier as $s)
                    <option value="{{ $s->id_suplier }}">{{ $s->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="qty">Jumlah</label>
            <input type="number" name="qty" id="qty" class="form-control" placeholder="Masukkan jumlah barang" required>
        </div>

        <div class="form-group mt-3">
            <label for="tgl">Tanggal Pembelian</label>
            <input type="date" name="tgl" id="tgl" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        <a href="{{ route('pembelian.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
@endsection
