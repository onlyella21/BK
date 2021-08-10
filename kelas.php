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
            <h1>Kelas</h1>
            <ol class="breadcrumb">
              <li class="active"> Master Data</li>
              <li class="active">Kelas</li>
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
                    <input type="text" class="form-control" name="txtcari" id="txtcari" placeholder="Kelas atau Nama Wali kelas">
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
                  <th>Kode Kelas</th>
                   <th>KodeJurusan</th>
                  <th>Tahun Pelajaran</th>
                  <th>Wali kelas</th>
                  
                 <th style="text-align: center;"><a href="tambah_kelas.php" type="button" s class="btn btn-success">Tambah Data</a></th>
                </tr>

      <?php
      if(!ISSET($_POST['cari'])){
        $no= 1;
        $query="SELECT * FROM tab_kelas as k JOIN tab_guru as g ON k.id_guru=g.id_guru JOIN tab_jurusan as j ON k.kode_jurusan=j.kode_jurusan ";
        $data=mysqli_query($koneksi,$query);
        if($data==FALSE){
              die(mysqli_error($koneksi));}

          while($row=mysqli_fetch_assoc($data)){
        
      ?>
                <tr>
                  <td align="center"><?php echo $no++; ?></td>
                  <td><?php echo $row['kode_kelas']; ?></td>
                   <td><?php echo $row['kode_jurusan']; ?></td>
                  <td><?php echo $row['tahun_pelajaran']; ?></td>
                  <td><?php echo $row['nama_guru']; ?></td>
  
                   <td colspan="2" style="text-align: center;">
                    <a   href="edit_kelas.php?id=<?php echo $row['id_kelas'];?>" type="button" class="btn btn-info btn-xs"><i class="fa fa-edit"></i>Edit</a>
                      
                    <a onclick="return confirm('Anda Yakin akan menghapus data?')" href="hapus_kelas.php?id=<?php echo $row['id_kelas'];?>" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Hapus</a>
                  </td>
                </tr>
              
          <?php
          }
        
      }

       ?>  
              
         <?php
       if(ISSET($_POST['cari'])){
         $no= 1;
        $cari=mysqli_real_escape_string($koneksi,$_POST['txtcari']);
        $perintah="SELECT * FROM tab_kelas as k JOIN tab_guru as g ON k.id_guru=g.id_guru JOIN tab_jurusan as j ON k.kode_jurusan=j.kode_jurusan WHERE k.kode_kelas LIKE '%$cari%' OR g.nama_guru LIKE '%$cari%'" ;
         $da=mysqli_query($koneksi,$perintah)or die (mysqli_error($koneksi));;
        
          if(mysqli_num_rows($da) > 0){
           while($row=mysqli_fetch_assoc($da)){
        ?>

<tr>
                  <td align="center"><?php echo $no++; ?></td>
                  <td><?php echo $row['kode_kelas']; ?></td>
                   <td><?php echo $row['kode_jurusan']; ?></td>
                  <td><?php echo $row['tahun_pelajaran']; ?></td>
                  <td><?php echo $row['nama_guru']; ?></td>
  
                   <td colspan="2" style="text-align: center;">
                    <a   href="edit_kelas.php?id=<?php echo $row['id_kelas'];?>" type="button" class="btn btn-info btn-xs"><i class="fa fa-edit"></i>Edit</a>
                      
                    <a onclick="return confirm('Anda Yakin akan menghapus data?')" href="hapus_kelas.php?id=<?php echo $row['id_kelas'];?>" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Hapus</a>
                  </td>
                </tr>
              
          
            
               <?php
          }
      
             ?> 
        </div>
        <?php
       }else{
    
     echo"<script>alert('Maaf data tidak ditemukan!')</script>";
     echo"<script>location='kelas.php';</script>";
   }
  }


  ?>
  </table>  