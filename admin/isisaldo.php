<h2>Data Isi Saldo</h2>

<table class = "table table-bordered">
	<thead>
		<tr>
			<th>no</th>
			<th>nama pelanggan</th>
			<th>tanggal isi saldo</th>
			<th>jumlah isi saldo</th>
			<th>total harga</th>
			<th>aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor = 1; ?>
		<?php  $ambil = $koneksi->query("SELECT * FROM isi_saldo")?>
		<?php while($pecah = $ambil ->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['id_pelanggan']; ?></td>
			<td><?php echo $pecah['tanggal_pengisian']; ?></td>
			<td><?php echo $pecah['jumlah_isisaldo'];?></td>
			<td><?php echo $pecah['total_harga'];?></td>
			<td>
				<a href = "index.php?halaman=updatesaldo&id=<?php echo $pecah["id_isisaldo"];?>" class="btn btn-primary">Konfirmasi</a>
				<a href = "index.php?halaman=updatesaldo&id=<?php echo $pecah['id_isisaldo'];?>" class="btn btn-danger">Hapus</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>

