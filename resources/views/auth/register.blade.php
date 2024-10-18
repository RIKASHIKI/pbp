<div style="text-align: center;">
    <h4>REGISTRASI</h4>
    <form method="POST" action="{{ route('register_proses') }}">
        @csrf
        <div>
            <label for="username">Username</label><br>
            <input type="text" name="username" required>
            @error('username')
                <div>{{ $message }}</div>
            @enderror
            <br>
            <label for="name">Nama</label><br>
            <input type="text" name="name" required>
            @error('name')
                <div>{{ $message }}</div>
            @enderror
            <br>
            <label for="email">Email</label><br>
            <input type="email" name="email" required>
            @error('email')
                <div>{{ $message }}</div>
            @enderror
            <br>
            <label for="password">Password</label><br>
            <input type="password" name="password" required>
            @error('password')
                <div>{{ $message }}</div>
            @enderror
            <br>
            <label for="password_confirmation">Konfirmasi Password</label><br>
            <input type="password" name="password_confirmation" required>
        </div><br>
        <button type="submit" class="btn btn-primary btn-sm mb-1">Daftar</button>

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
    <p>Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
</div>