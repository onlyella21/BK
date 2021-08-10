
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
            <h1>Orang Tua</h1>
            <ol class="breadcrumb">
              <li class="active"> Master Data</li>
              <li class="active">Orang Tua</li>
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


               <div class="row" id="contentJurusan">
                    <div class="col-lg-12">
            <div class="table-responsive-sm">
              <table class="table table-bordered table-hover table-striped">
                <tr>
                  <th>NO</th>
                  <th>ID Ortu</th>
                  <th>Nama Ayah</th>
                  <th>Nama Siswa</th>
                  <th>No Telephone</th>
                  <th style="text-align: center;"><a href="tambah_orangtua.php" type="button" align="right" class="btn btn-success">Tambah Data</a></th>
                </tr>

      <?php
      if(!ISSET($_POST['cari'])){
        $no= 1;
        $query="SELECT * FROM tab_ortu as o JOIN tab_siswa as s ON o.nis=s.nis" ;
        $data=mysqli_query($koneksi,$query);
        if(mysqli_num_rows($data) > 0){

          while($row=mysqli_fetch_assoc($data)){
        
      ?>
                <tr>
                  <td align="center"><?php echo $no++; ?></td>
                  <td><?php echo $row['id_ortu']; ?></td>
                  <td><?php echo $row['nama_ayah']; ?></td>
                  <td><?php echo $row['nama_siswa']; ?></td>
                  <td><?php echo $row['no_telpon_ortu']; ?></td>
                  
                  <td colspan="2" style="text-align: center;">
                    <a   href="edit_orangtua.php?id=<?php echo $row['id_ortu'];?>" type="button" class="btn btn-info btn-xs"><i class="fa fa-edit"></i>Edit</a>
                      
  
                </tr>
          <?php
          require_once('koneksi.php');
          }
        }
      }
      if(ISSET($_POST['cari'])){
         $no= 1;
        $cari=mysqli_real_escape_string($koneksi,$_POST['txtcari']);
        $perintah="SELECT * FROM tab_ortu as o JOIN tab_siswa as s ON o.nis=s.nis WHERE id_ortu LIKE '%$cari%' OR o.nis LIKE '%$cari%' OR nama_ayah LIKE '%$cari%' OR nama_siswa LIKE '%$cari%'" ;
         $da=mysqli_query($koneksi,$perintah)or die (mysqli_error($koneksi));;
        if(mysqli_num_rows($da)>0){

          while($r=mysqli_fetch_array($da)){
        ?>
       <tr>
                  <td align="center"><?php echo $no++; ?></td>
                  <td><?php echo $r['id_ortu']; ?></td>
                  <td><?php echo $r['nama_ayah']; ?></td>
                  <td><?php echo $r['nama_siswa']; ?></td>
                  <td><?php echo $r['no_telpon_ortu']; ?></td>
                   <td colspan="2" style="text-align: center;">
                  <a   href="edit_orangtua.php?id=<?php echo $r['id_ortu'];?>" type="button" class="btn btn-info btn-xs"><i class="fa fa-edit"></i>Edit</a></td>
                      
                      <?php
                    }
                    ?>
                </tr>
                 </table>  
</div>             

      
      
      <?php
    

  }else
    {
     echo"<script>alert('Maaf data tidak ditemukan!')</script>";
     echo"<script>location='orangtua.php';</script>";
  }
}
  ?>


        </div>
     
       
      </div>
      </div>
</div>
 </form>
</div>



