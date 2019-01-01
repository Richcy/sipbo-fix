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
$fotolama=$row['foto_pelanggan'];
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
                <div class="col-md-3 col-lg-3 " align="center"> 
                  <img alt="User Pic" src="images/<?php echo $row['foto_pelanggan']; ?>" class="img-circle img-responsive">
                  <form method = "post" enctype="multipart/form-data">
                    <input class="upload" type="file" name="foto">
                    <button class="btn btn-sm btn-primary" name="foto">Ganti Foto</button>
                  </form>
                  
                </div>

                <?php

                if(isset($_POST['foto']))
                {
                  $namafoto=$_FILES['foto']['name'];
                  $lokasifoto =$_FILES['foto']['tmp_name'];
                  //jika foto dirubah
                    //unlink("images/$fotolama");

                    move_uploaded_file($lokasifoto, "images/$namafoto");

                    $sql->query("UPDATE pelanggan SET foto_pelanggan='$namafoto' WHERE id_pelanggan='$id'");
                  
                  echo "<script>alert('foto telah diubah');</script>";
                  echo "<script>location='editprofil.php';</script>";

                }

                ?>
                
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
                <form method = "post">
                   <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Nama</td>
                        <td><input type="text" name="username" value ="<?php echo $row['nama_pelanggan'];?>"></td>
                      </tr>
                      <tr>
                        <td>Password</td>
                        <td><input type="password" name="password" value ="<?php echo $row['password_pelanggan'];?>"></td>
                      </tr>
                      <tr>
                        <td>Nomor HP</td>
                        <td><input type="text" name="nomorhp" value ="<?php echo $row['telepon_pelanggan'];?>"></td>
                      </tr>
                      <tr>
                        <td>Alamat</td>
                        <td>
                          <textarea name = "alamat" class= "form-control" rows = "5">
                          <?php echo $row['alamat_pelanggan']; ?>
                          </textarea>
                        </td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><input type="email" name="email" value ="<?php echo $row['email_pelanggan'];?>"></td>
                     
                    </tbody>
                  </table>

                
               </div>
              </div>
            </div>
                  <div class="panel-footer">
                    <a href="index.php" data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary">Kembali Ke Home</a>
                        <a href="profil.php" data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary">Kembali</a>
                        <span class="pull-right">
                          <button class="btn btn-sm btn-primary" name="simpan">Simpan</button> 
                        </span>
                    </div>
                  </form> 
            
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>

<?php

if(isset($_POST['simpan']))
{
  
    $sql->query("UPDATE pelanggan SET nama_pelanggan='$_POST[username]',
      password_pelanggan='$_POST[password]',telepon_pelanggan='$_POST[nomorhp]',
      alamat_pelanggan='$_POST[alamat]',email_pelanggan='$_POST[email]'
      WHERE id_pelanggan='$id'");
  
  echo "<script>alert('data telah diubah');</script>";
  echo "<script>location='profil.php';</script>";

}

  ?>

