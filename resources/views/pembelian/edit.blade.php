@extends('layout.menu')
@section('konten')
    <div class="container">
        <h2>Edit Pembelian</h2>
        <form action="{{ route('pembelian.update', $pembelian->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="id_pembelian">Kode Pembelian</label>
                <input type="text" class="form-control" id="id_pembelian" name="id_pembelian" value="{{ $pembelian->id_pembelian }}" readonly>
            </div>

            <div class="form-group">
                <label for="id_barang">Barang</label>
                <select class="form-control" id="id_barang" name="id_barang" required>
                    @foreach ($barang as $b)
                        <option value="{{ $b->id_barang }}" {{ $pembelian->id_barang == $b->id_barang ? 'selected' : '' }}>
                            {{ $b->nama_barang }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="id_suplier">Suplier</label>
                <select class="form-control" id="id_suplier" name="id_suplier" required>
                    @foreach ($suplier as $s)
                        <option value="{{ $s->id_suplier }}" {{ $pembelian->id_suplier == $s->id_suplier ? 'selected' : '' }}>
                            {{ $s->nama_suplier }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="qty">Jumlah</label>
                <input type="number" class="form-control" id="qty" name="qty" value="{{ $pembelian->qty }}" required>
            </div>

            <div class="form-group">
                <label for="tgl">Tanggal Pembelian</label>
                <input type="date" class="form-control" id="tgl" name="tgl" value="{{ $pembelian->tgl }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Pembelian</button>
            <a href="{{ route('pembelian.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
