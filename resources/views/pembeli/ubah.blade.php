@extends('layout.menu')
@section('konten')
<form method="POST" action="{{route('pembeli.simpan')}}">
    @csrf
    @method('PUT')
    ID PEMBELI : <input type="text" name="id_pembeli" required readonly value={{old{'id_pembeli',$pembeli->id_pembeli}}}>
    @error('id_pembeli'){{ $message }} @enderror
        
    <br />
    NAMA : <input type="text" name="nama" required>
    @error('nama') {{ $message }} @enderror
    <br />
    JENIS KELAMIN : <select name="jns_kelamin" required>
        <option value="">~ pilih ~</option>
        <option value="pria">pria</option>
        <option value="wanita">wanita</option>
        @error('jns_kelamin') {{ $message }} @enderror

    <br />
    ALAMAT : <textarea name="alamat" rows="5" required>{{$pembeli->alamat}}</textarea>
    @error('alamat') {{ $message }} @enderror
    <br />
    KODE POS : <input type="number" name="kode_pos" required>
    @error('kode_pos') {{ $message }} @enderror
    <br />
    KOTA : <input type="text" name="kota" required>
    @error('kota') {{ $message }} @enderror
    <br />
    TANGGAL LAHIR : <input type="date" name="tgl_lahir" required>
    @error('tgl_lahir') {{ $message }} @enderror
    <button type="submit">Simpan</button>
    <button type="reset">Reset</button>
</form>
@endsection