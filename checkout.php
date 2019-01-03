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

				<!-- Billing Info -->
				<div class="col-lg-6">
					<div class="billing checkout_section">
						<div class="section_title">Alamat Lengkap</div>
						<div class="section_subtitle">Masukan Alamat Lengkap Pengirimanmu</div>
						<div class="checkout_form_container">
							<form action="#" id="checkout_form" class="checkout_form">
								<div class="row">
									<div class="col-xl-6">
										<!-- Name -->
										<label for="checkout_name">Nama depan*</label>
										<input type="text" id="checkout_name" class="checkout_input" required="required">
									</div>
									<div class="col-xl-6 last_name_col">
										<!-- Last Name -->
										<label for="checkout_last_name">Nama Belakang*</label>
										<input type="text" id="checkout_last_name" class="checkout_input" required="required">
									</div>
								</div>
								<div>
									
								</div>
								<div>
									<!-- Country -->
									
								</div>
								<div>
									<!-- Address -->
									<label for="checkout_address">Alamat Lengkap*</label>
									<input type="text" id="checkout_address" class="checkout_input" required="required">
									<input type="text" id="checkout_address_2" class="checkout_input checkout_address_2" required="required">
								</div>
								<div>
									<!-- Zipcode -->
									<label for="checkout_zipcode">Kode Pos*</label>
									<input type="text" id="checkout_zipcode" class="checkout_input" required="required">
								</div>
								<div>
									<!-- City / Town -->
									<label for="checkout_city">Kota/Kabupaten*</label>
									<select name="checkout_city" id="checkout_city" class="dropdown_item_select checkout_input" require="required">
										<option></option>
										<option>City</option>
										<option>City</option>
										<option>City</option>
										<option>City</option>
									</select>
								</div>
								<div>
									<!-- Province -->
									<label for="checkout_province">Provinsi*</label>
									<select name="checkout_province" id="checkout_province" class="dropdown_item_select checkout_input" require="required">
										<option></option>
										<option>Province</option>
										<option>Province</option>
										<option>Province</option>
										<option>Province</option>
									</select>
								</div>
								<div>
									<!-- Phone no -->
									<label for="checkout_phone">No Handphone Penerima*</label>
									<input type="phone" id="checkout_phone" class="checkout_input" required="required">
									<div class="button order_button"><a href="#">Kirim</div>
								</div>
								<div>
									<!-- Email -->
									
								</div>
								<div class="checkout_extra">
									<div>
										<input type="checkbox" id="checkbox_terms" name="regular_checkbox" class="regular_checkbox" checked="checked">
										
										
									</div>
									
								</div>
							</form>
						</div>
					</div>
				</div>

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

						<!-- Payment Options -->
						<div class="payment">
							<div class="payment_options">
								<label class="payment_option clearfix">SmartCard
									<input type="radio" name="radio">
									<span class="checkmark"></span>
								</label>
								<label class="payment_option clearfix">Transfer Bank
									<input type="radio" name="radio">
									<span class="checkmark"></span>
								</label>
								
								
							</div>
						</div>

						<!-- Order Text -->
						<div class="order_text">Terimakasih Telah Mengisi Bensinmu dengan SIPBO.</div>
						<div class="button order_button"><a href="#">Beli Bensin</a></div>
						<button class = "btn btn-primary" name = "beli2">Beli</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->
	
	<div class="footer_overlay"></div>
	<footer class="footer">
		<div class="footer_background" style="background-image:url(images/footer.jpg)"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="footer_content d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
						<div class="footer_logo"><a href="#">Sublime.</a></div>
						<div class="copyright ml-auto mr-auto"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> kelompok2 | anjany | Febby | Richcy <a href="https://colorlib.com" target="_blank"></a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
						<div class="footer_social ml-lg-auto">
							<ul>
								<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>

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

		if(isset($_POST["checkout"]))
		{
			$id_pelanggan = $_SESSION ["pelanggan"]["id_pelanggan"];
			$tanggal_pembelian = date("Y-m-d");
			$alamat_pengiriman = $_POST['alamat_pengiriman'];

			$ambil = $koneksi->query("SELECT * FROM ongkir
				WHERE id_ongkir = '$id_ongkir'");
			$arrayongkir = $ambil->fetch_assoc();
			$nama_kota = $arrayongkir['nama_kota'];
			$tarif = $arrayongkir['tarif'];
			
			$total_pembelian = $totalbelanja+=$tarif;

			//menyimpan data ke tabel pembelian
			$koneksi->query("INSERT INTO pembelian(id_pelanggan, id_ongkir, tanggal_pembelian, total_pembelian,nama_kota,tarif, alamat_pengiriman)
				VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kota','$tarif','$alamat_pengiriman')");

			//mendapatkan id pembelian barusan

			$id_pembelian_barusan = $koneksi->insert_id;

			foreach($_SESSION["keranjang"] as $id_produk => $jumlah)
				{
					///mendapatkan data produk berdasarkan id_produk
					$ambil= $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
					$perproduk = $ambil->fetch_assoc();

					$nama = $perproduk['nama_produk'];
					$harga = $perproduk['harga_produk'];
					$berat = $perproduk['berat_produk'];

					$subberat = $perproduk['berat_produk']*$jumlah;
					$subharga = $perproduk['harga_produk']*$jumlah;

					$koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,nama,harga,berat,subberat,subharga,jumlah)
						VALUES ('$id_pembelian_barusan', '$id_produk','$nama','$harga','$berat','$subberat','$subharga', '$jumlah')");
				}

				// mengkosongkan keranjang belanja

				unset($_SESSION["keranjang"]);

				//tampilan dialihkan ke halaman nota, nota dari pembelian tersebut

				echo"<script>alert('pembelian sukses');</script>";
				echo"<script>location='nota.php?id=$id_pembelian_barusan';</script>";
		}

		?>