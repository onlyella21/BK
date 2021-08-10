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
            <h1>Pelanggaran</h1>
            <ol class="breadcrumb">
              <li class="active"> Master Data</li>
              <li class="active">Pelanggaran</li>
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
                    <input type="text" class="form-control" name="txtcari" id="txtcari" placeholder="Kategori atau Nama pelanggaran">
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
                  <th>Nama Pelanggaran</th> 
                  <th>Kategori</th>
                  <th>Point</th> 
                 <th style="text-align: center;"><a href="tambah_pelanggaran.php" type="button" s class="btn btn-success">Tambah Data</a></th>
                </tr>

      <?php
       if(!ISSET($_POST['cari'])){
        $no= 1;
        $query="SELECT * FROM tab_pelanggaran as p JOIN tab_kategoripelanggaran as k ON p.id_tipe=k.id_tipe ";
        
        $data=mysqli_query($koneksi,$query);
        if($data==FALSE){
              die(mysqli_error($koneksi));}

          while($row=mysqli_fetch_assoc($data)){
        
      ?>
                <tr>
                  <td align="center"><?php echo $no++; ?></td>
                   <td><?php echo $row['nama_pelanggaran']; ?></td>
                  <td><?php echo $row['tipe_pelanggaran']; ?></td>
                  <td><?php echo $row['pengurangan_point']; ?></td>
                 
  
                   <td colspan="2" style="text-align: center;">
                    <a   href="edit_pelanggaran.php?id=<?php echo $row['id_pelanggaran'];?>" type="button" class="btn btn-info btn-xs"><i class="fa fa-edit"></i>Edit</a>
                      
                    <a onclick="return confirm('Anda Yakin akan menghapus data?')" href="hapus_pelanggaran.php?id=<?php echo $row['id_pelanggaran'];?>" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Hapus</a>
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
        $perintah="SELECT * FROM tab_pelanggaran as p JOIN tab_kategoripelanggaran as k ON p.id_tipe=k.id_tipe WHERE p.nama_pelanggaran LIKE '%$cari%' OR k.tipe_pelanggaran LIKE '%$cari%'" ;
         $da=mysqli_query($koneksi,$perintah)or die (mysqli_error($koneksi));;
        
          if(mysqli_num_rows($da) > 0){
           while($row=mysqli_fetch_assoc($da)){
        ?>
         <tr>
                  <td align="center"><?php echo $no++; ?></td>
                   <td><?php echo $row['nama_pelanggaran']; ?></td>
                  <td><?php echo $row['tipe_pelanggaran']; ?></td>
                  <td><?php echo $row['pengurangan_point']; ?></td>
                 
  
                   <td colspan="2" style="text-align: center;">
                    <a   href="edit_pelanggaran.php?id=<?php echo $row['id_pelanggaran'];?>" type="button" class="btn btn-info btn-xs"><i class="fa fa-edit"></i>Edit</a>
                      
                    <a onclick="return confirm('Anda Yakin akan menghapus data?')" href="hapus_pelanggaran.php?id=<?php echo $row['id_pelanggaran'];?>" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Hapus</a>
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
     echo"<script>location='pelanggaran.php';</script>";
   }
  }


  ?>

        


