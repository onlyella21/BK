<?php
require_once('koneksi.php');

$id=$_GET['id'];

mysqli_query($koneksi,"delete from tab_pelanggaran where id_pelanggaran='$id'");

header("location:pelanggaran.php");
?>