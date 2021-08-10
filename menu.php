<?php

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
  </head>

  <body>

    <div id="wrapper">

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
          <a class="navbar-brand" href="">Bimbingan Konseling SMK Itikurih Hibarna</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav" style="background-color:#AFEEEE">
            <li><a href="?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Master Data <b class="caret"></b></a>
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
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Bimbingan Konseling <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="kasus.php"> Kasus Siswa</a></li>
                <li><a href="konsultasi.php">Konsultasi</a></li>
              </ul>          
            </li>
         
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i>Laporan<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="laporan_guru.php"> Laporan Guru Wali Kelas</a></li>
                <li><a href="laporan_siswa.php"> Laporan Siswa</a></li>
                <li><a href="laporan_kasus.php"> Laporan Kasus Siswa</a></li>
                <li><a href="laporan_konsultasi.php"> Laporan Konsultasi</a></li>
              </ul>          
            </li>
          </ul>
           </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
        
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Ela w <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-power-off"></i> Log Out</a></li
                
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>
