
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
            <h1>Jurusan</h1>
            <ol class="breadcrumb">
              <li class="active"> Master Data</li>
              <li class="active">Jurusan</li>
            </ol>
          </div>
      </div>
          <div class="panel panel-info">
					<div class="panel-heading-none">
					</div>
					<div class="panel-body">
          <form method="POST" action="simpan_jurusan.php" id="formJur">
          <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-2" for="kode_jurusan">Kode Jurusan</label>
                    <div class="col-sm-2">
                    <input type="text" class="form-control" name="kode_jurusan" id="kode_jurusan" required>
                </div>
                <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-2" for="nama_jurusan">Nama Jurusan</label>
                    <div class="col-sm-2">
                    <input type="text" class="form-control" name="nama_jurusan" id="nama_jurusan" required>
                </div>
         
         </div>
          <button type="reset" align="right" class="btn btn-danger">Reset</button>
                    <input type="submit" align="right" class="btn btn-success"  value="Simpan" name="simpan" id="simpan">
                </div>

               
         
      </div>
</div>
 </form>



               <div class="row" id="contentJurusan">
                    <div class="col-lg-12">
            <div class="table-responsive-sm">
              <table class="table table-bordered table-hover table-striped">
                <tr>
                  <th>NO</th>
                  <th>Kode Jurusan</th>
                  <th>Nama Jurusan</th>
                  <th>Opsi</th>
                </tr>

      <?php
        $no= 1;
        $query="SELECT * FROM tab_jurusan";
        $data=mysqli_query($koneksi,$query);
        if(mysqli_num_rows($data) > 0){

          while($row=mysqli_fetch_assoc($data)){
        
      ?>
                <tr>
                  <td align="center"><?php echo $no++; ?></td>
                  <td><?php echo $row['kode_jurusan']; ?></td>
                  <td><?php echo $row['nama_jurusan']; ?></td>
                  
                  <td colspan="2" style="text-align: center;">
                    <a   href="editJurusan.php?id=<?php echo $row['kode_jurusan'];?>" type="button" class="btn btn-info btn-xs"><i class="fa fa-edit"></i>Edit</a>
                      
  <a onclick="return confirm('Anda Yakin akan menghapus data?')" href="hapus_jurusan.php?id=<?php echo $row['kode_jurusan'];?>" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Hapus</a>
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