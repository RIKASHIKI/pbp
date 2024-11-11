@extends('layout.menu')
@section('konten')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">{{ $judul }}</h3>
                </div>
                <div class="card-body">
                    <!-- Form Tambah Pesanan -->
                    <form action="{{ route('pesanan.simpan') }}" method="POST">
                        @csrf

                        <!-- Input ID Pesanan -->
                        <div class="form-group">
                            <label for="id_pesanan">ID Pesanan</label>
                            <input type="text" name="id_pesanan" id="id_pesanan" class="form-control" value="{{ $kode_pesanan_baru }}" readonly>
                        </div>

                        <!-- Input Nama Pembeli -->
                        <div class="form-group">
                            <label for="id_pembeli">Nama Pembeli</label>
                            <select name="id_pembeli" id="id_pembeli" class="form-control">
                                <option value="">-- Pilih Pembeli --</option>
                                @foreach ($pembeli as $p)
                                    <option value="{{ $p->id_pembeli }}">{{ $p->nama }}</option>
                                @endforeach
                            </select>
                            @error('id_pembeli')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Input Nama Barang -->
                        <div class="form-group">
                            <label for="id_barang">Nama Barang</label>
                            <select name="id_barang" id="id_barang" class="form-control">
                                <option value="">-- Pilih Barang --</option>
                                @foreach ($barang as $b)
                                    <option value="{{ $b->id_barang }}">{{ $b->nama }}</option>
                                @endforeach
                            </select>
                            @error('id_barang')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Input Quantity -->
                        <div class="form-group">
                            <label for="qty">Jumlah</label>
                            <input type="number" name="qty" id="qty" class="form-control" placeholder="Masukkan jumlah pesanan">
                            @error('qty')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Input Tanggal Pesanan -->
                        <div class="form-group">
                            <label for="tgl_pesan">Tanggal Pesanan</label>
                            <input type="date" name="tgl_pesan" id="tgl_pesan" class="form-control">
                            @error('tgl_pesan')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Tombol Submit -->
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('pesanan.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
