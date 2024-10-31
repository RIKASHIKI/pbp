<div style="max-width: 400px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); text-align: center;">
    <h4 style="margin-bottom: 20px;">Login</h4>
    <form action="{{ route('login_proses') }}" method="POST">
        @csrf
        <div style="margin-bottom: 15px;">
            <label for="username" style="display: block; text-align: left;">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;">
            @error('username')
                <span style="color: crimson; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>
        <div style="margin-bottom: 15px;">
            <label for="password" style="display: block; text-align: left;">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px;">
            @error('password')
                <span style="color: crimson; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>
        <div style="margin-bottom: 15px;">
            <button type="submit" class="btn btn-primary btn-sm" style="width: 100%; padding: 10px; border-radius: 5px; background-color: #007bff; color: white; border: none; font-size: 16px;">Login</button>
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
    <p style="margin-top: 10px; font-size: 14px;">Belum punya akun? <a href="{{ route('register') }}" style="color: #007bff;">Register</a></p>
</div>
