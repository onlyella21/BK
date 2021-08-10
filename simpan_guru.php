  <?php
  require_once('koneksi.php');

       if(@$_POST['simpan']){
       	$nip=mysqli_real_escape_string($koneksi,$_POST['txtnip']);
       	$nama=mysqli_real_escape_string($koneksi,$_POST['txtnama']);
       	$jk=mysqli_real_escape_string($koneksi,$_POST['rbjk']);
       	$alamat=mysqli_real_escape_string($koneksi,$_POST['txtalamat']);
       	$notelp=mysqli_real_escape_string($koneksi,$_POST['txtnotelp']);
       	
        $extensi=explode(".",$_FILES['fotoguru']['name']);
        $fotoGuru="guru-".round(microtime(true)).".".end($extensi);
        $sumber=$_FILES['fotoguru']['tmp_name'];
        $upload=move_uploaded_file($sumber,"assets/img/guru/".$fotoGuru);

        if($upload){

	$perintah="INSERT INTO tab_guru (id_guru,nip,nama_guru,jenis_kelamin,alamat,no_tlp,foto_guru) VALUES ('','$nip','$nama','$jk','$alamat','$notelp','$fotoGuru')";

       	$aksi=mysqli_query($koneksi,$perintah) or die (mysqli_error($koneksi));

	if(!$aksi){
		
		
		echo "Error:".$perintah."<br>".mysqli_error($koneksi);

	} else{
		echo"<script>alert('Berhasil disimpan')</script>";
	echo"<script>location='guru.php';</script>";
	}
}
  else{
    echo"Maaf , gambar gagal di upload.";
    echo"<br><a href='tambah_guru.php'>Kembali</a>";
  }


}
?>
