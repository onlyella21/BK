<?php
require_once('koneksi.php');

$id=mysqli_real_escape_string($koneksi,$_GET['id']);

$aksi = mysqli_query($koneksi,"delete from tab_ortu where id_ortu='$id'");

if($aksi){
		echo"<script>alert('Data Berhasil Dihapus')</script>";
	echo"<script>location='orangtua.php';</script>";
     
	}else{
		echo "Error:".$perintah."<br>".mysqli_error($koneksi);
	}



?>

