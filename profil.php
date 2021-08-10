
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
            <h1>Profil</h1>
            <ol class="breadcrumb">
              
            </ol>
          </div>
      </div>
          <div class="panel panel-info">
					<div class="panel-heading-none">
            
					</div>
					<div class="panel-body">
          <div class="table-responsive-sm">
              <table class="table table-bordered table-hover table-striped">
                <tr>
                  <th>NO</th>
                  <th>NIS</th>
                  <th>Nama Siswa</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>No Telpon</th>
                  <th>Kelas</th>
                  <th>Foto</th>
                 
                </tr>
 <?php
      
       $query="SELECT * FROM tab_siswa as s JOIN tab_kelas as k ON s.id_kelas=k.id_kelas ";
        $data=mysqli_query($koneksi,$query);
        if(mysqli_num_rows($data) > 0){

          while($row=mysqli_fetch_assoc($data)){
        
      ?>
                <tr>
                  
                  <td><?php echo $row['nis']; ?></td>
                  <td><?php echo $row['nama_siswa']; ?></td>
                  <td><?php echo $row['jenis_kelamin']; ?></td>
                  <td><?php echo $row['alamat']; ?></td>
                  <td><?php echo $row['no_telp_siswa']; ?></td>
                  <td><?php echo $row['kode_kelas']; ?></td>
                   <?php echo"<td><img src='assets/img/siswa/".$row['foto']."' width='50' height='50'></td>";?>
  
                   <td colspan="2" style="text-align: center;">
                    <a   href="edit_siswa.php?id=<?php echo $row['id_siswa'];?>" type="button" class="btn btn-info btn-xs"><i class="fa fa-edit"></i>Edit</a>
                      
                    <a onclick="return confirm('Anda Yakin akan menghapus data?')" href="hapus_siswa.php?id=<?php echo $row['id_siswa'];?>" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Hapus</a>
                    </td>
                </tr>
               
          <?php
          }
        }
      
       ?>  



            