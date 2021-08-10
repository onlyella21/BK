<?php
require_once('koneksi.php');

$id=mysqli_real_escape_string($koneksi,$_GET['id']);

mysqli_query($koneksi,"delete from tab_kelas where id_kelas='$id'");

header("location:kelas.php");
?>