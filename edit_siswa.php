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

 
                      $query="SELECT * FROM tab_siswa where id_siswa='$id'";
                      $result=mysqli_query($koneksi,$query);
                      if(!$result){
                        die("query error:".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
                      }


                      $data=mysqli_fetch_assoc($result);
                      $id_kelas=$data["id_kelas"];
                     
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
            <h1>Siswa</h1>
            <ol class="breadcrumb">
              <li class="active"> Master Data</li>
              <li class="active">Siswa</li>
              <li class="active">Edit Data Siswa</li>
            </ol>
          
      
  


<form  action="aksiEdit_siswa.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
                  <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $data['id_siswa'];?>">
                  <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-3" for="txtnis" control-label">NIS</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" name="txtnis" id="txtnis" value="<?php echo $data['nis'];?>" readonly>
                </div>
              </div>
                 <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Nama Siswa</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" name="txtnama" id="txtnama" value="<?php echo $data['nama_siswa'];?>" required >
                </div>
              </div>
                <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Jenis Kelamin</label>
                    <div class="col-sm-7">
                     <?php if($data['jenis_kelamin']=="Laki-Laki"){
                    echo"<input type='radio'  name='rbjk' class='form control' id='rbjk' value='Laki-Laki' checked='checked'>Laki-Laki";
                    echo"  <input type='radio'  name='rbjk' class='form control' id='perempuan' value='Perempuan'>Perempuan";}
                    else{
                      echo"<input type='radio'  name='rbjk' class='form control' id='rbjk' value='Laki-Laki' checked='checked'>Laki-Laki";
                    echo"  <input type='radio'  name='rbjk' class='form control' id='rbjk' value='Perempuan' checked='checked'>Perempuan";
                    }
                    ?>
                </div>
              </div>
                <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Alamat</label>
                    <div class="col-sm-4">
                    <textarea class="form-control" name="txtalamat" id="txtalamat" required><?php echo $data['alamat'];?></textarea>
                </div>
              </div>
                 <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">No Telpon</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" name="txtnotelp" id="txtnotelp" value="<?php echo $data['no_telp_siswa'];?>" required >
                </div>
              </div>
                <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Angkatan</label>
                    <div class="col-sm-2">
                   
                    <input type="text" class="form-control" maxlength="4" placeholder="Tahun" name="txtangkatan" id="txtangkatan" value="<?php echo $data['angkatan'];?>" readonly >
                </div>
                </div>
                
                
                 <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Kelas</label>
                    <div class="col-sm-4">
                    	                 <select name="kode_kelas" class="form-control" id="kode_kelas"required>
                   <?php
                   $q=mysqli_query($koneksi,"SELECT * FROM tab_kelas");
                   while($a=mysqli_fetch_assoc($q)){
                    if($id_kelas==$a['id_kelas']){
                      echo'<option value="'.$a['id_kelas'].'" selected>'.$a['kode_kelas'].'</option>';
                    }else{
                       echo'<option value="'.$a['id_kelas'].'">'.$a['kode_kelas'].'</option>';
                    }
                   }
                 
                 ?>
                    </select>
                  
                 
                    
                </div>

              </div>
              <div class="form-group form-group-sm">
                    <label class="control-label col-sm-3">Foto</label>
                    <div class="col-sm-5">
                       <input type="checkbox" name="ubah_foto" value="true">Ceklis jika ingin merubah Foto
                    <input type="file" class="form-control" name="fotosis" id="fotosis">
                </div>
              </div>
              		<div class="form-group form-group=sm">
              			
              		
                    <center><button type="reset" align="right" class="btn btn-danger">Reset</button>
                    <input type="submit" align="right" class="btn btn-success"  value="Simpan" name="edit"></center>
                </div>
                
                </form>