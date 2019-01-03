<?php 
  include 'koneksi.php';
  session_start();
  if($_SESSION['status']!="login"){
    header('Location: login.php');
  }


$id = $_SESSION["id"];
$query1 = "SELECT * FROM pelanggan WHERE id_pelanggan = '$id'";
$result1 = mysqli_query($sql,$query1);
$row = mysqli_fetch_assoc($result1);
?>


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
  <!--header-->
  
  <!--header-->

  <div class="super-container">
    <div class="container">
      <div class="row">
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
       <br>
      </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Profil Anda</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="images/<?php echo $row['foto_pelanggan']; ?>" class="img-circle img-responsive"> </div>
                
                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>DEPARTMENT:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>ID</td>
                        <td><?php echo $row["id_pelanggan"];?></td>
                      </tr>
                      <tr>
                        <td>Nama</td>
                        <td><?php echo $row["nama_pelanggan"];?></td>
                      </tr>
                      <tr>
                        <td>Alamat</td>
                        <td><?php echo $row["alamat_pelanggan"];?></td>
                      </tr>
                      <tr>
                        <td>Nomor HP</td>
                        <td><?php echo $row["telepon_pelanggan"];?></td>
                      </tr>
                      <tr>
                        <td>Saldo</td>
                        <td>Rp. <?php echo number_format($row["saldo"]);?></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><?php echo $row["email_pelanggan"];?></td>
                     
                    </tbody>
                  </table>
                  <center>
                    <a href="historisaldo.php" class="btn btn-primary">Histori Pengisian Saldo</a>
                    <a href="aktif.php" class="btn btn-primary">Histori Pembelian</a>
                  </center>
                 
                
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a href="index.php" data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary">Kembali</a>
                        <span class="pull-right">
                            <a href="editprofil.php" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary">Edit Profil</a>
                        </span>
                    </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>


