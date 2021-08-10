
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
require'koneksi.php';

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
            <h1>Siswa</h1>
            <ol class="breadcrumb">
              <li class="active"> Master Data</li>
              <li class="active">Detail Siswa</li>
            </ol>
            
          
          <?php
          if(isset($_GET['id'])){

          $id=($_GET['id']);

          
         $s="SELECT nis, nama_siswa, s.jenis_kelamin, s.alamat, no_telp_siswa,angkatan, s.foto,kode_kelas, nama_guru FROM tab_siswa as s JOIN tab_kelas as k ON s.id_kelas=k.id_kelas JOIN tab_guru as g ON k.id_guru-g.id_guru WHERE id_siswa='$id'";
           
          $da=mysqli_query($koneksi,$s)or die (mysqli_error($s));;
        
           $data=mysqli_fetch_assoc($da);
        ?>
      </div>
      <div class="container">
        <div class="row row-table">
          <div class="col-md-3 col-table">
          <div class="panel panel-info">
            <div class="panel-heading" style="align:center;">
              Foto
            </div>
            <div class="panel-body">
               <?php echo"<img src='assets/img/siswa/".$data['foto']."' float='right' width='200' height='310'>";?>
              <div></div>

         </div>
       </div>
     </div>
      
          <div class="container">
        <div class="row row-table">
          <div class="col-md-5 col-table">
          <div class="panel panel-info">
					<div class="panel-heading">
            Data Diri Siswa
					</div>
					<div class="panel-body">
          
       
              <table class="table table-hover" >
          <tr >
           
            <td>NIS</td>
            <td> : </td>
            <td><?php echo $data['nis']?></td>
          </tr>
            <td>Nama Siswa </td>
            <td> : </td>
            <td><?php echo $data['nama_siswa']?></td>
          </tr>
          <tr>
            <td>Jenis Kelamin </td>
            <td> : </td>
            <td><?php echo $data['jenis_kelamin']?></td>
          </tr>
             <td>Alamat</td>
            <td> : </td>
            <td><?php echo $data['alamat']?></td>
          </tr>
           <td>No Telpon Siswa</td>
            <td> : </td>
            <td><?php echo $data['no_telp_siswa']?></td>
          </tr>
          <td>Angkatan</td>
            <td> : </td>
            <td><?php echo $data['angkatan']?></td>
          </tr>
           <td>Kelas</td>
            <td> : </td>
            <td><?php echo $data['kode_kelas']?></td>
          </tr>
          <td>Wali Kelas</td>
            <td> : </td>
            <td><?php echo $data['nama_guru']?></td>
          </tr>
        </table>
       

     </div>
     </div>
     </div>

       <div class="container">
        <div class="row row-table">
          <div class="col-md-3 col-table">
          <div class="panel panel-info">
            <div class="panel-heading" style="align:center;">
              Data Orang Tua
            </div>
            <div class="panel-body">
              <?php
          require'koneksi.php';
          
         $o="SELECT * FROM tab_ortu as o JOIN tab_siswa as s ON o.nis=s.nis  WHERE id_siswa='$id'";
           
          $to=mysqli_query($koneksi,$o);
        
           $r=mysqli_fetch_assoc($to);

        ?>
        <table class="table table-hover" >
          <tr >
           
            <td>Nama Orang Tua</td>
            <td> : </td>
            <td><?php echo $r['nama_ayah']?></td>
          </tr>
          <td>No Telpon</td>
            <td> : </td>
            <td><?php echo $r['no_telpon_ortu']?></td>
          </tr>
        </table>
       <?php
     }
     ?>
             
         </div>
       </div>
     </div>
 
       <div class="container">
        <div class="row row-table">
          <div class="col-md-11 col-table">
            <div class="table-responsive-sm" style="table-layout:center; ">
              <table class="table table-bordered  table-hover table-striped">
              <tr>
                
                
              </tr>
                <tr>
                  <th>Point Awal</th>
                  <th>Point Akhir</th>
                  <th>Jumlah Kasus</th>
                </tr>

      <?php
        $no= 1;
        $query="SELECT * FROM tab_point_siswa as p JOIN tab_siswa as s ON p.nis=s.nis WHERE s.id_siswa='$id'";
        
        $data=mysqli_query($koneksi,$query);
         if(mysqli_num_rows($data)>0){
            
          while($row=mysqli_fetch_assoc($data)){
        
            
      ?>
                <tr>
                  
                  <td><?php echo $row['point_awal']; ?></td>
                  <td><?php echo $row['point_akhir']; ?></td>
                  <td><?php echo $row['jumlah_kasus']; ?></td>
                </tr>
          <?php
          }
        }
        ?>
              </table>  
        </div>
        

                
       
             
              <table class="table table-bordered  table-hover table-striped">
                <tr>
                
                <th colspan="6" style="background-color:#E0FFFF; text-align:center; ">Kasus Pelanggaran</th>
              </tr>
                  <tr>
                  <th>Kode Kasus</th>
                  <th>Tanggal</th>
                  <th>Pelanggaran</th>
                  <th>Minus Point</th> 
                </tr>

          <?php
        $no= 1;
        $query="SELECT * FROM tab_kasus as k JOIN tab_siswa as s ON k.nis=s.nis JOIN tab_kelas as e ON e.id_kelas=s.id_kelas JOIN tab_pelanggaran as p ON k.id_pelanggaran=p.id_pelanggaran where id_siswa='$id'";
        
        $data=mysqli_query($koneksi,$query);
        if(mysqli_num_rows($data)>0){
            
            
          while($row=mysqli_fetch_assoc($data)){
         $t=$row['tgl_kasus']; 
             $tgl=date("d-n-y",strtotime($t));
      ?>
       
               
              
                 <tr>
 
                   <td><?php echo $row['kode_kasus']; ?></td>
                  <td><?php echo $tgl; ?></td>
                  <td><?php echo $row['nama_pelanggaran']; ?></td>
                  <td><?php echo $row['pengurangan_point']; ?></td>
                </tr>
          <?php
          }
        }else{
    
     echo"<h4>Tidak Ada Data Konsultasi</h4>";
   }
        
?>
</table>
</div>
</div>
</div>

 <div class="col-md-11 col-table">
<div class="table-responsive-sm">
              <table class="table table-bordered  table-hover table-striped">
              <tr>
                <th style="background-color:#E0FFFF; text-align:center;" colspan="4">Konsultasi</th>
              </tr>
                <tr>
                  <th>Kode Konsul</th>
                  <th>Tanggal</th>
                  <th>Keluhan</th>
                  <th>Saran BK</th> 
                 
                </tr>

      <?php
        $no= 1;
        $query="SELECT * FROM tab_konsultasi as k JOIN tab_siswa as s ON k.nis=s.nis JOIN tab_kelas as e ON e.id_kelas=s.id_kelas WHERE s.id_siswa='$id'";
        
        $data=mysqli_query($koneksi,$query);
        if(mysqli_num_rows($data)>0){
            
          while($row=mysqli_fetch_assoc($data)){
         $t=$row['tgl_konsultasi']; 
             $tgl=date("d-n-y",strtotime($t));
      ?>
                <tr>
 
                  <td><?php echo $row['kode_konsultasi']; ?></td>
                  <td><?php echo $tgl; ?></td>
                  <td><?php echo $row['keluhan']; ?></td>
                  <td><?php echo $row['saran_bk']; ?></td>
                 
  
                   
                </tr>
          <?php
          }
        
        }
   else{
    
     echo"<h4>Tidak Ada Data Konsultasi</h4>";
  
  }


        
        ?>

