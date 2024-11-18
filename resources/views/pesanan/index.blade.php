@extends('layout.menu')
@section('konten')

<form method="GET" action="{{ route('pesanan.index') }}" class="mb-3">
    Dari :
    <input type="date" name="dari" value="{{ request('dari') }}">
    Sampai :
    <input type="date" name="sampai" value="{{ request('dari') }}">
    <button type="submit">Filter</button>
</form>


    <a href="{{ route('pesanan.tambah') }}" class="btn btn-primary btn-sm" title="tambah data"><i class="fa fa-plus"></i> Tambah Data</a>
    <a href="{{ route('pesanan.cetak') }}" target="_blank" class="btn btn-success btn-sm" title="cetak"><i class="fa fa-print"></i></a>
    <a href="{{ route('pesanan.cetakex') }}" target="_blank" class="btn btn-success btn-sm" title="cetak excel"><i class="fa fa-print"></i></a>
    <br>
    <table id="exa" class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Pesanan</th>
                <th>ID Pembeli</th>
                <th>ID Barang</th>
                <th>Qty</th>
                <th>Tanggal Pemesanan</th>
                <th>Pembeli</th>
                <th>Barang</th>
                @if (Auth::user()->level == 'admin')
                    <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($pesanan as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->id_pesanan }}</td>
                    <td>{{ $p->id_pembeli }}</td>
                    <td>{{ $p->id_barang }}</td>
                    <td>{{ $p->qty }}</td>
                    <td>{{ dateid1($p->tgl_pesan) }}</td>
                    <td>{{ $p->nama_pembeli }}</td>
                    <td>{{ $p->nama_barang }}</td>
                    @if (Auth::user()->level == 'admin')
                        <td>
                            <form onsubmit="return confirm('Yakin hapus data?');" method="POST" action="{{ route('pesanan.hapus', $p->id_pesanan) }}">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('pesanan.edit', $p->id_pesanan) }}" title="Edit data" class="btn btn-success btn-sm mt-1"><i class="fa fa-edit"></i></a>
                                <button type="submit" class="btn btn-danger btn-sm mt-1"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    
    @if (session('status'))
        <script>
            Swal.fire({
                position: "top-end",
                icon: "{{ session('status')['icon'] }}",
                text: "{{ session('status')['pesan'] }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif
@endsection
