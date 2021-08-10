<?php
require'koneksi.php';
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

 <div id="wrapper">
<?php 
include"header.php";
?>

   </div><!-- /.navbar-collapse -->
      </nav>
 <div id="page-wrapper">
<div class="row" id="contentInput" >
          <div class="col-lg-12">
            <h1>Konsultasi Ku</h1>
            <ol class="breadcrumb">
              <li class="active"> Data Konsultasi Ku</li>
            </ol>
          </div>
      </div>
              <?php
                $hari=date('l,d-M-Y');
                 $nis=$_SESSION['nis'];
                ?>

      <div class="table-responsive-sm">
              <table class="table table-bordered  table-hover table-striped">
              <tr>
                <th style="background-color:#E0FFFF" colspan="4"><?php echo $hari;?></th>
              </tr>
                <tr>
                  <th>Kode Konsul</th>
                  <th>Tanggal</th>
                  <th>Keluhan</th>
                  <th>Saran BK</th> 
                 
                </tr>

      <?php
        $no= 1;
        $query="SELECT * FROM tab_konsultasi as k JOIN tab_siswa as s ON k.nis=s.nis JOIN tab_kelas as e ON e.id_kelas=s.id_kelas WHERE s.nis='$nis'";
        
        $data=mysqli_query($koneksi,$query);
        if(mysqli_num_rows($data)>0){
            
          while($row=mysqli_fetch_assoc($data)){
         $t=$row['tgl_konsultasi']; 
             $tgl=date("d-n-y",strtotime($t));
      ?>
                <tr>
 
                  <td><?php echo $row['kode_konsultasi']; ?></td>
                  <td><?php echo $tgl; ?></td>
                  <td><?php echo $row['keluhan']; ?></td>
                  <td><?php echo $row['saran_bk']; ?></td>
                 
  
                   
                </tr>
          <?php
          }
        
        }
   else{
    
     echo"<h4>Tidak Ada Data Konsultasi</h4>";
  
  }


        
        ?>






              </table>  
        </div>
        




               