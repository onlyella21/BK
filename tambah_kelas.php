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
              <li class="active">Tambah Kelas</li>
            </ol>
          
    <div class="col-lg-12">
	 <form  action="simpan_kelas.php" class="form-horizontal" method="POST">
	 	<center></center>
	 	<div class="form-group form-group-sm">

                    <label class=" control-label col-sm-2" for="txtkode">Kode Kelas</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" name="txtkode" id="txtkode" readonly>
                </div>
         </div>
         
         <div class="form-group form-group-sm">
                    <label class="control-label col-sm-2" for="cbjur">Jurusan</label>
                    <div class="col-sm-3">
                       <select name="cbjur" class="form-control" id="cbjur"required>
                    <option value="">--Pilih--</option>
                   <?php
                $query="SELECT * FROM tab_jurusan";  
                 $data=mysqli_query($koneksi,$query);
                  if(mysqli_num_rows($data) > 0){

                    while($row=mysqli_fetch_assoc($data)){
                ?>
              <option value="<?php echo $row['kode_jurusan']?>"><?php echo $row['nama_jurusan']?></option>

                <?php
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
                    <option value="">--Pilih--</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                    </select>
                  </div>
                 </div>

                  <div class="form-group form-group-sm">
                  <label class=" control-label col-sm-2" for="txthuruf">Huruf</label>
                   <div class="col-sm-2">
                    <input type="text" class="form-control" name="txthuruf" id="txthuruf" maxlength="1" placeholder="Huruf A-Z" required>
                  </div>
                 </div>

                 <div class="form-group form-group-sm">
                    <label class="control-label col-sm-2" for="tahun">Tahun Pelajaran</label>
                    <div class="col-sm-2">
                    <input type="text" class="form-control" name="tahun" id="tahun" maxlength="4" placeholder="Tahun" required>
                </div>
                </div>

                 <div class="form-group form-group-sm">
                  <label class=" control-label col-sm-2" for="guru">Wali Kelas</label>
                   <div class="col-sm-3">


                    <select name="guru" class="form-control" id="guru"required>
                    <option value="">--Pilih--</option>
                    <?php
				        $query="SELECT * FROM tab_guru";  
				         $data=mysqli_query($koneksi,$query);
					        if(mysqli_num_rows($data) > 0){

					          while($row=mysqli_fetch_assoc($data)){
				        ?>
				      <option value="<?php echo $row['id_guru']?>"><?php echo $row['nama_guru']?></option>

				      	<?php
				         }	
				         } 
				         	?>
                    </select>
                  </div>
                 </div>
                 </div>
                
               

                
                  <div class="col-xs-10 col-xs-offset-3">
                 <button type="reset" align="right" class="btn btn-danger">Reset</button>
                  <input type="submit" align="right" class="btn btn-success"  value="Simpan" name="simpan">
              </div>
                  </form>

