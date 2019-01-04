<?php 
session_start();
 ?>

<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Isi Saldo</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>
<body>


	<!-- Header -->

	<<?php include 'header.php'; ?>

	<div class="home">
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<form method ="post">
			<center>
				<h3>Masukkan jumlah saldo yang ingin anda Top-up</h3>
				<br>
				<div class="col-md-6">
					<div class = "input-group">
						<input type="number" min="10000" class = "form-control" placeholder="Minimal Rp. 10.000" name = "saldo">
						<div class = "input-group-btn">
							<button class = "btn btn-primary" name = "topup">Top-Up</button>


							<?php

							if (isset($_POST['topup'])) {
								$id_pelanggan = $_SESSION["id"];
							    $saldo = $_POST['saldo'];
							    $tanggal_pengisian = date("Y-m-d");
							    $untung = $saldo * (0.5/100);
							    $harga = $saldo + $untung;
							  
							    	$sql->query("INSERT INTO isi_saldo
										(id_pelanggan,tanggal_pengisian,jumlah_isisaldo,total_harga)
										VALUES('$id_pelanggan','$tanggal_pengisian','$saldo','$harga') ");

							    echo "<script>alert('pengisian sukses ,silahkan tunggu verifikasi admin')</script>";
									echo"<script>location='index.php';</script>";
							}
							?>
						</div>
										
					</div>
				</div>
			</center>
			
		</form>
	</div>





	

	<!-- Footer -->
	
	<?php include 'footer.php'; ?>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>