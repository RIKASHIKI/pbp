<form method="POST" action="{{route('suplier.store')}}">
    @csrf
    ID suplier <input type="text" name="id_suplier" required>
    <br>
    NAMA : <input type="text" name="nama" required>
    <br />
    ALAMAT : <input type="text" name="alamat" required>
    @error('nama') {{ $message }} @enderror
    <br />
    KODE POS : <input type="text" name="kode_pos" required>
    <br />
    KOTA : <input type="text" name="kota" required>
    <button type="submit">Simpan</button>
    <button type="reset">Reset</button>
</form>