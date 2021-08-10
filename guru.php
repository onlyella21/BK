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
            <h1>Guru</h1>
            <ol class="breadcrumb">
              <li class="active"> Master Data</li>
              <li class="active">Guru</li>
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
                    <input type="text" class="form-control" name="txtcari" id="txtcari" placeholder="Nama Guru">
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
                  <th>NIP</th>
                  <th>Nama Guru</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>No Telpon</th>
                  <th>Foto</th>
                  
                  
                 <th style="text-align: center;"><a href="tambah_guru.php" type="button" s class="btn btn-success">Tambah Data</a></th>
                </tr>

      
       <?php
      if(!ISSET($_POST['cari'])){
        $no= 1;
        $query="SELECT * FROM tab_guru";
        $data=mysqli_query($koneksi,$query);
        if($data==FALSE){
              die(mysqli_error($koneksi));}

          while($row=mysqli_fetch_assoc($data)){
        
      ?>
                <tr>
                  <td align="center"><?php echo $no++; ?></td>
                  <td><?php echo $row['nip']; ?></td>
                  <td><?php echo $row['nama_guru']; ?></td>
                  <td><?php echo $row['jenis_kelamin']; ?></td>
                   <td><?php echo $row['alamat']; ?></td>
                    <td><?php echo $row['no_tlp']; ?></td>
                     <?php echo"<td><img src='assets/img/guru/".$row['foto_guru']."' width='50' height='50'></td>";?>
  
                   <td colspan="2" style="text-align: center;">
                    <a   href="edit_guru.php?id=<?php echo $row['id_guru'];?>" type="button" class="btn btn-info btn-xs"><i class="fa fa-edit"></i>Edit</a>
                      
                    <a onclick="return confirm('Anda Yakin akan menghapus data?')" href="hapus_guru.php?id=<?php echo $row['id_guru'];?>" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Hapus</a>
                  </td>
                </tr>
         <?php
          }
        }
      
        
       if(ISSET($_POST['cari'])){
         $no= 1;
        $cari=mysqli_real_escape_string($koneksi,$_POST['txtcari']);
        $perintah="SELECT * FROM tab_guru WHERE nama_guru LIKE '%$cari%'" ;
         $da=mysqli_query($koneksi,$perintah)or die (mysqli_error($koneksi));;
        
          if(mysqli_num_rows($da) > 0){
           while($row=mysqli_fetch_assoc($da)){
        ?> 
             
          <tr>
                  <td align="center"><?php echo $no++; ?></td>
                  <td><?php echo $row['nip']; ?></td>
                  <td><?php echo $row['nama_guru']; ?></td>
                  <td><?php echo $row['jenis_kelamin']; ?></td>
                   <td><?php echo $row['alamat']; ?></td>
                    <td><?php echo $row['no_tlp']; ?></td>
                     <?php echo"<td><img src='assets/img/guru/".$row['foto_guru']."' width='50' height='50'></td>";?>
  
                   <td colspan="2" style="text-align: center;">
                    <a   href="edit_guru.php?id=<?php echo $row['id_guru'];?>" type="button" class="btn btn-info btn-xs"><i class="fa fa-edit"></i>Edit</a>
                      
                    <a onclick="return confirm('Anda Yakin akan menghapus data?')" href="hapus_guru.php?id=<?php echo $row['id_guru'];?>" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Hapus</a>
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
     echo"<script>location='guru.php';</script>";
   }
  }


  ?>

