
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
            <h1>Laporan Point Siswa</h1>
            <ol class="breadcrumb">
              <li class="active"> Laporan</li>
              <li class="active">Laporan Point Siswa</li>
            </ol>
          </div>
      </div>
                  <div class="panel panel-info">
          <div class="panel-heading-none">
          </div>
          <div class="panel-body">
                    <a   href="laporan_semua_point.php" type="button" class="btn btn-success"><i class="fa fa-edit"></i>Cetak Semua Data Point Siswa</a>
               <hr>     
           

          <!-------------form berdasarkan kelas-->
         <h4>Per Kelas</h4>
          <form method="POST" action="laporan_point_perkelas.php" id="perkelas">
          <div class="form-group form-group-sm">
                 
                 <div class="form-group form-group-sm">
                  <label class=" control-label col-sm-2" > Pilih Kelas</label>
                   <div class="col-sm-2">
                    <select name="id_kelas" class="form-control" id="id_kelas"required>
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
 


             