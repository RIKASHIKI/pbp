@extends('layout.menu')
@section('konten')
<form method="POST" action="{{route('suplier.store')}}" class="mt-4">
    @csrf
    ID suplier: <input type="text" name="id_suplier" class="form-control" required>
    @error('id_suplier') 
        <div class="text-danger">{{ $message }}</div>
    @enderror
    <br>
    NAMA: <input type="text" name="nama" class="form-control" required>
    @error('nama') 
        <div class="text-danger">{{ $message }}</div>
    @enderror
    <br />
    ALAMAT: <input type="text" name="alamat" class="form-control" required>
    @error('alamat') 
        <div class="text-danger">{{ $message }}</div>
    @enderror
    <br />
    KODE POS: <input type="text" name="kode_pos" class="form-control" required>
    @error('kode_pos') 
        <div class="text-danger">{{ $message }}</div>
    @enderror
    <br />
    KOTA: <input type="text" name="kota" class="form-control" required>
    @error('kota') 
        <div class="text-danger">{{ $message }}</div>
    @enderror
    <br />
    <button type="submit" class="btn btn-primary">Simpan</button>
    <button type="reset" class="btn btn-secondary">Reset</button>
</form>
@endsection