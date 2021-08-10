<?php
require'koneksi.php';
if(@$_POST['simpan']){

	$id=$_POST['id'];
	$nama=$_POST['txtnama'];
	$kategori=$_POST['cbkategori'];
	$point=$_POST['txtpoint'];
	

	 $perintah="UPDATE tab_pelanggaran SET nama_pelanggaran='$nama',id_tipe='$kategori',pengurangan_point='$point' WHERE id_pelanggaran='$id'";

	
	$aksi=mysqli_query($koneksi,$perintah) or die (mysqli_error($koneksi));

	if($aksi){
		echo"<script>alert('Berhasil dirubah')</script>";
    echo"<script>location='pelanggaran.php';</script>";
	}else{
		echo "Error:".$perintah."<br>".mysqli_error($koneksi);
	}


}
?>
               