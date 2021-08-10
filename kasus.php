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
            <h1>Kasus Siswa</h1>
            <ol class="breadcrumb">
              <li class="active"> Master Data</li>
              <li class="active">Kasus Siswa</li>
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
                    <input type="text" class="form-control" name="txtcari" id="txtcari" placeholder="Nama Siswa atau Kelas atau">
                </div>
         
         
                    <input type="submit" align="right" class="btn btn-success"  value="Cari" name="cari" id="cari">
                    
                </div>
              </div>
</div>
</form>
 </div>

      <div class="table-responsive-sm">
              <table class="table table-bordered  table-hover table-striped">
                <tr>
                  <th><a href="tambah_kasus.php" type="button" align="right" class="btn btn-success">Tambah Data</a></th>
                </tr>
                <tr>
                  <th>Kode Kasus</th>
                  <th>Tanggal</th>
                  <th>Nama Siswa</th> 
                  <th>Kelas </th>
                  <th>Pelanggaran</th>
                  <th>Minus Point</th> 
                 
                </tr>

      <?php
      if(!ISSET($_POST['cari'])){
        $no= 1;
        $query="SELECT * FROM tab_kasus as k JOIN tab_siswa as s ON k.nis=s.nis JOIN tab_kelas as e ON e.id_kelas=s.id_kelas JOIN tab_pelanggaran as p ON k.id_pelanggaran=p.id_pelanggaran";
        
        $data=mysqli_query($koneksi,$query);
        if($data==FALSE){
              die(mysqli_error($koneksi));}
            
          while($row=mysqli_fetch_assoc($data)){
         $t=$row['tgl_kasus']; 
             $tgl=date("d-n-y",strtotime($t));
      ?>
                <tr>
 
                   <td><?php echo $row['kode_kasus']; ?></td>
                  <td><?php echo $tgl; ?></td>
                  <td><?php echo $row['nama_siswa']; ?></td>
                  <td><?php echo $row['kode_kelas']; ?></td>
                  <td><?php echo $row['nama_pelanggaran']; ?></td>
                  <td><?php echo $row['pengurangan_point']; ?></td>
                </tr>
          <?php
          }
        }
         
       if(ISSET($_POST['cari'])){
         $no= 1;
        $cari=mysqli_real_escape_string($koneksi,$_POST['txtcari']);
        $perintah="SELECT * FROM tab_kasus as k JOIN tab_siswa as s ON k.nis=s.nis JOIN tab_kelas as e ON e.id_kelas=s.id_kelas JOIN tab_pelanggaran as p ON k.id_pelanggaran=p.id_pelanggaran WHERE s.nama_siswa LIKE '%$cari%' OR kode_kelas LIKE '%$cari%'" ;
         $da=mysqli_query($koneksi,$perintah)or die (mysqli_error($koneksi));;
        
          if(mysqli_num_rows($da) > 0){
           while($row=mysqli_fetch_assoc($da)){
             $t=$row['tgl_kasus']; 
             $tgl=date("d-n-y",strtotime($t));
        ?>
        <tr>
 
                   <td><?php echo $row['kode_kasus']; ?></td>
                  <td><?php echo $tgl; ?></td>
                  <td><?php echo $row['nama_siswa']; ?></td>
                  <td><?php echo $row['kode_kelas']; ?></td>
                  <td><?php echo $row['nama_pelanggaran']; ?></td>
                  <td><?php echo $row['pengurangan_point']; ?></td>
                </tr>

       <?php
       }
       ?>   
           </table>  
        </div> 
          <?php
    

  }else{
    
     echo"<script>alert('Maaf data tidak ditemukan!')</script>";
     echo"<script>location='kasus.php';</script>";
   }
  }

             




               