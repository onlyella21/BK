<?php
require_once('koneksi.php');
if(@$_POST['edit']){
	$id=$_POST['id'];
	 $kate=$_POST['kategori'];
	 

     $perintah="UPDATE tab_kategoripelanggaran SET tipe_pelanggaran='$kate' WHERE id_tipe='$id'";

     $hasil=mysqli_query($koneksi,$perintah);

     if($hasil){
     	echo"<script>alert('Berhasil dirubah')</script>";
    echo"<script>location='kategori.php';</script>";
     	
    } else{

     	
		die("Query gagal dijalankan:".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
     }
     }



?>