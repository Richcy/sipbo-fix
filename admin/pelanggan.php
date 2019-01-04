<h2>Data Pelanggan</h2>

<table class = "table table-bordered">
	<thead>
		<tr>
			<th>id</th>
			<th>nama</th>
			<th>email</th>
			<th>Password</th>
			<th>telepon</th>
			<th>Alamat</th>
			<th>Saldo</th>
			<th>Foto</th>
			<th>aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor = 1; ?>
		<?php  $ambil = $koneksi->query("SELECT * FROM pelanggan")?>
		<?php while($pecah = $ambil ->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $pecah['id_pelanggan']; ?></td>
			<td><?php echo $pecah['nama_pelanggan']; ?></td>
			<td><?php echo $pecah['email_pelanggan']; ?></td>
			<td><?php echo $pecah['password_pelanggan']; ?></td>
			<td><?php echo $pecah['telepon_pelanggan'];?></td>
			<td><?php echo $pecah['alamat_pelanggan']; ?></td>
			<td><?php echo $pecah['saldo']; ?></td>
			<td>
				<img src="../images/<?php echo $pecah['foto_pelanggan']; ?>" width = "100"></td>
			</td>
			<td>
				<a href="" class = "btn btn-danger">hapus</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>