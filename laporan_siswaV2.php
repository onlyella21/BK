
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
     
          <form method="POST" action="" id="filter">
          <div class="form-group form-group-sm">
                 
                 <div class="form-group form-group-sm">
                  <label class=" control-label col-sm-2" > Pilih</label>
                   <div class="col-sm-2">
                    <select name="kode_kelas" class="form-control" id="kode_kelas"required>
                    <option value="">---Pilih Filter--</option>
                    <option value="angkatan">Angkatan</option>
                    <option value="kelas">Kelas</option>
                    <option value="jk">Jenis Kelamin</option>
                  </select>
                  </div>
                   <div class="col-sm-4">
                     <input type="text" class="form-control" name="txtpilih" id="txtpilih" required >
                   
                  </div>
                 </div>
                  <input type="submit" align="right" class="btn btn-success"  value="Tampilkan" name="tampil" id="tampil">
               
              
              </form>
            </div>

               <div class="table-responsive-sm">
              <table class="table table-bordered table-hover table-striped">
                <tr>
                  <th>NO</th>
                  <th>NIS</th>
                  <th>Nama Siswa</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>No Telpon</th>
                   <th>Angkatan</th>
                  <th>Kelas</th>
                  </tr>
 

              <?php
              $no= 1;
                if(ISSET($_POST['tampil'])){
                   $cari=mysqli_real_escape_string($koneksi,$_POST['txtpilih']);
                   $perintah="SELECT * FROM tab_siswa as s JOIN tab_kelas as k ON s.id_kelas=k.id_kelas WHERE s.nis  LIKE '%$cari%' OR s.nama_siswa LIKE '%$cari%' OR s.angkatan LIKE '%$cari%' OR s.jenis_kelamin LIKE '%$cari%' OR k.kode_kelas LIKE '%$cari%'"; 
                $da=mysqli_query($koneksi,$perintah)or die (mysqli_error($koneksi));
               if(mysqli_num_rows($da) > 0){
              
               while($row=mysqli_fetch_assoc($da)){
              ?>
              
                <tr>
                  <td align="center"><?php echo $no++; ?></td>
                  <td><?php echo $row['nis']; ?></td>
                  <td><?php echo $row['nama_siswa']; ?></td>
                  <td><?php echo $row['jenis_kelamin']; ?></td>
                  <td><?php echo $row['alamat']; ?></td>
                  <td><?php echo $row['no_telp_siswa']; ?></td>
                  <td><?php echo $row['angkatan']; ?></td>
                  <td><?php echo $row['kode_kelas']; ?></td>
                </tr>

               
          <?php
          }
          
        }
      }
       ?>  
              
</div>
</table>
</div>
</div>
<div class="panel panel-info">
          <div class="panel-heading-none">
          </div>
          <div class="panel-body">
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
 



             