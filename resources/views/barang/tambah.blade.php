@extends('layout.menu')
@section('konten')
<form method="POST" action="{{route('barang.store')}}" enctype="multipart/form-data">
    @csrf
    ID BARANG : <input type="text" class="form-control" name="id_barang" required>
    @error('id_barang') {{ $message }} @enderror
    <br />
    NAMA BARANG : <input type="text" class="form-control" name="nama" required>
    <br />
    VARIAN BARANG : <input type="text" class="form-control" name="varian" required>
    @error('nama') {{ $message }} @enderror
    <br />
    HARGA BELI : <input type="number" class="form-control" name="harga_beli" required>
    <br />
    FOTO : <input type="file" name="foto" class="form-control" accept="image/*">
    @error('foto') {{  $message }} @enderror
    <br />
    HARGA JUAL : <input type="number" class="form-control" name="harga_jual" required>
    <button type="submit">Simpan</button>
    <button type="reset">Reset</button>
</form>
@endsection