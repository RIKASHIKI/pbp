@extends('layout.menu')

@section('konten')
    <div class="container mt-4">

        @if (Auth::user()->level == 'admin')
            <a href="{{ route('pembeli.tambah') }}" class="btn btn-primary btn-sm mb-1">Tambah Data</a>
        @endif
        <a href="{{ route('pembeli.cetak') }}" target="_blank" class="btn btn-danger btn-sm">Cetak</a>
        
        <table id="exa" class="table table-bordered table-hover table-striped">
            @csrf
            <thead>
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
                        <th style="text-align: center; width: 70px;">Aksi</th>
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
                                <form onsubmit="return confirm('Yakin ingin menghapus data ini?');" method="POST"
                                    action="{{ route('pembeli.hapus', $p->id_pembeli) }}">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('pembeli.ubah', $p->id_pembeli) }}" title="Edit Pembeli"
                                        class="btn btn-success btn-sm mt-3"><i class="fa fa-edit"></i></a>
                                    <button type="submit" title="Hapus Pembeli" class="btn btn-danger btn-sm mt-3"><i
                                            class="fa fa-trash"></i></button>
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
    </div>
@endsection
