
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
            <h1>Laporan Guru Wali Kelas</h1>
            <ol class="breadcrumb">
              <li class="active"> Laporan</li>
              <li class="active">Laporan Guru Wali Kelas</li>
            </ol>
          </div>
      </div>
                  <div class="panel panel-info">
          <div class="panel-heading-none">
          </div>
          <div class="panel-body">
                    <a   href="laporan_semua_guru.php" type="button" class="btn btn-success"><i class="fa fa-edit"></i>Cetak Semua Data Guru Wali Kelas</a>
                    
     
          <form method="POST" action="laporan_guru_perguru.php">
          <div class="form-group form-group-sm">
                 
                 <div class="form-group form-group-sm">
                  <label class=" control-label col-sm-2" > Per Guru</label>
                   <div class="col-sm-6">
                    <select name="id_guru" class="form-control" id="id_guru"required>
                    <option value="">--Pilih--</option>
                    <?php
                $query="SELECT * FROM tab_guru";  
                 $data=mysqli_query($koneksi,$query);
                  if(mysqli_num_rows($data) > 0){

                    while($row=mysqli_fetch_assoc($data)){
                ?>
              <option value="<?php echo $row['id_guru']?>"><?php echo $row['nama_guru']?></option>

                <?php
                 }  
                 } 
                  ?>
                    </select>
                   
                  </div>
                 </div>
                    <input type="submit" align="right" class="btn btn-danger"  value="Cetak" name="cetak" id="cetak">
                    
                </div>
              </div>
</div>
 </form>
 


             