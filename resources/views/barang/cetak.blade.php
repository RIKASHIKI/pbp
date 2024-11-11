<head>
    <link rel="stylesheet" 
href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body onload="window.print(); window.onafterprint = closeWindow;">
    <h1 style="center;">Data Barang</h1>
    <h2 style="center;">toko jaya abadi</h2>
    <table class="table">
        <thead>
            <tr>
                <th style="text-align: center;">no</th>
                <th style="text-align: center;">id barang</th>
                <th style="text-align: center;">nama</th>
                <th style="text-align: center;">varian</th>
                <th style="text-align: center;">harga beli</th>
                <th style="text-align: center;">harga jual</th>
                <th style="text-align: center;">foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barang as $b)
            <tr>
                <td>{{ $loop->iteration }}</td>
                    <td>{{ $b->id_barang }}</td>
                    <td>{{ $b->nama }}</td>
                    <td>{{ $b->varian }}</td>
                    <td>{{ $b->harga_beli }}</td>
                    <td>{{ $b->harga_jual }}</td>
                    <td>
                        @if($b->foto)
                        <a href="{{ asset('storage/foto_barang/' . $b->foto) }}" target=_blank>
                            <img src="{{ asset('storage/foto_barang/' . $b->foto) }}" style="width: 100px; height: auto;" />
                        </a>
                        @else
                        No Foto
                        @endif
                    </td>
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
