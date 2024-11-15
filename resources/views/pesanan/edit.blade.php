@extends('layout.menu')
@section('konten')
    <div class="container">
        <h2>Edit Pesanan</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pesanan.update', $pesanan->id_pesanan) }}" method="POST">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="id_pesanan">ID Pesanan</label>
                <input type="text" class="form-control" id="id_pesanan" name="id_pesanan" value="{{ $pesanan->id_pesanan }}"
                    readonly>
            </div>

            <div class="form-group">
                <label for="id_pembeli">Pembeli</label>
                <select class="form-control" id="id_pembeli" name="id_pembeli">
                    @foreach ($pembeli as $p)
                        <option value="{{ $p->id_pembeli }}" {{ $pesanan->id_pembeli == $p->id_pembeli ? 'selected' : '' }}>
                            {{ $p->nama_pembeli }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="id_barang">Barang</label>
                <select class="form-control" id="id_barang" name="id_barang">
                    @foreach ($barang as $b)
                        <option value="{{ $b->id_barang }}" {{ $pesanan->id_barang == $b->id_barang ? 'selected' : '' }}>
                            {{ $b->nama_barang }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="qty">Quantity</label>
                <input type="number" class="form-control" id="qty" name="qty" value="{{ $pesanan->qty }}"
                    required>
            </div>

            <div class="form-group">
                <label for="tgl_pesan">Tanggal Pesan</label>
                <input type="date" class="form-control" id="tgl_pesan" name="tgl_pesan"
                    value="{{ $pesanan->tgl_pesan }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Pesanan</button>
            <a href="{{ route('pesanan.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
