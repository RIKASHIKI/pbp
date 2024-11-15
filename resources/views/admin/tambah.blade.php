@extends('layout.menu')
@section('konten')
<div class="container" style="text-align: center;">
    <h4>Tambah Akun</h4>
    <form method="POST" action="{{ route('adminregister_proses') }}">
        @csrf
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" required>
            @error('username')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" required>
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="level">Level</label>
            <select name="level" class="form-control" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            @error('level')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <br>
            <button type="submit" class="btn btn-primary btn-sm">Tambahkan</button>
        </div>
    </form>

    @if(session('status'))
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
</div>
@endsection