@extends('layout.menu')
@section('konten')
    <div>
        <a href="{{ route('admin.tambah') }}" class="btn btn-primary btn-sm mb-1" title="tambah pengguna"><i
                class="fa fa-plus"></i> tambah data</a>
        <table id="exa" class="table-bordered table-hover table-striped table">

            @csrf
            <thead>
                <tr>
                    <th style="text-align: center; width:30px;">no</th>
                    <th style="text-align: center;">nama</th>
                    <th style="text-align: center;">username</th>
                    <th style="text-align: center;">email</th>
                    <th style="text-align: center;">level</th>
                    <th style="text-align:center; width: 70px;">aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admin as $a)
                    <tr>
                        <td style="text-align: center;">{{ $loop->iteration }}</td>
                        <td>{{ $a->name }}</td>
                        <td>{{ $a->username }}</td>
                        <td>{{ $a->email }}</td>
                        <td>{{ $a->level }}</td>
                        <td style="text-align:center;">
                            <form id="delete-form-{{ $a->id }}" method="POST"
                                action="{{ route('admin.delete', $a->id) }}">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('admin.edit', $a->id) }}" class="btn btn-success btn-sm mb-1"
                                    title="edit"><i class="fa fa-edit"></i></a>
                                <button type="button" onclick="confirmDelete({{ $a->id }})"
                                    class="btn btn-danger btn-sm mb-1" title="hapus data"><i
                                        class="fa fa-trash"></i></button>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
