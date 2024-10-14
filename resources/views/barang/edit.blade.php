@extends('layout.menu')
@section('konten')
<form method="post" action="{{route('barang.update',$barang->id_barang)}}">
    @csrf
    @method('put')
    NAMA :
    <input type="text" name="nama" required value="{{ old('nama',$barang->nama)}}">
    <br/>
    VARIAN :
    <input type="text" name="varian" required value="{{ old('varian',$barang->varian)}}">
    <br/>
    HARGA BELI :
    <input type="number" name="harga_beli" required value="{{ old('harga_beli',$barang->harga_beli)}}">
    <br/>
    HARGA JUAL :
    <input type="number" name="harga_jual" required value="{{ old('harga_jual',$barang->harga_beli)}}">
    <br/>
    <button type="submit">simpan</button>
    <a href="{{ route('barang.index')}}">kembali</a>

</form>
@endsection