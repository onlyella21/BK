<?php
require'koneksi.php';
if(@$_POST['edit']){

	
	
	$id=mysqli_real_escape_string($koneksi,$_POST['txtid']);
	
	$ayah=mysqli_real_escape_string($koneksi,$_POST['txtayah']);
	$tlp=mysqli_real_escape_string($koneksi,$_POST['txtno']);
	

	
	

	$perintah="UPDATE tab_ortu SET nama_ayah='$ayah',no_telpon_ortu='$tlp' WHERE id_ortu='$id'";
	$aksi=mysqli_query($koneksi,$perintah) or die (mysqli_error($koneksi));

	if($aksi){
		
		echo"<script>alert('Berhasil dirubah')</script>";
    echo"<script>location='orangtua.php';</script>";
     
	}else{
		echo "Error:".$perintah."<br>".mysqli_error($koneksi);
	}


}
?>
               