<?php
require_once('koneksi.php');

$id=mysqli_real_escape_string($koneksi,$_GET['id']);

$caripoto="SELECT * FROM tab_siswa where id_siswa='$id'";
$sql=mysqli_query($koneksi,$caripoto);
$data=mysqli_fetch_array($sql);

unlink("assets/img/siswa/".$data['foto']);

$aksi=mysqli_query($koneksi,"delete from tab_siswa where id_siswa='$id'");



header("location:siswa.php");

?>