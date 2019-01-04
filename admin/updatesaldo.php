<?php

$ambil=$koneksi->query("SELECT * FROM isi_saldo JOIN pelanggan on pelanggan.id_pelanggan = isi_saldo.id_pelanggan WHERE id_isisaldo='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$id_pelanggan = $pecah["id_pelanggan"];
$tanggal_pengisian = $pecah["tanggal_pengisian"];
$saldouser = $pecah["saldo"];
$isisaldo = $pecah["jumlah_isisaldo"];
$jumlah_harga = $pecah["total_harga"];

$saldo = $saldouser + $isisaldo;

		$koneksi->query("UPDATE pelanggan SET saldo = '$saldo' WHERE id_pelanggan='$id_pelanggan'");

		$koneksi->query("DELETE FROM isi_saldo WHERE id_isisaldo = '$_GET[id]'");

		$koneksi->query("INSERT INTO histori_isisaldo 
		(id_isisaldo,id_pelanggan,tanggal_pengisian,jumlah_isisaldo,jumlah_harga)
		VALUES('$_GET[id]','$id_pelanggan','$tanggal_pengisian','$isisaldo','$jumlah_harga')");




	/*else
	{
		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',
			harga_produk='$_POST[harga]',berat_produk='$_POST[berat]',
			deskripsi_produk='$_POST[deskripsi]'
			WHERE id_produk='$_GET[id]'");
	}*/
	echo "<script>alert('saldo telah di update');</script>";
	echo "<script>location='index.php?halaman=isisaldo';</script>";


  ?>