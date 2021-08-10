<?php
session_start()
?>
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

?>
</div><!-- /.navbar-collapse -->
      </nav>
 <div id="page-wrapper">
<div class="row" id="contentInput" >
          <div class="col-lg-12">
            <h2>Point Siswa</h2>
            <ol class="breadcrumb">
              <li class="active"></li>
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
                
                <th colspan="6" style="background-color:#E0FFFF"><?php echo   $hari ;?></th>
              </tr>
                <tr>
                  <th>Nama Siswa</th>
                  <th>Point Awal</th>
                  <th>Point Akhir</th>
                  <th>Jumlah Kasus</th>
                </tr>

      <?php
        $no= 1;
        $query="SELECT * FROM tab_point_siswa as p JOIN tab_siswa as s ON p.nis=s.nis WHERE s.nis='$nis'";
        
        $data=mysqli_query($koneksi,$query);
        if($data==FALSE){
              die(mysqli_error($koneksi));}
            
          while($row=mysqli_fetch_assoc($data)){
        
            
      ?>
                <tr>
                  <td><?php echo $row['nama_siswa']; ?></td>
                  <td><?php echo $row['point_awal']; ?></td>
                  <td><?php echo $row['point_akhir']; ?></td>
                  <td><?php echo $row['jumlah_kasus']; ?></td>
                </tr>
          <?php
          }
        
        ?>
              </table>  
        </div>
        
