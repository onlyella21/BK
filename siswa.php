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
            <h1>Siswa</h1>
            <ol class="breadcrumb">
              <li class="active"> Master Data</li>
              <li class="active">Siswa</li>
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
                    <input type="text" class="form-control" name="txtcari" id="txtcari" placeholder="NIS atau Nama Siswa atau Kelas">
                </div>
         
         
                    <input type="submit" align="right" class="btn btn-success"  value="Cari" name="cari" id="cari">
                    
                </div>
              </div>
</div>
</form>
 </div>
          

            <div class="table-responsive-sm">
              <table class="table table-bordered table-hover table-striped">
                <tr>
                  <th>NO</th>
                  <th>NIS</th>
                  <th>Nama Siswa</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>No Telpon</th>
                   <th>Angkatan</th>
                  <th>Kelas</th>
                  <th>Foto</th>
                 <th><a href="tambah_siswa.php" type="button" align="right" class="btn btn-success">Tambah Data</a></th>
                </tr>
 <?php
      if(!ISSET($_POST['cari'])){
        $no= 1;
       $query="SELECT * FROM tab_siswa as s JOIN tab_kelas as k ON s.id_kelas=k.id_kelas ";
        $data=mysqli_query($koneksi,$query);
        if(mysqli_num_rows($data) > 0){

          while($row=mysqli_fetch_assoc($data)){
        
      ?>
                <tr>
                  <td align="center"><?php echo $no++; ?></td>
                  <td><?php echo $row['nis']; ?></td>
                  <td><?php echo $row['nama_siswa']; ?></td>
                  <td><?php echo $row['jenis_kelamin']; ?></td>
                  <td><?php echo $row['alamat']; ?></td>
                  <td><?php echo $row['no_telp_siswa']; ?></td>
                  <td><?php echo $row['angkatan']; ?></td>
                  <td><?php echo $row['kode_kelas']; ?></td>
                   <?php echo"<td><img src='assets/img/siswa/".$row['foto']."' width='50' height='50'></td>";?>
  
                   <td colspan="2" style="text-align: center;">
                    <a   href="edit_siswa.php?id=<?php echo $row['id_siswa'];?>" type="button" class="btn btn-info btn-xs"><i class="fa fa-edit"></i>Edit</a>
                     <a   href="detail_siswa.php?id=<?php echo $row['id_siswa'];?>" type="button" class="btn btn-warning btn-xs">Detail</a>
                      
                    <a onclick="return confirm('Anda Yakin akan menghapus data?')" href="hapus_siswa.php?id=<?php echo $row['id_siswa'];?>" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Hapus</a>
                    </td>
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
        $perintah="SELECT * FROM tab_siswa as s JOIN tab_kelas as k ON s.id_kelas=k.id_kelas WHERE s.nis LIKE '%$cari%' OR s.nama_siswa LIKE '%$cari%' OR kode_kelas LIKE '%$cari%'" ;
         $da=mysqli_query($koneksi,$perintah)or die (mysqli_error($koneksi));;
        
          if(mysqli_num_rows($da) > 0){
           while($r=mysqli_fetch_assoc($da)){
        ?>
        
         <tr>
                  <td align="center"><?php echo $no++; ?></td>
                  <td><?php echo $r['nis']; ?></td>
                  <td><?php echo $r['nama_siswa']; ?></td>
                  <td><?php echo $r['jenis_kelamin']; ?></td>
                  <td><?php echo $r['alamat']; ?></td>
                  <td><?php echo $r['no_telp_siswa']; ?></td>
                  <td><?php echo $r['angkatan']; ?></td>
                  <td><?php echo $r['kode_kelas']; ?></td>
                   <?php echo"<td><img src='assets/img/siswa/".$r['foto']."' width='50' height='50'></td>";?>

  
                   <td colspan="2" style="text-align: center;">
                    <a   href="edit_siswa.php?id=<?php echo $r['id_siswa'];?>" type="button" class="btn btn-info btn-xs"><i class="fa fa-edit"></i>Edit</a>
                    <a   href="detail_siswa.php?id=<?php echo $row['id_siswa'];?>" type="button" class="btn btn-warning btn-xs">Detail</a>
                      
                    <a onclick="return confirm('Anda Yakin akan menghapus data?')" href="hapus_siswa.php?id=<?php echo $r['id_siswa'];?>" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Hapus</a>
       </td>
       </tr>    
       <?php
       }
       ?>   
           </table>  
        </div> 
          <?php
    

  }else{
    
     echo"<script>alert('Maaf data tidak ditemukan!')</script>";
     echo"<script>location='siswa.php';</script>";
   }
  }


  ?>




