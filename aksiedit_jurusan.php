<?php
require_once('koneksi.php');
if(@$_POST['edit']){
	$id=$_POST['kode'];
	 $kode=mysqli_real_escape_string($koneksi,$_POST['kode_jurusan']);
	 $nama=mysqli_real_escape_string($koneksi,$_POST['nama_jurusan']);

     $perintah="UPDATE tab_jurusan SET kode_jurusan='$kode',nama_jurusan='$nama' WHERE kode_jurusan='$id'";

     $hasil=mysqli_query($koneksi,$perintah);

     if($hasil){
     	echo"<script>alert('Berhasil dirubah')</script>";
    echo"<script>location='jurusan.php';</script>";
     	
    } else{

     	
		die("Query gagal dijalankan:".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
     }
     }



?>