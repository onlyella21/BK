
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
            <h1>Laporan Siswa</h1>
            <ol class="breadcrumb">
              <li class="active"> Laporan</li>
              <li class="active">Laporan Siswa</li>
            </ol>
          </div>
      </div>
                  <div class="panel panel-info">
          <div class="panel-heading-none">
          </div>
          <div class="panel-body">
                    <a   href="semuaLaporan_siswa.php" type="button" class="btn btn-success"><i class="fa fa-edit"></i>Cetak Semua Data Siswa</a>
       <hr>             
     
          <form method="POST" action="laporan_siswa_perkelas.php" id="cariOrtu">
          <div class="form-group form-group-sm">
                 <h4> Cetak Per Kelas </h4>
                 <div class="form-group form-group-sm">
                  <label class=" control-label col-sm-2" > Per Kelas</label>
                   <div class="col-sm-2">
                    <select name="kode_kelas" class="form-control" id="kode_kelas"required>
                    <option value="">--Pilih--</option>
                    <?php
                $query="SELECT * FROM tab_kelas";  
                 $data=mysqli_query($koneksi,$query);
                  if(mysqli_num_rows($data) > 0){

                    while($row=mysqli_fetch_assoc($data)){
                ?>
              <option value="<?php echo $row['id_kelas']?>"><?php echo $row['kode_kelas']?></option>

                <?php
                 }  
                 } 
                  ?>
                    </select>
                   
                  </div>
                 </div>
                    <input type="submit" align="right" class="btn btn-danger"  value="Cetak" name="cetak" id="cetak">
                    
                </div>
              
              </form>

               <hr> 
 <hr>  
  <h4> Cetak Per Siswa </h4>

       <form method="POST" action="" id="carinis">
          <div class="form-group form-group-sm">
                 
                <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-2" > Pilih Siswa</label>
                   <div class="col-sm-3">
                    <input type="text" class="form-control" name="txtsiswa" id="txtsiswa" placeholder="NIS atau Nama Siswa">
                </div>
         
         
                    <input type="submit" align="right" class="btn btn-success"  value="Cari" name="cari" id="cari">
                    
                </div>
              </div>
              </form>
              <?php
                if(ISSET($_POST['cari'])){
                   $cari=mysqli_real_escape_string($koneksi,$_POST['txtsiswa']);
                   $perintah="SELECT * FROM tab_siswa  WHERE  nis  LIKE '%$cari%' OR nama_siswa LIKE '%$cari%'";
               $da=mysqli_query($koneksi,$perintah)or die (mysqli_error($koneksi));
               if(mysqli_num_rows($da) > 0){
               $r=mysqli_fetch_assoc($da);
               
              ?>
              <form method="POST" action="laporan_siswa_persiswa.php" id="pertgl">
                 <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-2" > NIS</label>
                   <div class="col-sm-3">
                    <input type="text" class="form-control" name="nis" id="nis" readonly value="<?php echo $r['nis'];  ?>">
                </div>
              </div>
               <label class=" control-label col-sm-2" > Nama Siswa</label>
                   <div class="col-sm-3">
                    <input type="text" class="form-control" name="nama" id="nama" readonly value="<?php echo $r['nama_siswa']; ?>">
                </div>
                
               
                 <div class="col-sm-2">
                   <input type="submit" align="right" class="btn btn-danger"  value="Cetak" name="cetak" id="cetak">
</div>
 <?php
}
}
?>
 <hr>
</form>
<form method="POST" action="laporan_siswa_perangkatan.php" id="cariOrtu">
          <div class="form-group form-group-sm">
                 <h4> Cetak Per Angkatan</h4><div class="form-group form-group-sm">
                  <label class=" control-label col-sm-2" >Angkatan</label>
                   <div class="col-sm-2">
                  <input type="text" class="form-control" name="txtcari" id="txtcari" placeholder="Tahun Angkatan">

                  </div>
                 </div>
                    <input type="submit" align="right" class="btn btn-danger"  value="Cetak" name="cetak" id="cetak">
                    
                </div>
              
              </form>

               <hr> 

<hr>
<form method="POST" action="laporan_siswa_perjk.php" id="cariOrtu">
          <div class="form-group form-group-sm">
                 <h4> Cetak Per Jenis Kelamin</h4><div class="form-group form-group-sm">
                  <label class=" control-label col-sm-2" > Pilih Jenis Kelamin</label>
                   <div class="col-sm-2">
                    <select name="jk" class="form-control" id="jk"required>
                    <option value="">--Pilih--</option>
                    <option value="Perempuan">Perempuan</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                 </select>
               </div>
                    <input type="submit" align="right" class="btn btn-danger"  value="Cetak" name="cetak" id="cetak">
                    
                </div>
              
              </form>

               <hr> 