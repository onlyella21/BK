<?php
require_once'koneksi.php';

if(@$_POST['edit']){
	$id=mysqli_real_escape_string($koneksi,$_POST['id']);
			$nis=mysqli_real_escape_string($koneksi,$_POST['txtnis']);
       	$nama=mysqli_real_escape_string($koneksi,$_POST['txtnama']);
       	$jk=mysqli_real_escape_string($koneksi,$_POST['rbjk']);
       	$alamat=mysqli_real_escape_string($koneksi,$_POST['txtalamat']);
       	$notelp=mysqli_real_escape_string($koneksi,$_POST['txtnotelp']);
       	$angkatan=mysqli_real_escape_string($koneksi,$_POST['txtangkatan']);
        $kelas=mysqli_real_escape_string($koneksi,$_POST['kode_kelas']);
         
          

              
                    
              
                  


	//cek apakah user ingin merubah foto nya atau tidak

	if(@$_POST['ubah_foto']){

		$extensi=explode(".",$_FILES['fotosis']['name']);
        $fotosiswa="siswa-".round(microtime(true)).".".end($extensi);
        $sumber=$_FILES['fotosis']['tmp_name'];
        $upload=move_uploaded_file($sumber,"assets/img/siswa/".$fotosiswa);

        if($upload){
        	$caripoto="SELECT * FROM tab_siswa where id_siswa='$id'";
        	$sql=mysqli_query($koneksi,$caripoto);
			$data=mysqli_fetch_array($sql);
			unlink("assets/img/siswa/".$data['foto']);

			$perintah="UPDATE tab_siswa SET nis='$nis', nama_siswa='$nama', jenis_kelamin='$jk', alamat='$alamat', no_telp_siswa='$notelp',angkatan='$angkatan',id_kelas='$kelas',foto='$fotosiswa' WHERE id_siswa='$id'";

			$aksi=mysqli_query($koneksi,$perintah);

			if($aksi){
				echo"<script>alert('Berhasil dirubah')</script>";
    			echo"<script>location='siswa.php';</script>";
			}else{
				echo"Maaf, terjadi kesalahan saat mencoba menyimpan data ke database";
				echo"<br><a href='edit_siswa.php'>Kembali</a>";
			}
		} else{
			echo"Maaf gambar gagal di upload.";
			echo"<br><a href='edit_siswa.php'>Kembali</a>";
		}
	}else{
		$perintah="UPDATE tab_siswa SET nis='$nis', nama_siswa='$nama', jenis_kelamin='$jk', alamat='$alamat', no_telp_siswa='$notelp',angkatan='$angkatan',id_kelas='$kelas' WHERE id_siswa='$id'";

			$aksi=mysqli_query($koneksi,$perintah);
			if($aksi){
				echo"<script>alert('Berhasil dirubah')</script>";
    			echo"<script>location='siswa.php';</script>";
    			
			}else{
				die("Query gagal dijalankan:".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
				echo"Maaf, terjadi kesalahan saat mencoba menyimpan data ke database";
				echo"<br><a href='edit_siswa.php'>Kembali</a>";
			}
	}
}


?>