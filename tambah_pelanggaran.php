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
            <h1>Pelanggaran</h1>
            <ol class="breadcrumb">
              <li class="active"> Master Data</li>
              <li class="active">Pelanggaran</li>
              <li class="active">Tambah Data Pelanggaran</li>
            </ol>
          
      
  


<form  action="simpan_pelanggaran.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
                  <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-3" for="txtnama" control-label">Nama Pelanggaran</label>
                    <div class="col-sm-7">
                    <input type="text" class="form-control" name="txtnama" id="txtnama" required>
                </div>
              </div>
                <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3" for="txtkategori">Kategori</label>
                    <div class="col-sm-5">
                  <select name="cbkategori" class="form-control" id="cbkategori"required>
                    <option value="">--Pilih--</option>
                    <?php
                $query="SELECT * FROM tab_kategoripelanggaran";  
                 $data=mysqli_query($koneksi,$query);
                  if(mysqli_num_rows($data) > 0){

                    while($row=mysqli_fetch_assoc($data)){
                ?>
              <option value="<?php echo $row['id_tipe']?>"><?php echo $row['tipe_pelanggaran']?></option>

                <?php
                 }  
                 } 
                  ?>
                    </select>  
                </div>
              </div>
              <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-3" for="txtpoint" control-label">Point</label>
                    <div class="col-sm-2">
                    <input type="number" class="form-control" name="txtpoint" id="txtpoint" required>
                </div>
              </div>


              		<div class="form-group form-group=sm">
                    <center><button type="reset" align="right" class="btn btn-danger">Reset</button>
                    <input type="submit" align="right" class="btn btn-success"  value="Simpan" name="simpan"></center>
                </div>
                
                </form>