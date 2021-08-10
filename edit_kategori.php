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
if(isset($_GET['id'])){

  $id=($_GET['id']);

 
                      $query="SELECT * FROM tab_kategoripelanggaran where id_tipe='$id'";
                      $result=mysqli_query($koneksi,$query);
                      if(!$result){
                        die("query error:".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
                      }

                      $data=mysqli_fetch_assoc($result);
                      $kate=$data["tipe_pelanggaran"];
                      
                  }else{
                    //apabila tidak ada GET id akan di redirect ke jurusan.php
                    header("location:index.php");
                  }

?>
</div><!-- /.navbar-collapse -->
      </nav>
 <div id="page-wrapper">
<div class="row" id="contentInput" >
          <div class="col-lg-12">
            <h1>Kategori Pelanggaran</h1>
            <ol class="breadcrumb">
              <li class="active"> Master Data</li>
              <li class="active">Kategori Pelanggaran</li>
            </ol>
          </div>
      </div>
      <div class="panel panel-info">
          <div class="panel-heading-none">
          </div>
          <div class="panel-body">
          <form method="POST" action="aksiEdit_kategori.php" id="formkate">
          <div class="form-group form-group-sm">
                    <input type="hidden" class="form-control" name="id" id="id" required value="<?php echo $id;?>">
                    <label class=" control-label col-sm-3" for="kategori">Kategori Pelanggaran</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" name="kategori" id="kategori" required value="<?php echo $kate;?>">
                </div>
                
         </div>
          <button type="reset" align="right" class="btn btn-danger">Reset</button>
                    <input type="submit" align="right" class="btn btn-success"  value="Simpan" name="edit" id="edit">
                </div>

            </form>    
         
      </div>
          
            <div class="table-responsive-sm">
              <table class="table table-bordered table-hover table-striped">
                <tr>
                  <th>NO</th>
                  <th>Nama Kategori</th> 
                 <th>Opsi</th>
                </tr>

      <?php
        $no= 1;
        $query="SELECT * FROM tab_kategoripelanggaran";
        $data=mysqli_query($koneksi,$query);
        if($data==FALSE){
              die(mysqli_error($koneksi));}

          while($row=mysqli_fetch_assoc($data)){
        
      ?>
                <tr>
                  <td align="center"><?php echo $no++; ?></td>
                  <td><?php echo $row['tipe_pelanggaran']; ?></td>
                 
  
                   <td colspan="2" style="text-align: center;">
                    <a   href="edit_kategori.php?id=<?php echo $row['id_tipe'];?>" type="button" class="btn btn-info btn-xs"><i class="fa fa-edit"></i>Edit</a>
                      
                    <a onclick="return confirm('Anda Yakin akan menghapus data?')" href="hapus_kategori.php?id=<?php echo $row['id_tipe'];?>" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Hapus</a>
                  </td>
                </tr>
          <?php
          }
        
        ?>
              </table>  
        </div>
        


