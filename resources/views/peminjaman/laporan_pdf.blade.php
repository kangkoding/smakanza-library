<!DOCTYPE html>
<html>
<head>
	<title>Laporan Transaksi Buku</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h3>Laporan Transaksi Buku</h3>
	</center>

	<table class='table table-bordered mt-3'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Judul Buku</th>
				<th>Kode Buku</th>
				<th>Tanggal Pinjam</th>
				<th>Tanggal Wajib Pengembalian</th>
                <th>Tanggal Pengembalian</th>
                <th>Total Denda</th>
			</tr>
		</thead>
		<tbody>
        @forelse ($riwayat_peminjaman as $item )
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->buku->judul }}</td>
                            <td>{{ $item->buku->kode_buku }}</td>
                            <td>{{ $item->tanggal_pinjam }}</td>
                            <td>{{ $item->tanggal_wajib_kembali }}</td>
                            <td>{{ $item->tanggal_pengembalian }}</td>
							@if($item->total_denda > 0)
                            <td><span class="btn btn-danger mb-2 mx-1">Rp {{ $item->total_denda }}</span></td>
                            @else
                            <td>Rp {{ $item->total_denda }}</td>
                            @endif
                        </tr>
                        @empty

                        @endforelse
		</tbody>
	</table>

</body>
</html>
