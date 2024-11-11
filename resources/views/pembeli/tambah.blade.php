@extends('layout.menu')
@section('konten')
    <form method="POST" action="{{ route('pembeli.simpan') }}">
        @csrf
        ID PEMBELI : <input type="text" name="id_pembeli" required value="{{ $kode_pembeli }}" readonly required>
        @error('id_pembeli')
            {{ $message }}
        @enderror

        <br />
        NAMA : <input type="text" name="nama" required>
        @error('nama')
            {{ $message }}
        @enderror
        <br />
        <div>
            <label for="alamat">ALAMAT</label>
            <textarea name="alamat" rows="3" required></textarea>
            @error('alamat')
                {{ $message }}
            @enderror
        </div>
        <br>
        <div>
            <label for="jns_kelamin">JENIS KELAMIN</label><br>
            <select name="jns_kelamin" required>
                <option value="">~ pilih ~</option>
                <option value="pria">pria</option>
                <option value="wanita">wanita</option>
                @error('jns_kelamin')
                    <div>{{ $message }}</div>
                @enderror
        </div>
        <br />
        <div>
            <label for="kode_pos">KODE POS</label><br>
            <input type="number" name="kode_pos" title="kode pos" required>
            @error('kode_pos')
                {{ $message }}
            @enderror
        </div>
        <br />
        KOTA : <input type="text" name="kota" required>
        @error('kota')
            {{ $message }}
        @enderror
        <br />
        TANGGAL LAHIR : <input type="date" name="tgl_lahir" required>
        @error('tgl_lahir')
            {{ $message }}
        @enderror
        <div>
            <br>
            <button type="submit">Simpan</button>
            <button type="reset">Reset</button>
        </div>
    </form>
@endsection
