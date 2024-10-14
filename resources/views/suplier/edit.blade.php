<form method="post" action="{{route('suplier.update',$suplier->id_suplier)}}">
    @csrf
    @method('put')
    NAMA :
    <input type="text" name="nama" required value="{{ old('nama',$suplier->nama)}}">
    <br/>
    VARIAN :
    <input type="text" name="alamat" required value="{{ old('alamat',$suplier->alamat)}}">
    <br/>
    HARGA BELI :
    <input type="text" name="kode_pos" required value="{{ old('kode_pos',$suplier->kode_pos)}}">
    <br/>
    HARGA JUAL :
    <input type="text" name="kota" required value="{{ old('kota',$suplier->kota)}}">
    <br/>
    <button type="submit">simpan</button>
    <a href="{{ route('suplier.index')}}">kembali</a>

</form>