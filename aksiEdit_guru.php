<?php
require_once'koneksi.php';

if(@$_POST['edit']){
	$id=mysqli_real_escape_string($koneksi,$_POST['id']);
	$nip=mysqli_real_escape_string($koneksi,$_POST['txtnip']);
	$nama=mysqli_real_escape_string($koneksi,$_POST['txtnama']);
	$jk=mysqli_real_escape_string($koneksi,$_POST['rbjk']);
	$alamat=mysqli_real_escape_string($koneksi,$_POST['txtalamat']);
	$tlp=mysqli_real_escape_string($koneksi,$_POST['txttelp']);
	


	//cek apakah user ingin merubah foto nya atau tidak

	if(@$_POST['ubah_foto']){

		$extensi=explode(".",$_FILES['fotoguru']['name']);
        $fotoGuru="guru-".round(microtime(true)).".".end($extensi);
        $sumber=$_FILES['fotoguru']['tmp_name'];
        $upload=move_uploaded_file($sumber,"assets/img/guru/".$fotoGuru);

        if($upload){
        	$caripoto="SELECT * FROM tab_guru where id_guru='$id'";
        	$sql=mysqli_query($koneksi,$caripoto);
			$data=mysqli_fetch_array($sql);
			unlink("assets/img/guru/".$data['foto_guru']);

			$perintah="UPDATE tab_guru SET nip='$nip', nama_guru='$nama', jenis_kelamin='$jk', alamat='$alamat', no_tlp='$tlp',foto_guru='$fotoGuru' WHERE id_guru='$id'";

			$aksi=mysqli_query($koneksi,$perintah);

			if($aksi){
				echo"<script>alert('Berhasil dirubah')</script>";
    			echo"<script>location='guru.php';</script>";
			}else{
				echo"Maaf, terjadi kesalahan saat mencoba menyimpan data ke database";
				echo"<br><a href='edit_guru.php'>Kembali</a>";
			}
		} else{
			echo"Maaf gambar gagal di upload.";
			echo"<br><a href='edit_guru.php'>Kembali</a>";
		}
	}else{
		$perintah="UPDATE tab_guru SET nip='$nip', nama_guru='$nama', jenis_kelamin='$jk', alamat='$alamat', no_tlp='$tlp' WHERE id_guru='$id'";

			$aksi=mysqli_query($koneksi,$perintah);
			if($aksi){
				echo"<script>alert('Berhasil dirubah')</script>";
    			echo"<script>location='guru.php';</script>";
    			
			}else{
				die("Query gagal dijalankan:".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
				echo"Maaf, terjadi kesalahan saat mencoba menyimpan data ke database";
				echo"<br><a href='edit_guru.php'>Kembali</a>";
			}
	}
}


?>