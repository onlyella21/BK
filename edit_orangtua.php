
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
              <li class="active">Edit Data Orang Tua</li>
            </ol>
          </div>
      </div>
          


               <div class="row" id="contentJurusan">
                    <div class="col-lg-12">
           

                  <?php
                  if(isset($_GET['id'])){

                   $id=($_GET['id']);

 
                      $query="SELECT * FROM tab_ortu as o JOIN tab_siswa as s ON o.nis=s.nis where id_ortu='$id'";
                      $result=mysqli_query($koneksi,$query);
                      if(!$result){
                        die("query error:".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
                      }

                      $data=mysqli_fetch_assoc($result);
                     
                  }else{
                    //apabila tidak ada GET id akan di redirect ke jurusan.php
                    header("location:index.php");
                  }
                  ?>
        
       <form  action="aksiEdit_orangtua.php" class="form-horizontal" method="POST">
                  <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-3" for="txtid" control-label">ID Ortu</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txtid" id="txtid" value="<?php echo $id; ?>" readonly>
                </div>
              </div>
              <div class="form-group form-group-sm">
                    <input type="hidden" class="form-control" name="txtnis" id="txtnis"  value="<?php echo $data['nis']; ?>">
                    <label class=" control-label col-sm-3" for="txtsiswa" control-label">Nama Siswa</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txtsiswa" id="txtisiswa" readonly  value="<?php echo $data['nama_siswa']; ?>">
                </div>
              </div>

              <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-3" for="txtayah" control-label">Nama Ayah</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txtayah" id="txtayah" value="<?php echo $data['nama_ayah']; ?>"  value="<?php echo $data['nis']; ?>" required>
                </div>
              </div>

              <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-3" for="txtno" control-label">Nama Telpon</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" name="txtno" id="txtno"  value="<?php echo $data['no_telpon_ortu']; ?>" required>
                </div>
              </div>

              <div class="form-group form-group=sm">
                    <center><button type="reset" align="right" class="btn btn-danger">Reset</button>
                    <input type="submit" align="right" class="btn btn-success"  value="Simpan" name="edit"></center>
                </div>
                
                
              

      
      

 </table>  
        </div>
     
       
      </div>
      </div>
</div>
 </form>
</div>



