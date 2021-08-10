<?php
require'koneksi.php';
if(@$_POST['simpan']){

	
	
	$kode_jurusan=mysqli_real_escape_string($koneksi,$_POST['cbjur']);
	$tingkat=mysqli_real_escape_string($koneksi,$_POST['tingkat']);
	$huruf=mysqli_real_escape_string($koneksi,$_POST['txthuruf']);
	$tahun=mysqli_real_escape_string($koneksi,$_POST['tahun']);
	$wali=mysqli_real_escape_string($koneksi,$_POST['guru']);

	
	$kode=$kode_jurusan."-".$tingkat."-".$huruf;

	$perintah="INSERT INTO tab_kelas (id_kelas,kode_kelas,kode_jurusan,tingkat,huruf,tahun_pelajaran,id_guru) VALUES('','$kode','$kode_jurusan','$tingkat','$huruf','$tahun','$wali')";
	$aksi=mysqli_query($koneksi,$perintah) or die (mysqli_error($koneksi));

	if($aksi){
		echo"<script>alert('Berhasil disimpan')</script>";
	echo"<script>location='kelas.php';</script>";
     
	}else{
		echo "Error:".$perintah."<br>".mysqli_error($koneksi);
	}


}
?>
               