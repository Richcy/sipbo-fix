<?php  session_start();?>
<?php  include 'koneksi.php'; ?>
<?php

//mendapatkan id produk dari url
$id_produk=$_GET["id"];

// query mengambil data
$ambil = $sql->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detail=$ambil->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Product</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/product.css">
<link rel="stylesheet" type="text/css" href="styles/product_responsive.css">
</head>
<body>

<div class="super_container">

	<!-- Header -->

	<?php include 'header.php'?>


	<!-- Product Details -->
	<br>
	<br>

	<div class="product_details">
		<div class="container">
			<div class="row details_row">

				<!-- Product Image -->
				<div class="col-lg-6">
					<div class="details_image">
						<div class="details_image_large"><img src="images/<?php echo $detail["foto_produk"];?>" alt="">
						</div>
					</div>
				</div>

				<!-- Product Content -->
				<div class="col-lg-6">
					<div class="details_content">
						<div class="details_name"><?php echo $detail["nama_produk"]; ?></div>
						<div class="details_price">Rp. <?php echo number_format($detail["harga_produk"]); ?>/liter</div>

						<!-- In Stock -->
						<div class="details_text">
							<p>Pilih pembayaran : jumlah uang atau jumlah liter sesuai keinginan anda</p>
						</div>

						<!-- Product Quantity -->
						<form method ="post">
							<div class = "form-group">
								Uang
								<div class = "input-group">
									<input type="number" min ="1" class = "form-control" placeholder="Masukkan jumlah uang anda" name = "uang">
									<div class = "input-group-btn">
										<button class = "btn btn-primary" name = "beli1">Beli</button>
									</div>
									
								</div>
							</div>
						</form>

						<form method ="post">
							<div class = "form-group">
								Liter
								<div class = "input-group">
									<input type="decimal" min ="1" class = "form-control" placeholder="Masukkan jumlah liter" name = "liter">
									<div class = "input-group-btn">
										<button class = "btn btn-primary" name = "beli2">Beli</button>
									</div>
									
								</div>
							</div>
						</form>

						<?php

				//jk ada tombol beli

				if(isset($_POST["beli1"]))
				{
					$jenis = 'Uang';
					//mendapatkan jumlah yang diinputkan

					$uang = $_POST["uang"];
					//masukkan di keranjang belanaj

					$_SESSION["uang"][$id_produk] = $uang;
					$_SESSION["jenis"] = $jenis;

					
					echo "<script>location='checkout.php';</script>";
					unset($_SESSION['liter']);
				}
				else if(isset($_POST["beli2"]))
				{
					$jenis = 'Liter';
					//mendapatkan jumlah yang diinputkan

					$liter = $_POST["liter"];
					//masukkan di keranjang belanaj

					$_SESSION["liter"][$id_produk] = $liter;
					$_SESSION["jenis"] = $jenis;

					
					echo "<script>location='checkout.php';</script>";
					unset($_SESSION['uang']);
				}


				  ?>

		

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
<script src="js/product.js"></script>
</body>
</html>

<script>
$(document).ready(function()
{
    $("#form-input1").css("display","none"); //Menghilangkan form-input ketika pertama kali dijalankan
    $("#form-input2").css("display","none"); //Menghilangkan form-input ketika pertama kali dijalankan
    $(".detail").click(function()
    { //Memberikan even ketika class detail di klik (class detail ialah class radio button)
        if ($("input[name='radio']:checked").val() == "Radio 1" )
        { //Jika radio button "berbeda" dipilih maka tampilkan form-inputan
            $("#form-input1").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
            $("#form-input2").slideUp("fast"); //Efek Slide Up (Menghilangkan Form Input)

        } 
        else if($("input[name='radio']:checked").val() == "Radio 2" )
        {
            $("#form-input1").slideUp("fast"); 
            $("#form-input2").slideDown("fast"); 
        }
    });
});
</script>