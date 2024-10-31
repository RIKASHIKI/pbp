@extends('layout.menu')
@section('konten')
    <a href="#">tambah data</a>
    <br>
    <table id="exa" class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>no</th>
                <th>id pesanan</th>
                <th>id pembeli</th>
                <th>id barang</th>
                <th>qty</th>
                <th>tanggal pemesanan</th>
                <th>pembeli</th>
                <th>barang</th>
                @if (Auth::user()->level == 'admin')
                    <th>aksi</th>
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
                    <td>{{ $p->tgl_pesan }}</td>
                    <td>{{ $p->nama_pembeli }}</td>
                    <td>{{ $p->nama_barang }}</td>
                    @if (Auth::user()->level == 'admin')
                        <td>
                            <form onsubmit="return confirm('yakin hapus data?');" method="POST" action="">
                                @csrf
                                @method('delete')
                                <!--<a href="">edit</a>-->
                                <button type="submit">hapus</button>
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
