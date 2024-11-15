@extends('layout.menu')
@section('konten')
    <form method="POST" action="{{ route('pembeli.simpan') }}" class="container mt-4">
        @csrf

        <div class="form-group">
            <label for="id_pembeli">ID PEMBELI</label>
            <input type="text" class="form-control" name="id_pembeli" required value="{{ $kode_pembeli }}" readonly>
            @error('id_pembeli')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="nama">NAMA</label>
            <input type="text" class="form-control" name="nama" required>
            @error('nama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="alamat">ALAMAT</label>
            <textarea class="form-control" name="alamat" rows="3" required></textarea>
            @error('alamat')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="jns_kelamin">JENIS KELAMIN</label>
            <select name="jns_kelamin" class="form-control" required>
                <option value="">~ pilih ~</option>
                <option value="pria">Pria</option>
                <option value="wanita">Wanita</option>
            </select>
            @error('jns_kelamin')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="kode_pos">KODE POS</label>
            <input type="number" class="form-control" name="kode_pos" title="kode pos" required>
            @error('kode_pos')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="kota">KOTA</label>
            <input type="text" class="form-control" name="kota" required>
            @error('kota')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="tgl_lahir">TANGGAL LAHIR</label>
            <input type="date" class="form-control" name="tgl_lahir" required>
            @error('tgl_lahir')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
    </form>
@endsection
