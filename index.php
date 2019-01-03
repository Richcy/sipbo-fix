<?php 
session_start();
 ?>

<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Sipbo</title>
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

<div class="super_container">

	<!-- Header -->

	<?php include 'header.php'?>

	<!-- Menu -->

	<div class="menu menu_mm trans_300">
		<div class="menu_container menu_mm">
			<div class="page_menu_content">
							
				<div class="page_menu_search menu_mm">
					<form action="#">
						<input type="search" required="required" class="page_menu_search_input menu_mm" placeholder="Search for products...">
					</form>
				</div>
			
			</div>
		</div>

		<div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>

		<div class="menu_social">
			<ul>
				<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
			</ul>
		</div>
	</div>
	
	<!-- Home -->

	<div class="home">
		<div class="home_slider_container">
			
			<!-- Home Slider -->
			<div class="owl-carousel owl-theme home_slider">
				
				<!-- Slider Item -->
				<div class="owl-item home_slider_item">
					<div class="home_slider_background" style="background-color: red"></div>
					<div class="home_slider_content_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
										<div class="home_slider_title">Pembelian Bahan Bakar Secara Online</div>
										<div class="home_slider_subtitle">Sipbo adalah sebuah sistem penjualan bahan bakar online yang dapat memudahkan para pengendara saat melakukan pengisinan bahan bakar kendaraan</div>
										<div class="button button_light home_button"><a href="#">Shop Now</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Slider Item -->
				<div class="owl-item home_slider_item">
					<div class="home_slider_background" style="background-color:#FFD700"></div>
					<div class="home_slider_content_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
										<div class="home_slider_title">Pembayaran yang mudah.</div>
										<div class="home_slider_subtitle">pembayaran yang dilakukan dapat secara online atau dengan pemotongan saldo didalam fitur smart card.</div>
										<div class="button button_light home_button"><a href="#">Shop Now</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Slider Item -->
				<div class="owl-item home_slider_item">
					<div class="home_slider_background" style="background-color: #808080"></div>
					<div class="home_slider_content_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
										<div class="home_slider_title">Login atau Registrasikan akunmu kedalam sipbo</div>
										<div class="home_slider_subtitle">dengan melakakan login , calon pembeli bisa mendapatkan tawaran harga yang lebih hemat.</div>
										<div class="button button_light home_button"><a href="login.php">Login</a> </div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

			<!-- Home Slider Dots -->
			
			<div class="home_slider_dots_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_slider_dots">
								<ul id="home_slider_custom_dots" class="home_slider_custom_dots">
									<li class="home_slider_custom_dot active">1.</li>
									<li class="home_slider_custom_dot">2.</li>
									<li class="home_slider_custom_dot">3.</li>
								</ul>
							</div>
						</div>
					</div>
				</div>	
			</div>

		</div>
	</div>

	<!-- Ads -->

	<div class="avds">
		<div class="avds_container d-flex flex-lg-row flex-column align-items-start justify-content-between">
			<div class="avds_small">
				<div class="avds_background" style="background-image:url(images/pertamax3.jpg)"></div>
				<div class="avds_small_inner">
					<div class="avds_discount_container">
						
						<
					</div>
					<div class="avds_small_content">
						<div class="avds_title">Pertamax</div>
						<div class="avds_title">RP,7500</div>
						<div class="avds_link"><a href="categories.html">See More</a></div>
					</div>
				</div>
			</div>
			<div class="avds_large">
				<div class="avds_background" style="background-image:url(images/avds_large.png)"></div>
				<div class="avds_large_container">
					<div class="avds_large_content">
						<div class="avds_title">ABOUT SIPBO</div>
						<div class="avds_text">Sipbo adalah sebuah sistem penjualan bahan bakar online yang dapat memudahkan para pengendara saat melakukan pengisinan bahan bakar kendaraan</div>
						<div class="avds_link avds_link_large"><a href="categories.html">See More</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Products -->

	<div class="products">
		<center>
			<h2><strong>PRODUK SIPBO</strong></h2>
			<br>
		</center>
		
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="product_grid">

						<?php $ambil = $sql->query("SELECT * FROM produk"); ?>
						<?php while($perproduk = $ambil->fetch_assoc()){ ?>

						<!-- Product -->
						<div class="product">
							<div class="product_image"><img src="images/<?php echo $perproduk['foto_produk']; ?>" alt=""></div>
							<div class="product_extra product_new"><a href="categories.html"></a></div>
							<div class="product_content">
								<div class="product_title"><a href="product.php?id=<?php echo $perproduk['id_produk']; ?>"><?php echo $perproduk['nama_produk']; ?></a></div>
								<div class="product_price">Rp. <?php echo number_format($perproduk['harga_produk']); ?>/liter</div>
							</div>
						</div>
						<?php } ?>


						<!-- Product -->
						
					</div>
						
				</div>
			</div>
		</div>
	</div>

	<!-- Ad -->

	<div class="avds_xl">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="avds_xl_container clearfix">
						<div class="avds_xl_background" style="background-image:url(images/avds_xl.png)"></div>
						<div class="avds_xl_content">
							<div class="avds_title">Permudah Perjalananmu</div>
							<div class="avds_text">Permudah Isi Bensinmu</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Icon Boxes -->

	

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