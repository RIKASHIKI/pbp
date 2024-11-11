<h1 style="center;">Data pesanan</h1>
    <h2 style="center;">toko jaya abadi</h2>
    <table class="table">
        <thead>
            <tr>
                <th>no</th>
                <th>id pesanan</th>
                <th>id pembeli</th>
                <th>id barang</th>
                <th>qty</th>
                <th>tanggal pemesanan</th>
                <th>pembeli</th>
                <th>barang</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesanan as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->id_pesanan }}</td>
                    <td>{{ $p->id_pembeli }}</td>
                    <td>{{ $p->id_barang }}</td>
                    <td>{{ $p->qty }}</td>
                    <td>{{ $p->tgl_pesan }}</td>
                    <td>{{ $p->nama_pembeli }}</td>
                    <td>{{ $p->nama_barang }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>