@extends('layout.menu')
@section('konten')
    <div class="container">
        <h2>Edit User</h2>
        <form method="POST" action="{{ route('admin.update', $admin->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $admin->name) }}" readonly required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $admin->email) }}" readonly required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="level">Level</label>
                <select name="level" class="form-control" required>
                    <option value="admin" {{ $admin->level == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ $admin->level == 'user' ? 'selected' : '' }}>User</option>
                </select>
                @error('level')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update User</button>
            <a href="{{ route('admin.index')}}" class="btn btn-secondary">Back</a>
        </form>
        @if(session('status'))
    <script>
        Swal.fire({
            position: "center",
            icon: "{{session('status')['icon']}}",
            text: "{{session('status')['pesan']}}",
            showConfirmButton: false,
            timer: 2000
        });
    </script>
    @endif
    </div>
@endsection
