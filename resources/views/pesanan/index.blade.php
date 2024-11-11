@extends('layout.menu')
@section('konten')
    <a href="{{ route('pesanan.tambah') }}" class="btn btn-primary btn-sm">Tambah Data</a>
    <a href="{{ route('pesanan.cetak') }}" target="_blank" class="btn btn-success btn-sm">Cetak</a>
    <a href="{{ route('pesanan.cetakex') }}" target="_blank" class="btn btn-success btn-sm">Cetak Excel</a>
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
                                <a href="{{ route('pesanan.edit', $p->id_pesanan) }}" title="Edit data" class="btn btn-success btn-sm mt-3"><i class="fa fa-edit"></i></a>
                                <button type="submit" class="btn btn-danger btn-sm mt-3"><i class="fa fa-trash"></i></button>
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
