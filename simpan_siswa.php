  <?php
  require_once('koneksi.php');

       if(@$_POST['simpan']){

       //Data untuk Table Siswa
        $nis=mysqli_real_escape_string($koneksi,$_POST['txtnis']);
       	$nama=mysqli_real_escape_string($koneksi,$_POST['txtnama']);
       	$jk=mysqli_real_escape_string($koneksi,$_POST['rbjk']);
       	$alamat=mysqli_real_escape_string($koneksi,$_POST['txtalamat']);
       	$notelp=mysqli_real_escape_string($koneksi,$_POST['txtnotelp']);
       	$angkatan=mysqli_real_escape_string($koneksi,$_POST['txtangkatan']);
        $kelas=mysqli_real_escape_string($koneksi,$_POST['kode_kelas']);
        $pass=mysqli_real_escape_string($koneksi,md5($_POST['txtnis']));

         
          $q="SELECT * FROM tab_siswa ORDER BY id_siswa DESC LIMIT 1";
          //$q="SELECT max(nis) as maxNis from tab_siswa";

               //$ha=mysqli_query($koneksi,$q);
               //$data=mysqli_fetch_array($ha);
                  
                    
                    //$nis=$data['nis'];
                    //$noUrut=(int)substr($nis,2,4);
                    //$thn=substr($angkatan,2,2);
                    //$noUrut++;

                   
                    //$nis_sis=$thn.sprintf("%04s",$noUrut);
                   
                 

        $extensi=explode(".",$_FILES['fotosis']['name']);
        $fotosiswa="siswa-".round(microtime(true)).".".end($extensi);
        $sumber=$_FILES['fotosis']['tmp_name'];
        $upload=move_uploaded_file($sumber,"assets/img/siswa/".$fotosiswa);

        if($upload){

	$perintah="INSERT INTO tab_siswa (id_siswa,nis,nama_siswa,jenis_kelamin,alamat,no_telp_siswa,angkatan,id_kelas,password,foto) VALUES ('','$nis','$nama','$jk','$alamat','$notelp','$angkatan','$kelas','$pass','$fotosiswa')";

       	$aksi=mysqli_query($koneksi,$perintah) or die (mysqli_error($koneksi));

    
	if(!$aksi){
		
		
		echo "Error:".$perintah."<br>".mysqli_error($koneksi);

	} else{
    
   
    echo"<script>alert('Berhasil disimpan, Silahkan lanjut lengkapi data orang tua siswa')</script>";

  echo"<script>location='tambah_orangtua.php';</script>";

	}
}
  else{
    echo"Maaf , gambar gagal di upload.";
    echo"<br><a href='tambah_siswa.php'>Kembali</a>";
  }


}
?>
