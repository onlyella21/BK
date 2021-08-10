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

  $id=mysqli_real_escape_string($koneksi,$_GET['id']);

                      $query="SELECT * FROM tab_kelas as k JOIN tab_guru as g ON k.id_guru=g.id_guru JOIN tab_jurusan as j ON k.kode_jurusan=j.kode_jurusan where id_kelas='$id' ";
                     
                      $result=mysqli_query($koneksi,$query);
                      if(!$result){
                        die("query error:".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
                      }

                      $data=mysqli_fetch_assoc($result);
                      $kode=$data["kode_kelas"];
                      
                      $kode_jurusan=$data["kode_jurusan"];
                      $tingkat=$data["tingkat"];
                      $huruf=$data["huruf"];
                      $tahun=$data["tahun_pelajaran"];
                      $id_guru=$data["id_guru"];
                      $nama_guru=$data["nama_guru"];
                  }else{
                    //apabila tidak ada GET id akan di redirect ke jurusan.php
                    header("location:index.php");
                  }

?>


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
              <li class="active"> Master Data >></li>
               <li class="active">Kelas >></li>
              <li class="active">Edit Kelas</li>
            </ol>
          
    <div class="col-lg-12">
	 <form  action="aksiEdit_kelas.php" class="form-horizontal" method="POST">
	 	<center></center>
	 	<div class="form-group form-group-sm">
       <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id;?>">
       
                    <label class=" control-label col-sm-2" for="txtkode">Kode Kelas</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" name="txtkode" id="txtkode" readonly>
                </div>
         </div>
         
         <div class="form-group form-group-sm">
                    <label class="control-label col-sm-2" for="cbjur">Jurusan</label>
                    <div class="col-sm-3">
                      
                   <select name="cbjur" class="form-control" id="cbjur"required>
                   <?php
                   $q=mysqli_query($koneksi,"SELECT * FROM tab_jurusan");
                   
                   while($a=mysqli_fetch_assoc($q)){
                    if($kode_jurusan==$a['kode_jurusan']){
                      echo'<option value="'.$a['kode_jurusan'].'" selected>'.$a['nama_jurusan'].'</option>';
                     
                    }else{
                       echo'<option value="'.$a['kode_jurusan'].'">'.$a['nama_jurusan'].'</option>';
                       
                       
                    }
                   
                   }
                 
                 ?>
             </select>
                </div>
                </div>

                  
                 
              <div class="form-group form-group-sm">
                  <label class=" control-label col-sm-2" for="tingkat">Tingkat</label>
                   <div class="col-sm-2">
                    <select name="tingkat" class="form-control" id="tingkat"required>
                    <option value="">Pilih</option>
                    <option value="X"<?php if($tingkat=='X'){echo 'selected';}?>>X</option>
                    <option value="XI"<?php if($tingkat=='XI'){echo 'selected';}?>>XI</option>
                    <option value="XII"<?php if($tingkat=='XII'){echo 'selected';}?>>XII</option>
                    </select>
                  </div>
                 </div>
                  <div class="form-group form-group-sm">
                  <label class=" control-label col-sm-2" for="txthuruf">Huruf</label>
                   <div class="col-sm-2">
                    <input type="text" class="form-control" name="txthuruf" id="txthuruf" maxlength="1" value=<?php echo $huruf;?> required>
                  </div>
                 </div>
                  <div class="form-group form-group-sm">
                    <label class="control-label col-sm-2" for="tahun">Tahun Pelajaran</label>
                    <div class="col-sm-2">
                    <input type="text" class="form-control" name="tahun" id="tahun" maxlength="4" value=<?php echo $tahun;?> required>
                </div>
                </div>
                  <div class="form-group form-group-sm">
                  <label class=" control-label col-sm-2" for="guru">Wali Kelas</label>
                   <div class="col-sm-3">


                    <select name="guru" class="form-control" id="guru"required>
                    
                     <?php
                   $q=mysqli_query($koneksi,"SELECT * FROM tab_guru");
                   while($a=mysqli_fetch_assoc($q)){
                    if($id_guru==$a['id_guru']){
                      echo'<option value="'.$a['id_guru'].'" selected>'.$a['nama_guru'].'</option>';
                    }else{
                       echo'<option value="'.$a['id_guru'].'">'.$a['nama_guru'].'</option>';
                    }
                   }
                 
                 ?>
             </select>
                </div>
                </div>
               
                  <div class="col-xs-10 col-xs-offset-3">
                 <button type="reset" align="right" class="btn btn-danger">Reset</button>
                  <input type="submit" align="right" class="btn btn-success"  value="Simpan" name="simpan">
              </div>
                  </form>

