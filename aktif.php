<?php 
session_start();
 ?>

<?php include 'koneksi.php'; ?>


<!DOCTYPE html>
<html>
<head>
	<title>Pembelian Terkini</title>
</head>
<body>
	
<a href="profil.php" class="btn btn-primary">Kembali</a>
<?php
	$id = $_SESSION["id"];
	$query = "SELECT * FROM pembelian WHERE id_pelanggan='$id'";
	$result = mysqli_query($sql,$query);
	while ($row = mysqli_fetch_assoc($result)) {
?>



<p>id pembelian : <?php echo $row["id_pembelian"];?></p>
<p>nama pembeli : <?php echo $row["id_pelanggan"];?></p>
<p>nama produk : <?php echo $row["id_produk"];?></p>
<p>tanggal pembelian: <?php echo $row["tanggal_pembelian"];?></p>
<p>total pembelian : <?php echo $row["total_pembelian"];?></p>
<p>kode transaksi : <?php echo $row["kode_transaksi"];?></p>
<p>total liter : <?php echo $row["total_liter"];?></p>
<br>

<?php } ?>

</body>
</html>