@extends('layout.menu')
@section('konten')
<a href="{{ route('pembelian.tambah') }}" class="btn btn-primary btn-sm">Tambah Data</a>
<a href="{{ route('pembelian.cetak') }}" target="_blank" class="btn btn-success btn-sm">Cetak</a>
<a href="{{ route('pembelian.cetakex') }}" target="_blank" class="btn btn-success btn-sm">Cetak Excel</a>
    <br>
    <table id="exa" class="table-bordered table-hover table-striped table">
        <thead>
            <tr>
                <th>no</th>
                <th>id pembelian</th>
                <th>id barang</th>
                <th>id suplier</th>
                <th>qty</th>
                <th>tanggal pembelian</th>
                <th>suplier</th>
                <th>barang</th>
                @if (Auth::user()->level == 'admin')
                    <th>aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($pembelian as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->id_pembelian }}</td>
                    <td>{{ $p->id_barang }}</td>
                    <td>{{ $p->id_suplier }}</td>
                    <td>{{ $p->qty }}</td>
                    <td>{{ $p->tgl }}</td>
                    <td>{{ $p->nama_suplier }}</td>
                    <td>{{ $p->nama_barang }}</td>
                    @if (Auth::user()->level == 'admin')
                        <td>
                            <form onsubmit="return confirm('Yakin hapus data?');" method="POST" action="{{ route('pembelian.hapus', $p->id_pembelian) }}">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('pembelian.edit', $p->id_pembelian) }}" title="Edit data" class="btn btn-success btn-sm mt-3"><i class="fa fa-edit"></i></a>
                                <button type="submit" class="btn btn-danger btn-sm mt-3"><i class="fa fa-trash"></i></button>
                            </form>
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
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
