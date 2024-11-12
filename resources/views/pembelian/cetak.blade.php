<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<style>
    @media print {
        @page {
            size: A4 landscape;
            margin-top: 20mm;
            margin-bottom: 20mm;
            margin-left: 20mm;
            margin-right: 20mm;
        }

        body {
            margin: 0;
            -webkit-print-color-adjust: exact;
        }
    }
</style>


<body onload="window.print(); window.onafterprint = closeWindow;">
    <h1 style="center;">Data pembelian</h1>
    <h2 style="center;">toko jaya abadi</h2>
    <table class="table">
        <thead>
            <tr>
                <th>no</th>
                <th>id pembelian</th>
                <th>id barang</th>
                <th>id suplier</th>
                <th>qty</th>
                <th>tanggal pembelian</th>
                <th>suplier</th>
                <th>barang</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembelian as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->id_pembelian }}</td>
                    <td>{{ $p->id_barang }}</td>
                    <td>{{ $p->id_suplier }}</td>
                    <td>{{ $p->qty }}</td>
                    <td>{{ $p->tgl }}</td>
                    <td>{{ $p->nama_suplier }}</td>
                    <td>{{ $p->nama_barang }}</td>
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
