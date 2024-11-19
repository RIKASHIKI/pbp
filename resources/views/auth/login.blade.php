<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <style>
        /* Gaya umum untuk latar belakang halaman */
        body {
            margin: 0;
            padding: 0;
            background-image: url('https://wallpapercave.com/wp/Poy38cA.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh; /* Tinggi halaman penuh */
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }

        /* Gaya form login */
        .form-container {
            background: rgba(255, 255, 255, 0.5); /* Transparansi 50% */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        /* Gaya elemen dalam form */
        h4 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        p {
            margin-top: 10px;
            font-size: 14px;
        }

        p a {
            color: #007bff;
            text-decoration: none;
        }

        p a:hover {
            text-decoration: underline;
        }

        /* Gaya error */
        .error {
            color: crimson;
            font-size: 12px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h4>LOGIN</h4>
        <form action="{{ route('login_proses') }}" method="POST">
            @csrf
            <div>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username">
                @error('username')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password">
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit">Login</button>
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
        <p>Belum punya akun? <a href="{{ route('register') }}">Buat sebuah akun</a></p>
    </div>
</body>
</html>
