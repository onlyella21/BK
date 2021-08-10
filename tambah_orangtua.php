
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
            <h1>Orang Tua</h1>
            <ol class="breadcrumb">
              <li class="active"> Master Data</li>
              <li class="active">Tambah Data Orang Tua</li>
            </ol>
          </div>
      </div>
       <div class="panel panel-info">
          <div class="panel-heading-none">
          </div>
          <div class="panel-body">
          <form method="POST" action="" id="cariOrtu">
          <div class="form-group form-group-sm">
                 
                <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-1" for="txtcari" control-label">NIS</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" name="txtcari" id="txtcari" placeholder="NIS">
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
                  //-------Id Ortu otomatis----
                   $q="SELECT max(id_ortu) as maxId from tab_ortu";   
                    $ha=mysqli_query($koneksi,$q);
                     $data=mysqli_fetch_array($ha);

                    $idOrtu=$data['maxId'];
                    $noUrut=(int)substr($idOrtu,2,3);
                    $char="OT";
                    $noUrut++;

                   
                    $idOrtu=$char.sprintf("%03s",$noUrut);

                    //-----cari nis-----------
                    if(ISSET($_POST['cari'])){

               $cari=mysqli_real_escape_string($koneksi,$_POST['txtcari']);
               $cek="SELECT nis from tab_ortu where nis='$cari'";
               $ada=mysqli_query($koneksi,$cek) or die (mysqli_error($koneksi));
               if(mysqli_num_rows($ada)>0){
                 echo"<script>alert('Maaf data Orang tua siswa tersebut sudah ada!')</script>";
                  }else{
               $no= 1;
             
              $perintah="SELECT * FROM tab_siswa  WHERE  nis  LIKE '%$cari%'" ;
               $da=mysqli_query($koneksi,$perintah)or die (mysqli_error($koneksi));
               $r=mysqli_fetch_assoc($da);
                    
        ?>
       <form  action="simpan_orangtua.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
                  <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-3" for="txtid" control-label">ID Ortu</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txtid" id="txtid" value="<?php echo $idOrtu; ?>" readonly>
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
                    <label class=" control-label col-sm-3" for="txtayah" control-label">Nama Ayah</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txtayah" id="txtid"  required>
                </div>
              </div>

              <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-3" for="txtno" control-label">Nama Telpon</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txtno" id="txtno" required>
                </div>
              </div>

              <div class="form-group form-group=sm">
                    <center><button type="reset" align="right" class="btn btn-danger">Reset</button>
                    <input type="submit" align="right" class="btn btn-success"  value="Simpan" name="simpan"></center>
                </div>
                
                
              

      
      <?php
      if(!$r){
      echo"<script>alert('Maaf data tidak ditemukan')</script>";
      echo"<script>location='tambah_orangtua.php';</script>";
      }
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



