<head>
    <link rel="stylesheet" 
href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body onload="window.print(); window.onafterprint = closeWindow;">
    <h1 style="center;">Data pembeli</h1>
    <h2 style="center;">toko jaya abadi</h2>
    <table class="table">
        <thead>
            <tr>
                <th style="text-align: center; width:30px;">No</th>
                    <th style="text-align: center;">ID Pembeli</th>
                    <th style="text-align: center;">Nama</th>
                    <th style="text-align: center;">Jenis Kelamin</th>
                    <th style="text-align: center;">Alamat</th>
                    <th style="text-align: center;">Kode Pos</th>
                    <th style="text-align: center;">Kota</th>
                    <th style="text-align: center;">Tanggal Lahir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembeli as $p)
            <tr>
                <td style="text-align: center;">{{ $loop->iteration }}</td>
                        <td style="text-align: center;">{{ $p->id_pembeli }}</td>
                        <td>{{ $p->nama }}</td>
                        <td style="text-align: center;">{{ $p->jns_kelamin }}</td>
                        <td>{{ $p->alamat }}</td>
                        <td style="text-align: center;">{{ $p->kode_pos }}</td>
                        <td>{{ $p->kota }}</td>
                        <td style="text-align: center;">{{ dateid1($p->tgl_lahir) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function closeWindow() {
            window.close();
        }
    </script>
</body>
