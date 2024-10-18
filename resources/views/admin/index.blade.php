@extends('layout.menu')
@section('konten')

<table id="exa" class="table-bordered table-hover table-striped table">
    @csrf
    <thead>
        <tr>
            <th style="text-align: center; width:30px;">no</th>
            <th style="text-align: center;">nama</th>
            <th style="text-align: center;">username</th>
            <th style="text-align: center;">email</th>
            <th style="text-align: center;">level</th>
            <th style="text-align:center; width: 50px;">aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($admin as $a)
        <tr>
            <td style="text-align: center;">{{$loop->iteration}}</td>
            <td>{{$a->name }}</td>
            <td>{{$a->username}}</td>
            <td>{{$a->email}}</td>
            <td>{{$a->level}}</td>
            <td style="text-align:center;">
                
                
                    <a href="{{ route('admin.edit',$a->id)}}" title="edit user" class="btn btn-success btn-sm mt-3"><i class="fa fa-edit"></i></a>
                    
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