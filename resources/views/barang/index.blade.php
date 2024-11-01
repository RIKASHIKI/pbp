@extends('layout.menu')
@section('konten')
    @if (Auth::user()->level == 'admin')
        <a href="{{ route('barang.create') }}" class="btn btn-primary btn-sm mb-1">tambah data</a>
    @endif
    <table id="exa" class="table-bordered table-hover table-striped table">
        @csrf
        <thead>
            <tr>
                <th style="text-align: center;">no</th>
                <th style="text-align: center;">id barang</th>
                <th style="text-align: center;">nama</th>
                <th style="text-align: center;">varian</th>
                <th style="text-align: center;">harga beli</th>
                <th style="text-align: center;">harga jual</th>
                @if (Auth::user()->level == 'admin')
                    <th style="text-align:center; width: 70px;">aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($barang as $b)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $b->id_barang }}</td>
                    <td>{{ $b->nama }}</td>
                    <td>{{ $b->varian }}</td>
                    <td>{{ $b->harga_beli }}</td>
                    <td>{{ $b->harga_jual }}</td>
                    @if (Auth::user()->level == 'admin')
                        <td>
                            <form onsubmit="return confirm('yakin hapus data?');" method="post"
                                action="{{ route('barang.destroy', $b->id) }}">
                                @csrf
                                @method('delete')
                                <a href="{{ route('barang.edit', $b->id) }}" title="edit data"
                                    class="btn btn-success btn-sm mt-3"><i class="fa fa-edit"></i></a>
                                <button type="submit" title="hapus data" class="btn btn-danger btn-sm mt-3"><i
                                        class="fa fa-trash"></i></button>
                            </form>

                            @if (session('status'))
                                <script>
                                    Swal.fire({
                                        position: "top-end",
                                        title: "{{ session('status')['judul'] }}"
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
