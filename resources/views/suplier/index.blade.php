@extends('layout.menu')
@section('konten')
@if (Auth::user()->level == 'admin')
<a href="{{route('suplier.create')}}" class="btn btn-primary mb-3" title="tambah"><i class="fa fa-plus"> tambah</i></a>
@endif
<table id="exa" class="table table-bordered table-hover table-striped">
    @csrf
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>di suplier</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Kode Pos</th>
            <th>Kota</th>
            @if (Auth::user()->level == 'admin')
            <th>Aksi</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($suplier as $s)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{ $s->id_suplier }}</td>
            <td>{{$s->nama}}</td>
            <td>{{$s->alamat}}</td>
            <td>{{$s->kode_pos}}</td>
            <td>{{$s->kota}}</td>
            @if (Auth::user()->level == 'admin')
            <td>
                <form id="delete-form-{{ $s->id }}" method="POST" action="{{ route('suplier.destroy', $s->id) }}">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('suplier.edit', $s->id) }}" class="btn btn-success btn-sm mb-1" title="edit"><i class="fa fa-edit"></i></a>
                    <button type="button" onclick="confirmDelete({{ $s->id }})" class="btn btn-danger btn-sm mb-1" title="hapus data"><i class="fa fa-trash"></i></button>
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
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
