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
            <h1>Siswa</h1>
            <ol class="breadcrumb">
              <li class="active"> Master Data</li>
              <li class="active">Siswa</li>
              <li class="active">Tambah Data Siswa</li>
            </ol>
          
      

<form  action="simpan_siswa.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
                  <div class="form-group form-group-sm">

                    <label class=" control-label col-sm-3" for="txtnis" control-label">NIS</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" name="txtnis" id="txtnis">
                </div>
              </div>
                 <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Nama Siswa</label>
                    <div class="col-sm-5">
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
                    <div class="col-sm-4">
                    <textarea class="form-control" name="txtalamat" id="txtalamat" required></textarea>
                </div>
              </div>
                 <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">No Telpon Siswa</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" name="txtnotelp" id="txtnotelp" required >
                </div>
              </div>
                <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Angkatan</label>
                    <div class="col-sm-2">
                   
                    <input type="text" class="form-control" maxlength="4" placeholder="Tahun" name="txtangkatan" id="txtangkatan" required >
                </div>
                </div>
                
                
                 <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Kelas</label>
                    <div class="col-sm-4">
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
              <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Foto</label>
                    <div class="col-sm-5">
                    <input type="file" class="form-control" name="fotosis" id="fotosis" required>
                </div>
              </div>
               
              		<div class="form-group form-group=sm">
                    <center><button type="reset" align="right" class="btn btn-danger">Reset</button>
                    <input type="submit" align="right" class="btn btn-success"  value="Simpan" name="simpan"></center>
                </div>
                
                </form>
                
             