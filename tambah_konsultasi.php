
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
            </ol>
          </div>
      </div>
      <div class="panel panel-info">
          <div class="panel-heading">
             <label class="control-label"  control-label">Tambah Konsultasi Siswa</label>
          </div>
          <div class="panel-body">
          <form method="POST" action="" id="carinis">
          <div class="form-group form-group-sm">
                 
                <div class="form-group form-group-sm">
                   
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txtcari" id="txtcari" placeholder="NIS atau Nama Siswa">
                </div>
         
         
                    <input type="submit" align="right" class="btn btn-success"  value="Cari" name="cari" id="cari">
                    
                </div>
              </div>
</div>
 </form>
 </div>

               <div class="row" id="contentJurusan">
                    <div class="col-lg-12">
                  <?php
                    $q="SELECT max(kode_konsultasi) as maxKode from tab_konsultasi";   
                    $ha=mysqli_query($koneksi,$q);
                     $data=mysqli_fetch_array($ha);

                    $kode=$data['maxKode'];
                    $noUrut=(int)substr($kode,1,5);
                    $char="T";
                    $noUrut++;

                   
                    $kode=$char.sprintf("%05s",$noUrut);
           

                 
                    //-----cari nis-----------
                    if(ISSET($_POST['cari'])){
               $no= 1;
              $cari=mysqli_real_escape_string($koneksi,$_POST['txtcari']);
              $perintah="SELECT * FROM tab_siswa   WHERE  nis  LIKE '%$cari%' OR nama_siswa LIKE '%$cari%'" ;
               $da=mysqli_query($koneksi,$perintah)or die (mysqli_error($koneksi));
              

                while($r=mysqli_fetch_array($da)){
                    
        ?>
       <form  action="simpan_konsultasi.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
                  <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-3" for="txtid" control-label">Kode Konsultasi</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" name="txtid" id="txtid" value="<?php echo $kode; ?>" readonly>
                </div>
              </div>
              <div class="form-group form-group-sm">
                    <input type="hidden" class="form-control" name="txtnis" id="txtnis"  value="<?php echo $r['nis']; ?>">
                    <label class=" control-label col-sm-3" for="txtsiswa" control-label">Nama Siswa</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txtsiswa" id="txtisiswa" readonly value="<?php echo $r['nama_siswa']; ?>">
                </div>
              </div>

              <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-3" for="txttanggal" control-label">Tanggal</label>
                    <div class="col-sm-3">
                    <input type="date" class="form-control" name="txttanggal" id="txttanggal" placeholder="yyyy-mm-dd" required>
                </div>
              </div>

               <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Keluhan Siswa</label>
                    <div class="col-sm-7">
                    <textarea class="form-control" name="txtkeluhan" id="txtkeluhan" rows="5" required></textarea>
                </div>
              </div>
               <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Saran BK</label>
                    <div class="col-sm-7">
                    <textarea class="form-control" rows="5" name="txtsaran" id="txtsaran" required></textarea>
                </div>
              </div>
              <div class="form-group form-group=sm">
                    <center><button type="reset" align="right" class="btn btn-danger">Reset</button>
                    <input type="submit" align="right" class="btn btn-success"  value="Simpan" name="simpan"></center>
                </div>
                
                
              

   <?php
  }

if(!$da){
    
    
    echo "Error:".$perintah."<br>".mysqli_error($koneksi);

  }
}
  ?>
 </table>  
        </div>
     
       
      </div>
      </div>
</div>
 </form>
</div>



