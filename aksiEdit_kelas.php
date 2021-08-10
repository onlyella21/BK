<?php
require'koneksi.php';
if(@$_POST['simpan']){

	$id=mysqli_real_escape_string($koneksi,$_POST['id']);
	
	$kode_jurusan=mysqli_real_escape_string($koneksi,$_POST['cbjur']);
	$tingkat=mysqli_real_escape_string($koneksi,$_POST['tingkat']);
	$huruf=mysqli_real_escape_string($koneksi,$_POST['txthuruf']);
	$tahun=mysqli_real_escape_string($koneksi,$_POST['tahun']);
	$wali=mysqli_real_escape_string($koneksi,$_POST['guru']);

	$th=substr($tahun,2,2);
	$kode=$kode_jurusan."-".$tingkat."-".$huruf."/".$th;

	$perintah="UPDATE tab_kelas SET kode_kelas='$kode',kode_jurusan='$kode_jurusan',tingkat='$tingkat',huruf='$huruf',tahun_pelajaran='$tahun',id_guru='$wali'  WHERE id_kelas='$id'";

	
	$aksi=mysqli_query($koneksi,$perintah) or die (mysqli_error($koneksi));

	if($aksi){
		echo"<script>alert('Berhasil dirubah')</script>";
    echo"<script>location='kelas.php';</script>";
     
	}else{
		echo "Error:".$perintah."<br>".mysqli_error($koneksi);
	}


}
?>
               