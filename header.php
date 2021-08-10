<?php
if(!@($_SESSION)){
session_start();
}
require_once('koneksi.php');



?>
<!DOCTYPE html>
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
    <style type="text/css">
      .kotak{
        width:400px;
        height:400px;
        background-color: black;
      }
    </style>
  </head>

  <body>

    <div id="wrapper">
      <?php
        if($_SESSION['level']=="admin"){
      ?>
      <!-- Sidebar -->
      <nav class="navbar  navbar-fixed-top" style="background-color:#E0FFFF;" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <span class="kotak"></span>
         <img src="assets/img/logo1.png"style="float:left; width:40px; height: 40px; margin: 4px 5px 4px 20px;">
          <a class="navbar-brand" href=""> Bimbingan Konseling SMK Itikurih</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav" style="background-color:#AFEEEE">
            
           
            
            <li><a href="home.php"><span class="glyphicon glyphicon-home"></span> HOME</a></li>
             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-th-large"></span> MasterData <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="siswa.php">Siswa</a></li>
                <li><a href="orangtua.php">Orang Tua Siswa</a></li>
                <li><a href="kelas.php">Kelas</a></li>
                <li><a href="jurusan.php">Jurusan</a></li>
                <li><a href="guru.php">Guru</a></li>
                 <li><a href="kategori.php">Kategori Pelanggaran</a></li>
                 <li><a href="pelanggaran.php">Pelanggaran</a></li>
              </ul>          
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-tasks"></span> Bimbingan&nbsp;Konseling<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="kasus.php"> Kasus Siswa</a></li>
                <li><a href="konsultasi.php">Konsultasi</a></li>
                <li><a href="point_siswa.php">Point Siswa</a></li>
              </ul>          
            </li>
         
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-book"></span> Laporan<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="laporan_siswa.php"> Laporan Siswa</a></li>
                <li><a href="laporan_kasus.php"> Laporan Kasus Siswa</a></li>
                <li><a href="laporan_point.php"> Laporan Point Siswa</a></li>
                <li><a href="laporan_konsultasi.php"> Laporan Konsultasi</a></li>
              </ul>          
            </li>
          </ul>
           </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
        
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['username'];?><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a onclick="return confirm('Anda Yakin akan keluar?')" href="logout.php" type="button" class="btn btn-danger btn-xs"><i class="fa fa-power-off"></i> Log Out</a></li
                
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>
      <?php
    }else if($_SESSION['level']=="siswa"){
      ?>
       <!-- Sidebar -->
      <nav class="navbar  navbar-fixed-top" style="background-color:#E0FFFF" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <span class="kotak"></span>
         <img src="assets/img/logo1.png"style="float:left; width:40px; height: 40px; margin: 4px 5px 4px 20px;">
          <a class="navbar-brand" href=""> Bimbingan Konseling SMK Itikurih</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav" style="background-color:#AFEEEE">
            <li><a href="home.php"><span class="glyphicon glyphicon-home"></span> HOME</a></li>
             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-th-large"></span> DataKU <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="hal_pointku.php">Point Ku</a></li>
                <li><a href="hal_kasusku.php">Kasus ku</a></li>
                <li><a href="hal_konsultasiku.php">Konsultasi Ku</a></li>
              </ul>          
            </li>

            
             
            </li>
           
           </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
        
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['username'];?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
               <li><a onclick="return confirm('Anda Yakin akan keluar?')" href="logout.php" type="button" class="btn btn-danger btn-xs"><i class="fa fa-power-off"></i> Log Out</a></li>
                
                
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>
    <?php
  

    }else if($_SESSION['level']=="orangtua"){
      ?>
       <!-- Sidebar -->
      <nav class="navbar  navbar-fixed-top" style="background-color:#E0FFFF" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <span class="kotak"></span>
         <img src="assets/img/logo1.png"style="float:left; width:40px; height: 40px; margin: 4px 5px 4px 20px;">
          <a class="navbar-brand" href=""> Bimbingan Konseling SMK Itikurih</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav" style="background-color:#AFEEEE">
            <li><a href="home.php"><span class="glyphicon glyphicon-home"></span> HOME</a></li>
             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-th-large"></span> Data Anak Ku <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="hal_pointku.php">Point Anak ku</a></li>
                <li><a href="hal_kasusku.php">Kasus  Anak ku</a></li>
              </ul>          
            </li>

           
           </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
        
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['username'];?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
               <li><a onclick="return confirm('Anda Yakin akan keluar?')" href="logout.php" type="button" class="btn btn-danger btn-xs"><i class="fa fa-power-off"></i> Log Out</a></li>
                
                
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>
    <?php
  }
    ?>