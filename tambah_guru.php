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
<div id="wrapper">
<?php 
include"header.php";
?>

<?php
require_once('koneksi.php');
$query="SELECT * FROM tab_siswa";
?>
</div><!-- /.navbar-collapse -->
      </nav>
 <div id="page-wrapper">
<div class="row" id="contentInput" >
          <div class="col-lg-12">
            <h1>Guru</h1>
            <ol class="breadcrumb">
              <li class="active"> Master Data</li>
              <li class="active">Guru</li>
              <li class="active">Tambah Data Guru</li>
            </ol>
          
      
  


<form  action="simpan_guru.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
                  <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-3" for="txtnip" control-label">NIP</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" name="txtnip" id="txtnip" required>
                </div>
              </div>
                 <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Nama Guru</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" name="txtnama" id="txtnama" required >
                </div>
              </div>
                <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Jenis Kelamin</label>
                    <div class="col-sm-7">
                    <input type="radio"  name="rbjk" class="form control" id="laki" value="Laki-Laki">Laki-Laki
                    <input type="radio"  name="rbjk" class="form control" id="perempuan" value="Perempuan">Perempuan
                </div>
              </div>
                <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Alamat</label>
                    <div class="col-sm-3">
                    <textarea class="form-control" name="txtalamat" id="txtalamat" required></textarea>
                </div>
              </div>
                 <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">No Telpon</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" name="txtnotelp" id="txtnotelp" required >
                </div>
              </div>
                
              <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Foto</label>
                    <div class="col-sm-3">
                    <input type="file" class="form-control" name="fotoguru" id="fotoguru" required>
                </div>
              </div>
              		<div class="form-group form-group=sm">
              			
              		
                    <center><button type="reset" align="right" class="btn btn-danger">Reset</button>
                    <input type="submit" align="right" class="btn btn-success"  value="Simpan" name="simpan"></center>
                </div>
                
                </form>