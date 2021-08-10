<?php
require'koneksi.php';
if(@$_POST['simpan']){
	$id=mysqli_real_escape_string($koneksi,$_POST['txtid']);
	$nama=mysqli_real_escape_string($koneksi,$_POST['txtsiswa']);
	$nis=mysqli_real_escape_string($koneksi,$_POST['txtnis']);
	$tgl=mysqli_real_escape_string($koneksi,$_POST['txttanggal']);
	$pel=mysqli_real_escape_string($koneksi,$_POST['cbpel']);
	$la=mysqli_real_escape_string($koneksi,$_POST['nama_pel']);
	$poi=mysqli_real_escape_string($koneksi,$_POST['point_pel']);
	
	
	

	$perintah1="INSERT INTO tab_kasus (kode_kasus,tgl_kasus,nis,id_pelanggaran) VALUES('$id','$tgl','$nis','$pel')";
	$perintah2="UPDATE tab_point_siswa SET point_akhir=point_akhir-'$poi', jumlah_kasus=jumlah_kasus+1 where nis='$nis'";
	$aksi=mysqli_query($koneksi,$perintah1) or die (mysqli_error($koneksi));
	$aksi2=mysqli_query($koneksi,$perintah2) or die (mysqli_error($koneksi));


	if($aksi){
     	echo"<script>alert('Berhasil disimpan')</script>";
     	echo"<script>location='kasus.php';</script>";
	if($aksi){
	}else{
		echo "Error:".$perintah."<br>".mysqli_error($koneksi);
	}
		
		$_SESSION['POST']=$_POST;
}

if(@$_SESSION['POST']){
	$kode=$_SESSION['POST']['txtid'];
	$n=$_SESSION['POST']['txtnis'];
	$sis=$_SESSION['POST']['txtsiswa'];
	$t=$_SESSION['POST']['txttanggal'];
	$p=$_SESSION['POST']['nama_pel'];
	$o=$_SESSION['POST']['point_pel'];
	
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
            <h1>Kasus Siswa</h1>
            <ol class="breadcrumb">
              <li class="active"> Master Data</li>
              <li class="active">Kasus Siswa</li>
              <li class="active">Berhasil Menyimpan</li>
            </ol>
          </div>
      </div>
      <div class="panel panel-info">
          <div class="panel-heading">
             <label class="control-label"  control-label">Kasus Siswa</label>
          </div>
          <div class="panel-body">
        <div class="table-responsive-sm">
              <table class="table table-hover">

	<tr>
		<td>Kode Kasus</td>
		<td>:</td>
		<td><?php echo $kode;?></td>
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
		<td>Pelanggaran</td>
		<td>:</td>
		<td><?php echo $p;?></td>
	</tr>
		<td>Point yg dikurangi</td>
		<td>:</td>
		<td><?php echo $o;?></td>
	</tr>
</table>
 <td colspan="2" style="text-align: center;">
                    <a href="kasus.php" type="button" class="btn btn-info btn-xs">Kembali</a>

         <?php
     }
     ?>