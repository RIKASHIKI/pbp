@extends('layout.menu')
@section('konten')
<br>
    <h3>selamat datang {{ Auth::user()->username }}</h3>
    tingkat pengguna : {{ Auth::user()->level }}
<br>


<br>
<br>
<div>
    jumlah barang : {{ $jumlah_barang }}<br>
    jumlah pembeli : {{ $jumlah_pembeli }}
</div>
@endsection