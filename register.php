<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html>
<html lang="en">
<head>
  <title>Profil</title>
  <meta charset="utf-8">
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
        <div class="row text-center  ">
            <div class="col-md-12">
                <br /><br />
                <h2> SIPBO: Register</h2>
               
                <h5>( Registrasikan anda untuk mendapatkan fitur - fitur sipbo )</h5>
                 <br />
            </div>
        </div>
         <div class="row">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>  New User ? Register Yourself </strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post">
									<br/>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
                                            <input type="text" class="form-control" placeholder="Your Name" name="nama" required />
                                        </div>
                                         <!--<div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" placeholder="Desired Username" />
                                        </div>-->
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="text" class="form-control" placeholder="Your Email" name="email" required />
                                        </div>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" placeholder="Enter Password" name="password" required />
                                        </div>
                                     	<div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" placeholder="Retype Password" name="password2" required />
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">address</span>
                                            <textarea name = "alamat" class= "form-control" placeholder="Your Address" rows="1"></textarea>
				
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">phones</span>
                                            <input type="text" class="form-control" placeholder="Your Phone Number" name="telepon" required />
                                        </div>
                                    
                                         
                                     
                                     <span class="pull-right">
                                     	 <button class = "btn btn-success" name = "register">Register Me!</button>
                                     </span>
                                    	 <a href="index.php" class="btn btn-primary ">Kembali ke Home</a>
                                    <hr />
                                    Already Registered ?  <a href="login.php" >Login here</a>
                                </form>
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

<?php 

						//jika ada tombol daftar (ditekan tombol daftar)

						if(isset($_POST["register"]))
						{
							$password = $_POST["password"];
							$password2 = $_POST["password2"];

							if ($password != $password2)
							 {
								echo "<script>alert('password tidak sinkron')</script>";
							}
							else
							{
								//mengambil isian nama, password dll

								$nama = $_POST["nama"];
								$email = $_POST["email"];
								
								$alamat = $_POST["alamat"];
								$telepon = $_POST["telepon"];

								//cek apakan email sudah digunakan

								$ambil = $sql->query("SELECT * FROM pelanggan
									WHERE email_pelanggan ='$email'");
								$yangcocok = $ambil->num_rows;
								if($yangcocok==1)
								{
									echo "<script>alert('pendaftaran gagal ,email sudah digunakan')</script>";
									echo"<script>location='register.php';</script>";
								}
								else
								{
									//query insert ke tabel pelanggan

									$sql->query("INSERT INTO pelanggan
										(email_pelanggan,password_pelanggan,nama_pelanggan,
										telepon_pelanggan,alamat_pelanggan)
										VALUES('$email','$password','$nama','$telepon','$alamat') ");

										echo "<script>alert('pendaftaran sukses ,silahkan login')</script>";
									echo"<script>location='login.php';</script>";
								}
							}

							

							
						}

						 ?>