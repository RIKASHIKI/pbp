<h1 style="text-align: center;">Data Pembelian</h1>
<h2 style="text-align: center;">Toko Jaya Abadi</h2>
<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Pembelian</th>
            <th>ID Barang</th>
            <th>ID Suplier</th>
            <th>Qty</th>
            <th>Tanggal Pembelian</th>
            <th>Suplier</th>
            <th>Barang</th>
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
            <td>{{ dateid1($p->tgl) }}</td>
            <td>{{ $p->nama_suplier }}</td>
            <td>{{ $p->nama_barang }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
