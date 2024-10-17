<form action="{{ route('login_proses') }}" method="POST">
    @csrf
    <div class="form-group">
        <label class="form-control-label">Username : </label>
        <input type="text" class="form-control" name="username" placeholder="Enter your username">

        <div>
            @error('username')
            <span style="color:crimson">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="form-control-label">Password : </label>
        <input type="password" class="form-control" name="password" placeholder="Enter your password">
    
        <div>
            @error('password')
            <span style="color:crimson">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-black">Login</button>
</form>