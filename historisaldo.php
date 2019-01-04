<?php 
session_start();
 ?>

<?php include 'koneksi.php'; ?>


<!DOCTYPE html>
<html>
<head>
	<title>Histori Pembelian Saldo</title>
</head>
<body>
	
<a href="profil.php" class="btn btn-primary">Kembali</a>
<?php
	$id = $_SESSION["id"];
	$query = "SELECT * FROM histori_isisaldo WHERE id_pelanggan='$id'";
	$result = mysqli_query($sql,$query);
	while ($row = mysqli_fetch_assoc($result)) {
?>



<p>id isi saldo : <?php echo $row["id_isisaldo"];?></p>
<p>jumlah isi saldo : <?php echo $row["jumlah_isisaldo"];?></p>
<p>tanggal pengisian : <?php echo $row["tanggal_pengisian"];?></p>
<p>total harga : <?php echo $row["jumlah_harga"];?></p>
<br>

<?php } ?>

</body>
</html>