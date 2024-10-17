@extends('layout.menu')
@section('konten')
<a href="{{route('pembeli.tambah')}}" class="btn btn-primary btn-sm mb-1">tambah data</a>
<br>
<table class="table-bordered table-hover table-striped table">
    <thead>
        <tr>
            <th>no</th>
            <th>id pembeli</th>
            <th>Nama</th>
            <th>jenis kelamin</th>
            <th>alamat</th>
            <th>kode pos</th>
            <th>kota</th>
            <th>tanggal lahir</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pembeli as $p)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$p->id_pembeli}}</td>
            <td>{{$p->nama}}</td>
            <td>{{$p->jns_kelamin}}</td>
            <td>{{$p->alamat}}</td>
            <td>{{$p->kode_pos}}</td>
            <td>{{$p->kota}}</td>
            <td>{{$p->tgl_lahir}}</td>
            <td>
                <form onsubmit="return confirm('yakin hapus data?');" method="POST" action="{{route('pembeli.hapus', $p->id_pembeli)}}">
                    @csrf
                    @method('delete')
                    <a href="{{ route('pembeli.ubah',$p->id_pembeli)}}">edit</a>
                    <button type="submit">hapus</button>
                </form>
                @if(session('status'))
                    <script>
                        Swal.fire({
                            position: "top-end",
		                    icon: "{{session('status')['icon']}}",
		                    text: "{{session('status')['pesan']}}",
		                    showConfirmButton: false,
		                    timer: 2000
                        });
                    </script>
                @endif
            </td>
        </tr>
            
        @endforeach
    </tbody>
</table>
@endsection