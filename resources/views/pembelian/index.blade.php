@extends('layout.menu')
@section('konten')
<a href="{{ route('pembelian.tambah') }}" class="btn btn-primary btn-sm" title="tambah"><i class="fa fa-plus"></i> tambah</a>
<a href="{{ route('pembelian.cetak') }}" target="_blank" class="btn btn-success btn-sm" title="cetak"><i class="fa fa-print"></i></a>
<a href="{{ route('pembelian.cetakex') }}" target="_blank" class="btn btn-success btn-sm" title="cetak excel"><i class="fa fa-print"></i></a>
    <br><br>
    <form id="filterForm" method="GET" action="{{ route('pembelian.index') }}">
        Dari :
        <input type="date" name="dari" id="dari" value="{{ request('dari') }}">
        Sampai :
        <input type="date" name="sampai" id="sampai" value="{{ request('sampai') }}">
    </form>
    
    <table id="exa" class="table-bordered table-hover table-striped table">
        <thead>
            <tr>
                <th>no</th>
                <th>id pembelian</th>
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
                    <td>{{ $p->qty }}</td>
                    <td>{{ dateid1($p->tgl) }}</td>
                    <td>{{ $p->nama_suplier }}</td>
                    <td>{{ $p->nama_barang }}</td>
                    @if (Auth::user()->level == 'admin')
                        <td>
                            <form id="delete-form-{{ $p->id_pembelian }}" method="POST" action="{{ route('pembelian.hapus', $p->id_pembelian) }}">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('pembelian.edit', $p->id_pembelian) }}" class="btn btn-success btn-sm mb-1" title="edit"><i class="fa fa-edit"></i></a>
                                <button type="button" onclick="confirmDelete({{ $p->id_pembelian }})" class="btn btn-danger btn-sm mb-1" title="hapus data"><i class="fa fa-trash"></i></button>
                            </form>
                            
                            @if (session('status'))
                                <script>
                                    Swal.fire({
                                        position: "center",
                                        icon: "{{ session('status')['icon'] }}",
                                        text: "{{ session('status')['pesan'] }}",
                                        showConfirmButton: false,
                                        timer: 2000
                                    });
                                </script>
                            @endif
                            
                            <script>
                                function confirmDelete(id) {
                                    Swal.fire({
                                        title: 'Yakin hapus data?',
                                        text: "Data yang dihapus tidak dapat dikembalikan!",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Ya, hapus!',
                                        cancelButtonText: 'Batal'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            document.getElementById('delete-form-' + id).submit();
                                        }
                                    });
                                }
                            </script>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterInputs = document.querySelectorAll('#filterForm input, #filterForm select');
            filterInputs.forEach(input => {
                input.addEventListener('change', function() {
                    document.getElementById('filterForm').submit();
                });
            });
        });
    </script>
    
@endsection
