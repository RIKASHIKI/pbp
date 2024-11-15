@extends('layout.menu')

@section('konten')
    <div class="container mt-4">
        @if (Auth::user()->level == 'admin')
            <a href="{{ route('pembeli.tambah') }}" class="btn btn-primary btn-sm mb-2" title="Tambah Pembeli">
                <i class="fa fa-plus"></i> Tambah
            </a>
        @endif
        <a href="{{ route('pembeli.cetak') }}" target="_blank" class="btn btn-danger btn-sm mb-2" title="Print">
            <i class="fa fa-print"></i>
        </a>

        <table id="exa" class="table table-bordered table-hover table-striped">
            @csrf
            <thead class="thead-dark">
                <tr>
                    <th style="text-align: center; width:30px;">No</th>
                    <th style="text-align: center;">ID Pembeli</th>
                    <th style="text-align: center;">Nama</th>
                    <th style="text-align: center;">Jenis Kelamin</th>
                    <th style="text-align: center;">Alamat</th>
                    <th style="text-align: center;">Kode Pos</th>
                    <th style="text-align: center;">Kota</th>
                    <th style="text-align: center;">Tanggal Lahir</th>
                    @if (Auth::user()->level == 'admin')
                        <th style="text-align: center; width: 100px;">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($pembeli as $p)
                    <tr>
                        <td style="text-align: center;">{{ $loop->iteration }}</td>
                        <td style="text-align: center;">{{ $p->id_pembeli }}</td>
                        <td>{{ $p->nama }}</td>
                        <td style="text-align: center;">{{ $p->jns_kelamin }}</td>
                        <td>{{ $p->alamat }}</td>
                        <td style="text-align: center;">{{ $p->kode_pos }}</td>
                        <td>{{ $p->kota }}</td>
                        <td style="text-align: center;">{{ dateid1($p->tgl_lahir) }}</td>
                        @if (Auth::user()->level == 'admin')
                            <td style="text-align: center;">
                                <form id="delete-form-{{ $p->id }}" method="POST" action="{{ route('suplier.destroy', $p->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('suplier.edit', $p->id) }}" class="btn btn-success btn-sm mb-1" title="edit"><i class="fa fa-edit"></i></a>
                                    <button type="button" onclick="confirmDelete({{ $p->id }})" class="btn btn-danger btn-sm mb-1" title="hapus data"><i class="fa fa-trash"></i></button>
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
    </div>
@endsection
