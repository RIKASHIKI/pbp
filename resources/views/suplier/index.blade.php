@extends('layout.menu')
@section('konten')

@if (Auth::user()->level == 'admin')
<a href="{{route('suplier.create')}}">tambah data</a>
@endif
<table id="exa" class="table table-bordered table-hover table-striped">
    @csrf
    <thead>
        <tr>
            <th>no</th>
            <th>nama</th>
            <th>alamat</th>
            <th>kode pos</th>
            <th>kota</th>
            @if (Auth::user()->level == 'admin')
            <th>aksi</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($suplier as $s)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$s->nama}}</td>
            <td>{{$s->alamat}}</td>
            <td>{{$s->kode_pos}}</td>
            <td>{{$s->kota}}</td>
            @if (Auth::user()->level == 'admin')
            <td>
                
                <form onsubmit="return confirm('yakin hapus data?');" method="post" action="{{route('suplier.destroy', $s->id_suplier)}}">
                    @csrf
                    @method('delete')
                    <a href="{{ route('suplier.edit',$s->id_suplier)}}">edit</a>
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
            @endif
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
