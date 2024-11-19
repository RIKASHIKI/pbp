@extends('layout.menu')
@section('konten')
<form method="post" action="{{route('barang.update', $barang->id)}}" class="mt-4" enctype="multipart/form-data">
    @csrf
    @method('put')
    
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" class="form-control" required value="{{ old('nama', $barang->nama) }}">
    </div>
    
    <div class="form-group">
        <label for="varian">Varian</label>
        <input type="text" name="varian" id="varian" class="form-control" required value="{{ old('varian', $barang->varian) }}">
    </div>
    
    <div class="form-group">
        <label for="foto">Foto</label>
        <!-- Input file -->
        <input type="file" name="foto" id="foto" class="form-control" accept="image/*" onchange="previewImage(event)">
        
        <!-- Tempat pratinjau gambar -->
        <div class="mt-3">
            <img id="preview" src="{{ asset('storage/foto_barang/' . $barang->foto) }}" alt="Pratinjau Foto" style="max-width: 200px; display: {{ $barang->foto ? 'block' : 'none' }}; border: 1px solid #ccc; border-radius: 5px;">
        </div>
    </div>
    
    <div class="form-group">
        <label for="harga_beli">Harga Beli</label>
        <input type="number" name="harga_beli" id="harga_beli" class="form-control" required value="{{ old('harga_beli', $barang->harga_beli) }}">
    </div>
    
    <div class="form-group">
        <label for="harga_jual">Harga Jual</label>
        <input type="number" name="harga_jual" id="harga_jual" class="form-control" required value="{{ old('harga_jual', $barang->harga_jual) }}">
    </div>

    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    <a href="{{ route('barang.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</form>

<!-- JavaScript untuk pratinjau gambar -->
<script>
    function previewImage(event) {
        const preview = document.getElementById('preview');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            preview.src = '';
            preview.style.display = 'none';
        }
    }
</script>
@endsection
