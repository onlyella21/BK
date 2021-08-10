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

                       
                      $query="SELECT * FROM tab_pelanggaran as e JOIN tab_kategoripelanggaran as o ON e.id_tipe=o.id_tipe where id_pelanggaran='$id'";
                      $result=mysqli_query($koneksi,$query);
                      if(!$result){
                        die("query error:".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
                      }

                      $data=mysqli_fetch_assoc($result);
                      $id=$data["id_pelanggaran"];
                      $nama=$data["nama_pelanggaran"];
                       $id_tipe=$data["id_tipe"];
                       $tipe=$data['tipe_pelanggaran'];
                       $point=$data['pengurangan_point'];

                      
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
            <h1>Pelanggaran</h1>
            <ol class="breadcrumb">
              <li class="active"> Master Data</li>
              <li class="active">Pelanggaran</li>
              <li class="active">Tambah Data Pelanggaran</li>
            </ol>
          
      
  


<form  action="aksiEdit_pelanggaran.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
                  <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id; ?>" required>
                  <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-3" for="txtnama" control-label">Nama Pelanggaran</label>
                    <div class="col-sm-7">
                    <input type="text" class="form-control" name="txtnama" id="txtnama" value="<?php echo $nama; ?>" required>
                </div>
              </div>
                <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3" for="txtkategori">Kategori</label>
                    <div class="col-sm-5">
                  <select name="cbkategori" class="form-control" id="cbkategori"required>
                    <?php
                   $q=mysqli_query($koneksi,"SELECT * FROM tab_kategoripelanggaran");
                   while($a=mysqli_fetch_assoc($q)){
                    if($id_tipe==$a['id_tipe']){
                      echo'<option value="'.$a['id_tipe'].'" selected>'.$a['tipe_pelanggaran'].'</option>';
                    }else{
                       echo'<option value="'.$a['id_tipe'].'">'.$a['tipe_pelanggaran'].'</option>';
                    }
                   }
                 
                 ?>
                    </select>  
                </div>
              </div>
              <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-3" for="txtpoint" control-label">Point</label>
                    <div class="col-sm-2">
                    <input type="number" class="form-control" name="txtpoint" id="txtpoint" value="<?php echo $point; ?>" required>
                </div>
              </div>


              		<div class="form-group form-group=sm">
                    <center><button type="reset" align="right" class="btn btn-danger">Reset</button>
                    <input type="submit" align="right" class="btn btn-success"  value="Simpan" name="simpan"></center>
                </div>
                
                </form>