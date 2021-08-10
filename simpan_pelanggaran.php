<?php
require'koneksi.php';
if(@$_POST['simpan']){

	
	$nama=$_POST['txtnama'];
	$kategori=$_POST['cbkategori'];
	$point=$_POST['txtpoint'];
	

	
	$perintah="INSERT INTO tab_pelanggaran (id_pelanggaran,nama_pelanggaran,id_tipe,pengurangan_point) VALUES('','$nama','$kategori','$point')";
	$aksi=mysqli_query($koneksi,$perintah) or die (mysqli_error($koneksi));

	if($aksi){
		echo"<script>
      alert('Data berhasil disimpan');
      </script>";
      echo"<script>location='pelanggaran.php';</script>";
	}else{
		echo "Error:".$perintah."<br>".mysqli_error($koneksi);
	}


}
?>
               