<?php
require'koneksi.php';
if(@$_POST['simpan']){

	
	
	$id=mysqli_real_escape_string($koneksi,$_POST['txtid']);
	$nis=mysqli_real_escape_string($koneksi,$_POST['txtnis']);
	$ayah=mysqli_real_escape_string($koneksi,$_POST['txtayah']);
	$tlp=mysqli_real_escape_string($koneksi,$_POST['txtno']);
	$pass=mysqli_real_escape_string($koneksi,md5($_POST['txtid']));
	

	$perintah="INSERT INTO tab_ortu (id_ortu,nis,nama_ayah,no_telpon_ortu,password) VALUES('$id','$nis','$ayah','$tlp','$pass')";
	$aksi=mysqli_query($koneksi,$perintah) or die (mysqli_error($koneksi));

	if($aksi){
		echo"<script>alert('Berhasil disimpan')</script>";
	echo"<script>location='orangtua.php';</script>";
     
	}else{
		echo "Error:".$perintah."<br>".mysqli_error($koneksi);
	}


}
?>
               