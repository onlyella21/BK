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
           <div class="panel panel-info">
          <div class="panel-heading-none">
          </div>
          <div class="panel-body">
          <form method="POST" action="" id="cariOrtu">
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
 <?php
                $hari=date('l,d-M-Y');
                ?>

       
            <div class="table-responsive-sm">
              <table class="table table-bordered  table-hover table-striped">
              <tr>
                 <th colspan="7"style="background-color:#E0FFFF"><?php echo $hari; ?></th>
               </tr>
                <tr>
                  <th>No</th>
                  <th>NIS</th>
                  <th>Nama Siswa</th>
                  <th>Kelas</th>
                  <th>Point Awal</th>
                  <th>Point Akhir</th>
                  <th>Jumlah Kasus</th>
                </tr>

      <?php
       if(!ISSET($_POST['cari'])){
        $no= 1;
        $query="SELECT * FROM tab_point_siswa as p JOIN tab_siswa as s ON p.nis=s.nis JOIN tab_kelas as k ON s.id_kelas=k.id_kelas ORDER BY point_akhir ASC";
        
        $data=mysqli_query($koneksi,$query);
        if($data==FALSE){
              die(mysqli_error($koneksi));}
        if(mysqli_num_rows($data) > 0){
          while($row=mysqli_fetch_assoc($data)){
        
            
      ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $row['nis']; ?></td>
                  <td><?php echo $row['nama_siswa']; ?></td>
                  <td><?php echo $row['kode_kelas']; ?></td>
                  <td><?php echo $row['point_awal']; ?></td>
                  <td><?php echo $row['point_akhir']; ?></td>
                  <td><?php echo $row['jumlah_kasus']; ?></td>
                </tr>
           <?php
          }
        }
      }
       ?>  
                  
        <?php
       if(ISSET($_POST['cari'])){
         $no= 1;
        $cari=mysqli_real_escape_string($koneksi,$_POST['txtcari']);
        $perintah="SELECT * FROM tab_point_siswa as p JOIN tab_siswa as s ON p.nis=s.nis JOIN tab_kelas as k ON s.id_kelas=k.id_kelas  WHERE s.nis LIKE '%$cari%' OR s.nama_siswa LIKE '%$cari%'" ;
         $da=mysqli_query($koneksi,$perintah)or die (mysqli_error($koneksi));;
        
          if(mysqli_num_rows($da) > 0){
           while($row=mysqli_fetch_assoc($da)){
        ?>
          <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $row['nis']; ?></td>
                  <td><?php echo $row['nama_siswa']; ?></td>
                  <td><?php echo $row['kode_kelas']; ?></td>
                  <td><?php echo $row['point_awal']; ?></td>
                  <td><?php echo $row['point_akhir']; ?></td>
                  <td><?php echo $row['jumlah_kasus']; ?></td>
                </tr>
                 <?php
       }
       ?>   
           </table>  
        </div> 
          <?php
    

  }else{
    
     echo"<script>alert('Maaf data tidak ditemukan!')</script>";
     echo"<script>location='point_siswa.php';</script>";
   }
  }


  ?>