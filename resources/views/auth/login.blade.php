<div style="text-align: center;">
    <h4>Login</h4>
    <form action="{{ route('login_proses') }}" method="POST">
        @csrf
        <div>
            <label>Username</label><br>
            <input type="text" name="username" placeholder="Enter your username">
           
        </div>
        <div>
            <label>Password</label><br>
            <input type="password" name="password" placeholder="Enter your password">
        </div>
        @error('username')
            <span style="color:crimson">{{ $message }}</span>
        @enderror
        <br>
        @error('password')
            <span style="color:crimson">{{ $message }}</span>
        @enderror
        <br>
        <div>
            <button type="submit" class="btn btn-primary btn-sm mb-1">Login</button>
        </div>
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
    <p>belum punya akun? <a href="{{ route('register') }}">register</a></p>
</div>