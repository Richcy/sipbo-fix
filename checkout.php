<?php 
session_start();
include 'koneksi.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Checkout</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/checkout.css">
<link rel="stylesheet" type="text/css" href="styles/checkout_responsive.css">
</head>
<body>

<div class="super_container">

	<!-- Header -->

		

	<?php include 'header.php'; ?>


	<!-- Checkout -->


	<?php if (isset($_SESSION["uang"])): ?>
	<?php foreach ($_SESSION["uang"] as $id_produk => $jumlah): ?>
	

	<?php 
		$ambil = $sql->query("SELECT * FROM produk 
					WHERE id_produk='$id_produk'");
		$pecah = $ambil->fetch_assoc();
		$subharga = $jumlah / $pecah["harga_produk"];
	?>
	<?php endforeach ?>


	<?php elseif (isset($_SESSION["liter"])): ?>
	<?php foreach ($_SESSION["liter"] as $id_produk => $jumlah): ?>
	

	<?php 
		$ambil = $sql->query("SELECT * FROM produk 
					WHERE id_produk='$id_produk'");
		$pecah = $ambil->fetch_assoc();
		$subharga = $pecah["harga_produk"]*$jumlah;
	?>
	<?php endforeach ?>
	<?php endif ?>
	
	
	<div class="checkout">
		<div class="container">
			<div class="row">



				

				<!-- Order Info -->

				<div class="col-lg-6">
					<div class="order checkout_section">
						<div class="section_title">Pesanan Anda</div>
						<div class="section_subtitle">Detail Pesanan</div>

						<!-- Order details -->
						<div class="order_list_container">
							<div class="order_list_bar d-flex flex-row align-items-center justify-content-start">
								<div class="order_list_title">Bahan Bakar</div>
								<div class="order_list_value ml-auto"><?php echo $pecah["nama_produk"];?></div>
							</div>
							<div class="order_list_bar d-flex flex-row align-items-center justify-content-start">
								<div class="order_list_title">Harga Per Liter</div>
								<div class="order_list_value ml-auto"><?php echo number_format($pecah["harga_produk"]);?>/liter</div>
							</div>
							<div class="order_list_bar d-flex flex-row align-items-center justify-content-start">
								<div class="order_list_title">Pembelian Sesuai : </div>
								<div class="order_list_value ml-auto"><?php echo $_SESSION["jenis"];  ?></div>
							</div>
							<ul class="order_list">
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title">Bensin yang dibeli</div>
									<div class="order_list_value ml-auto">
										<?php if (isset($_SESSION["uang"])): ?>
											Rp. <?php echo number_format($jumlah); ?>
										<?php elseif (isset($_SESSION["liter"])): ?>
											<?php echo $jumlah; ?> Liter
										<?php endif ?>
									</div>
								</li>
								
								
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title">Total</div>
									<div class="order_list_value ml-auto">
										<?php if (isset($_SESSION["uang"])): ?>
											<?php echo number_format($subharga,2); ?> Liter
										<?php elseif (isset($_SESSION["liter"])): ?>
											Rp. <?php echo number_format($subharga,2); ?> 
										<?php endif ?>
										</div>
								</li>
							</ul>
						</div>
						

						<!-- Order Text -->
						<div class="order_text">Terimakasih Telah Mengisi Bensinmu dengan SIPBO.</div>
						<div class="button order_button"><a href="#">Beli Bensin</a></div>
						<?php if (isset($_SESSION["status"])== 'login'): ?>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Beli</button>
						<?php elseif (isset($_SESSION["status"])!='login'): ?>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Pesan</button>
						<?php endif ?>

						

						
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<?php if (isset($_SESSION["status"])== 'login'): ?>
					<h3>Konfirmasi Pembelian</h3>
					<?php elseif (isset($_SESSION["status"])!= 'login'): ?>
					<h3>Konfirmasi Pemesanan</h3>
					<?php endif ?>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					
				</div>
				<!-- body modal -->
				<div class="modal-body">
					<?php if (isset($_SESSION["status"])== 'login'): ?>
					<p>Yakin dengan pembelian ini?</p>
					<p>Saldo akan berkurang sesuai harga yang tertera</p>
					<?php elseif (isset($_SESSION["status"])!= 'login'): ?>
					<p>Yakin dengan pemesanan ini?</p>
					<?php endif ?>
				</div>
				<!-- footer modal -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<form method="post">
						<?php if (isset($_SESSION["status"])== 'login'): ?>
						<button class = "btn btn-primary" name = "beli">Beli</button>
						<?php elseif (isset($_SESSION["status"])!='login'): ?>
						<button class = "btn btn-primary" name = "pesan">Pesan</button>
						<?php endif ?>
					</form>
					
				</div>
			</div>
		</div>
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
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/checkout.js"></script>
</body>
</html>

	<?php
	include 'randomkode.php';

		if(isset($_POST["beli"]))
		{
			$id_produk = $pecah["id_produk"];
			$id = $_SESSION["id"];
			$ambil2 = $sql->query("SELECT * FROM pelanggan 
						WHERE id_pelanggan='$id'");
			$pecah = $ambil2->fetch_assoc();
			$saldo = $pecah["saldo"];
			
			$id_pelanggan = $_SESSION["id"];
			
			$tanggal_pembelian = date("Y-m-d");
			$kode = $hasil_1;
			if (isset($_SESSION["uang"]))
				{
					$totalharga = $jumlah;
					$totalliter = $subharga;
				}
			else if(isset($_SESSION["liter"]))
				{
					$totalharga = $subharga;
					$totalliter = $jumlah;
				}

			$saldo_skrg = $saldo - $totalharga;

			if($saldo_skrg > $totalharga)
			{
				//menyimpan data ke tabel pembelian
			$sql->query("INSERT INTO pembelian(id_pelanggan, id_produk, tanggal_pembelian, kode_transaksi,total_pembelian, total_liter)
				VALUES ('$id_pelanggan','$id_produk','$tanggal_pembelian','$kode','$totalharga','$totalliter')");

			$sql->query("UPDATE pelanggan SET saldo = '$saldo_skrg' WHERE id_pelanggan = '$id'");

				


				//tampilan dialihkan ke halaman nota, nota dari pembelian tersebut

				echo"<script>alert('pembelian sukses');</script>";
				echo"<script>alert('kode trasaksi anda : $kode');</script>";
				echo"<script>location='index.php';</script>";
			}
			else
			{
				echo"<script>alert('pembelian gagal, saldo anda tidak mencukupi');</script>";
				echo"<script>location='isisaldo.php';</script>";
			}
		}

			// mengkosongkan keranjang belanja

				/*unset($_SESSION["keranjang"]);
				unset($_SESSION["jenis"]);
				if (isset($_SESSION["uang"]))
				{
					unset($_SESSION["uang"]);
				}
				else if(isset($_SESSION["liter"]))
				{
					unset($_SESSION["liter"]);
				}*/

			else if(isset($_POST["pesan"]))
		{
			$id_produk = $pecah["id_produk"];
			
			$tanggal_pemesanan = date("Y-m-d");
			$kode = $hasil_1;
			if (isset($_SESSION["uang"]))
				{
					$totalharga = $jumlah;
					$totalliter = $subharga;
				}
			else if(isset($_SESSION["liter"]))
				{
					$totalharga = $subharga;
					$totalliter = $jumlah;
				}

		
			$sql->query("INSERT INTO pemesanan(id_produk, tanggal_pemesanan, kode_transaksi,total_pembelian, total_liter)
				VALUES ('$id_produk','$tanggal_pemesanan','$kode','$totalharga','$totalliter')");


				


				//tampilan dialihkan ke halaman nota, nota dari pembelian tersebut

				echo"<script>alert('pemesanan sukses');</script>";
				echo"<script>alert('kode trasaksi anda : $kode');</script>";
				echo"<script>location='index.php';</script>";
			

			// mengkosongkan keranjang belanja

				unset($_SESSION["keranjang"]);
				unset($_SESSION["jenis"]);
				if (isset($_SESSION["uang"]))
				{
					unset($_SESSION["uang"]);
				}
				else if(isset($_SESSION["liter"]))
				{
					unset($_SESSION["liter"]);
				}

			
		}
	

		?>