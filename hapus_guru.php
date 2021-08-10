<?php
require_once('koneksi.php');

$id=mysqli_real_escape_string($koneksi,$_GET['id']);

$caripoto="SELECT * FROM tab_guru where id_guru='$id'";
$sql=mysqli_query($koneksi,$caripoto);
$data=mysqli_fetch_array($sql);

unlink("assets/img/guru/".$data['foto_guru']);

$aksi=mysqli_query($koneksi,"delete from tab_guru where id_guru='$id'");



header("location:guru.php");

?>