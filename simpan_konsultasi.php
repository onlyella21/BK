<?php
require'koneksi.php';
if(@$_POST['simpan']){
	$nama=mysqli_real_escape_string($koneksi,$_POST['txtsiswa']);
	$id=mysqli_real_escape_string($koneksi,$_POST['txtid']);
	$nis=mysqli_real_escape_string($koneksi,$_POST['txtnis']);
	$tgl=mysqli_real_escape_string($koneksi,$_POST['txttanggal']);
	$kel=mysqli_real_escape_string($koneksi,$_POST['txtkeluhan']);
	$sar=mysqli_real_escape_string($koneksi,$_POST['txtsaran']);

	$perintah="INSERT INTO tab_konsultasi (kode_konsultasi,tgl_konsultasi,nis,keluhan,saran_bk) VALUES('$id','$tgl','$nis','$kel','$sar')";
	$aksi=mysqli_query($koneksi,$perintah) or die (mysqli_error($koneksi));

	if($aksi){
		echo"<script>alert('Berhasil disimpan')</script>";
		echo"<script>location='konsultasi.php';</script>";
	
	}else{
		echo "Error:".$perintah."<br>".mysqli_error($koneksi);
	}

	$_SESSION['POST']=$_POST;
}

if(@$_SESSION['POST']){
	$kodekonsul=$_SESSION['POST']['txtid'];
	$n=$_SESSION['POST']['txtnis'];
	$sis=$_SESSION['POST']['txtsiswa'];
	$t=$_SESSION['POST']['txttanggal'];
	$k=$_SESSION['POST']['txtkeluhan'];
	$r=$_SESSION['POST']['txtsaran'];
}

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Aplikasi BK</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="assets/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
     <!-- JavaScript -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </head>

<body>
<?php
require_once('koneksi.php');

?>
 <div id="wrapper">
<?php 
include"header.php";
?>

   </div><!-- /.navbar-collapse -->
      </nav>
 <div id="page-wrapper">
<div class="row" id="contentInput" >
          <div class="col-lg-12">
            <h1>Konsultasi Siswa</h1>
            <ol class="breadcrumb">
              <li class="active"> Master Data</li>
              <li class="active">Konsultasi Siswa</li>
              <li class="active">Berhasil Menyimpan</li>
            </ol>
          </div>
      </div>
      <div class="panel panel-info">
          <div class="panel-heading">
             <label class="control-label"  control-label">Konsultasi Siswa</label>
          </div>
          <div class="panel-body">
        <div class="table-responsive-sm">
              <table class="table table-hover">

	<tr>
		<td>Kode Konsultasi</td>
		<td>:</td>
		<td><?php echo $kodekonsul;?></td>
	</tr>
	<tr>
		<td>NIS</td>
		<td>:</td>
		<td><?php echo $n;?></td>
	</tr>
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td><?php echo $sis;?></td>
	</tr>
	<tr>
		<td>Tanggal</td>
		<td>:</td>
		<td><?php echo $t;?></td>
	</tr>
	<tr>
		<td>Keluhan Siswa</td>
		<td>:</td>
		<td><?php echo $k;?></td>
	</tr>
	<tr>
		<td>Saran BK</td>
		<td>:</td>
		<td><?php echo $r;?></td>
	</tr>
</table>

      <a href="konsultasi.php" type="button" class="btn btn-info btn-xs">Kembali</a>