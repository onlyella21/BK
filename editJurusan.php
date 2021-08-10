
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
if(isset($_GET['id'])){

	$id=($_GET['id']);

 
                      $query="SELECT * FROM tab_jurusan where kode_jurusan='$id'";
                      $result=mysqli_query($koneksi,$query);
                      if(!$result){
                      	die("query error:".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
                      }

                      $data=mysqli_fetch_assoc($result);
                      $kode=$data["kode_jurusan"];
                      $nama=$data["nama_jurusan"];
                  }else{
                  	//apabila tidak ada GET id akan di redirect ke jurusan.php
                  	header("location:index.php");
                  }

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
              <li class="active">Edit Jurusan</li>
            </ol>
          </div>
      </div>
          <div class="panel panel-info">
					<div class="panel-heading-none">
					</div>
					<div class="panel-body">
          <form method="POST" action="aksiedit_jurusan.php" id="formJur">

          	<?php
				require_once('koneksi.php');
				if(isset($_GET['id'])){

					$id=mysqli_real_escape_string($koneksi,$_GET['id']);

 
                      $query="SELECT * FROM tab_jurusan where kode_jurusan='$id'";
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
          <div class="form-group form-group-sm">
          			    <input type="hidden" class="form-control" name="kode" id="kode_jurusan" value="<?php echo $data['kode_jurusan'];?>">
                    <label class=" control-label col-sm-2" for="kode_jurusan">Kode Jurusan</label>
                    <div class="col-sm-2">
                    <input type="text" class="form-control" name="kode_jurusan" id="kode_jurusan" value="<?php echo $data['kode_jurusan'];?>">
                </div>
                <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-2" for="nama_jurusan">Nama Jurusan</label>
                    <div class="col-sm-2">
                    <input type="text" class="form-control" name="nama_jurusan" id="nama_jurusan" value="<?php echo $data['nama_jurusan'];?>">
                </div>
         
         </div>
          <button type="reset" align="right" class="btn btn-danger">Reset</button>
                    <input type="submit" align="right" class="btn btn-success"  value="Update" name="edit" id="edit">
                </div>

               
         
      </div>
</div>
 </form>



           

      


