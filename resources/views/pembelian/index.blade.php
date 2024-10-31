@extends('layout.menu')
@section('konten')
    <a href="">tambah data</a>
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
