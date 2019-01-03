<?php 
session_start();


unset($_SESSION['status']);
unset($_SESSION['id']);


echo "<script>alert('anda telah logout');</script>";
echo "<script>location='index.php';</script>";
 ?>