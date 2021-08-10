<?php
require_once('koneksi.php');

$id=$_GET['id'];

mysqli_query($koneksi,"delete from tab_kategoripelanggaran where id_tipe='$id'");

header("location:kategori.php");
?>