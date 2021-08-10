  <?php
  require_once('koneksi.php');

       if(@$_POST['simpan']){
       	$kode=mysqli_real_escape_string($koneksi,$_POST['kode_jurusan']);
       	$nama=mysqli_real_escape_string($koneksi,$_POST['nama_jurusan']);

       	$perintah="INSERT INTO tab_jurusan (kode_jurusan,nama_jurusan) VALUES ('$kode','$nama')";

       	$aksi=mysqli_query($koneksi,$perintah) or die (mysqli_error($koneksi));

	if(!$aksi){
		
		
		echo "Error:".$perintah."<br>".mysqli_error($koneksi);

	} else{
		echo"<script>alert('Berhasil disimpan')</script>";
	echo"<script>location='jurusan.php';</script>";
	}


}
?>
