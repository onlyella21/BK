  <?php
  require_once('koneksi.php');

       if(@$_POST['simpan']){
       	$kate=$_POST['kategori'];
       	

       	$perintah="INSERT INTO tab_kategoripelanggaran (id_tipe,tipe_pelanggaran) VALUES ('','$kate')";

       	$aksi=mysqli_query($koneksi,$perintah) or die (mysqli_error($koneksi));

	if(!$aksi){
		
		
		echo "Error:".$perintah."<br>".mysqli_error($koneksi);

	} else{
		echo"<script>alert('Berhasil disimpan')</script>";
	echo"<script>location='kategori.php';</script>";
	}


}
?>
