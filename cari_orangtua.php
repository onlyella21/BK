
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
          <form method="GET" action="" id="cariOrtu">
          <div class="form-group form-group-sm">
                 
                <div class="form-group form-group-sm">
                   
                    <div class="col-sm-5">
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
                  <th>Opsi</th>
                </tr>

      <?php
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
                      
  <a onclick="return confirm('Anda Yakin akan menghapus data?')" href="hapus_orangtua.php?id=<?php echo $row['id_ortu'];?>" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Hapus</a>
                  </td>
                </tr>
          <?php
          }
        }
        ?>
</div>             

      
 

 </table>  
        </div>
     
       
      </div>
      </div>
</div>
 </form>
</div>



