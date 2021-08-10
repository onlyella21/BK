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
            <h2>Kasus Pelanggaran </h2>
            <ol class="breadcrumb">
                
            </ol>
          </div>
      </div>
            <?php
                $hari=date('l,d-M-Y');
                $nis=$_SESSION['nis'];
                ?>

       
            <div class="table-responsive-sm">
              <table class="table table-bordered  table-hover table-striped">
              <tr >
                <th  colspan="6"style="background-color:#E0FFFF"><?php echo $hari;?></th>

              </tr>
                <tr>
                  <th>No</th>
                  <th>Kode Kasus</th>
                  <th>Nama Siswa</th>
                  <th>Tanggal</th>
                  <th>Pelanggaran</th>
                  <th>Minus Point</th> 
                 
                </tr>

      <?php
        $no= 1;
        $query="SELECT * FROM tab_kasus as k JOIN tab_siswa as s ON k.nis=s.nis JOIN tab_kelas as e ON e.id_kelas=s.id_kelas JOIN tab_pelanggaran as p ON k.id_pelanggaran=p.id_pelanggaran WHERE s.nis=$nis";
        
        $data=mysqli_query($koneksi,$query);
        if($data==FALSE){
              die(mysqli_error($koneksi));}
          if(mysqli_num_rows($data) > 0){
            
          while($row=mysqli_fetch_assoc($data)){
         $t=$row['tgl_kasus']; 
             $tgl=date("d-n-y",strtotime($t));
      ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $row['kode_kasus']; ?></td>
                  <td><?php echo $row['nama_siswa']; ?></td>
                  <td><?php echo $tgl; ?></td>
                  <td><?php echo $row['nama_pelanggaran']; ?></td>
                  <td><?php echo $row['pengurangan_point']; ?></td>
                </tr>
          <?php
          }
   }
   else{
    
     echo"<h4>Tidak Ada Kasus Pelanggaran</h4>";
     echo'<a href="home.php"></a>';
  }

        
        ?>
              </table>  
        </div>
        
