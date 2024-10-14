@extends('layout.menu')
@section('konten')
<form method="POST" action="{{route('barang.store')}}">
    @csrf

    NAMA : <input type="text" name="nama" required>
    <br />
    VARIAN : <input type="text" name="varian" required>
    @error('nama') {{ $message }} @enderror
    <br />
    HARGA BELI : <input type="number" name="harga_beli" required>
    <br />
    HARGA JUAL : <input type="number" name="harga_jual" required>
    <button type="submit">Simpan</button>
    <button type="reset">Reset</button>
</form>
@endsection