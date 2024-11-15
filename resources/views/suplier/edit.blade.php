@extends('layout.menu')
@section('konten')
    <form method="post" action="{{ route('suplier.update', $suplier->id) }}" class="mt-4">
        @csrf
        @method('put')

        ID SUPLIER :
        <input type="text" name="id_suplier" class="form-control" readonly
            value="{{ old('id_suplier', $suplier->id_suplier) }}">
        <br />
        NAMA :
        <input type="text" name="nama" class="form-control" required value="{{ old('nama', $suplier->nama) }}">
        <br />
        ALAMAT :
        <input type="text" name="alamat" class="form-control" required value="{{ old('alamat', $suplier->alamat) }}">
        <br />

        KODE POS :
        <input type="text" name="kode_pos" class="form-control" required
            value="{{ old('kode_pos', $suplier->kode_pos) }}">
        <br />

        KOTA :
        <input type="text" name="kota" class="form-control" required value="{{ old('kota', $suplier->kota) }}">
        <br />

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('suplier.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
