<?php 
session_start();

//skrip koneksi

include 'koneksi.php';

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Halaman Login</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="styles/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
  <link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>
<body>
  <div class="container">
    <div class="row text-center ">
      <div class="col-md-12">
        <br /><br />
        <h2> SIPBO : Login</h2>

        <h5>( Loginkan diri anda agar mendapatkan fitur - fitur sipbo! )</h5>
        <br />
      </div>
    </div>
    <div class="row ">

      <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">
            <strong>   Enter Details To Login </strong>  
          </div>
          <div class="panel-body">
            <form role="form" method="post">
             <br />
             <div class="form-group input-group">
              <span class="input-group-addon">@</span>
              <input type="text" class="form-control" name="email" placeholder="Your Email" />
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
              <input type="password" class="form-control" name="pass" placeholder="Your Password" />
            </div>
            <span class="pull-right">
              <button class = "btn btn-primary" name = "login">Login</button>
            </span>
            <a href="index.php" type="button" class="btn btn-primary">Kembali</a>
           <hr />
             Not register ? <a href="register.php" >click here </a> 
           
         </form>

         <?php
		// Always start this first

		if (isset($_POST['login'])) {
			$email = $_POST['email'];
			$password = $_POST['pass'];
		    // Getting submitted user data from database
		    
		    $query = "SELECT * FROM pelanggan WHERE email_pelanggan='$email' and password_pelanggan='$password'";
		    $result = mysqli_query($sql,$query);
		    $check = mysqli_num_rows($result);
			if($check > 0) {

				$row = mysqli_fetch_assoc($result);
				$_SESSION['id'] = $row['id_pelanggan'];
				$_SESSION['status'] = "login";
				echo "<div class='alert alert-info'>Login Sukses</div>";
              	echo "<meta http-equiv = 'refresh' content='1;url=index.php'>";
		    }
		     else{
				// anda gagal login
				echo "<div class='alert alert-danger'>Login Gagal</div>";
              	echo "<meta http-equiv = 'refresh' content='1;url=login.php'>";
			}
		}
		?>

         
       </div>

     </div>
   </div>


 </div>
</div>


<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>

</body>
</html>
