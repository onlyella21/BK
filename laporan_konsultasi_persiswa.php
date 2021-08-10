<?php
require('assets/phpfpdf/fpdf.php');
include'koneksi.php';
if(@$_POST['cetak']){
 $s=mysqli_real_escape_string($koneksi,$_POST['nis']);
  
}
class PDF extends FPDF
{
  function Header(){
    //logo
    $this->Image('logo.jpeg',90,14,30);
     
     //geser kanan 35 mm
     $this->Cell(105);
     //judul
     $this->SetFont('Arial','B',12);
     $this->Cell(30,7,'Sekolah Menengah Kejuruan (SMK)',0,1,'L');
      $this->Cell(105);
     $this->SetFont('Arial','B',16);
     $this->Cell(30,7,'ITIKURIH HIBARNA CIPARAY',0,1,'L');
      $this->Cell(105);
      $this->SetFont('Arial','B',12);
     $this->Cell(30,7,'Teknik Komputer dan Jaringan - Perbankan',0,1,'L');
      $this->Cell(105);
      $this->SetFont('Arial','B',14);
     $this->Cell(30,7,'Ciparay-Kabupaten Bandung',0,1,'L');
     $this->Ln(2);
     $this->SetFont('Arial','i',10);
      $this->Cell(30);
     $this->Cell(30,7,'Jl.Raya laswi No.782 Ciparay Bandung 40381 Tel (022) 595 7900 Fax (022) 595 3182 E-mail:itikurihibarna@plasa.com',0,1,'L');
     //garis bawah double
     
     $this->Cell(270,1,'','B',1,'L');
     
     $this->Cell(270,1,'','B',0,'L');

     //line break 5mm
      $this->Ln(2);
      $this->SetFont('Arial','B','16');
      $this->Cell(270,7,'Laporan Konsultasi Siswa',0,1,'C');

      //memberikan jarak agar tidak rapat
        $this->Cell(10,7,'',0,1);
        
  }
  function Footer(){
    
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    //page number
    $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
    //tanda tangan
   
  }
  
}
//instance objek dan memberikan pengaturan halaman pdf
$pdf=new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->SetMargins(15,15,15);
$pdf->AddPage();




//-------------Select data di database------------------------------
$no=1;
$pdf->SetFont('Arial','B','11');

$y="SELECT * FROM tab_siswa as s JOIN tab_kelas as k ON s.id_kelas=k.id_kelas  WHERE s.nis='$s'";
$aksi=mysqli_query($koneksi,$y) or die(mysqli_error($koneksi));
$row=mysqli_fetch_assoc($aksi);
$fo=$row['foto'];

$foto='assets/img/siswa/'.$fo;
$pdf->Image($foto,15,60,40,40);
//=====Baris 1==================
$pdf->Cell(61);
$pdf->Cell(10,8,'NIS   ',0,0);
$pdf->Cell(15);
$pdf->Cell(10,8,' : ',0,0);
$pdf->Cell(10,8,$row['nis'],0,1);

;
//=====Baris 2==================
$pdf->Cell(61);
$pdf->Cell(10,8,'Nama Siswa ',0,0);
$pdf->Cell(15);
$pdf->Cell(10,8,' : ',0,0);
$pdf->Cell(10,8,$row['nama_siswa'],0,1);


//=====Baris 3==================
$pdf->Cell(61);
$pdf->Cell(10,8,'Kelas ',0,0);
$pdf->Cell(15);
$pdf->Cell(10,8,' : ',0,0);
$pdf->Cell(10,8,$row['kode_kelas'],0,0);






if(@$_POST['cetak']){
  $siswa=mysqli_real_escape_string($koneksi,$_POST['nis']);
  
  $pdf->Ln(20);
      $pdf->SetFont('Arial','B','12');
      $pdf->Cell(270,7,'Konsultasi yang dilakukan :',0,1,'L');
      $pdf->Ln(2);
//=========header kolom======================
       

$sql="SELECT * FROM tab_konsultasi as u JOIN tab_siswa as s ON u.nis=s.nis JOIN tab_kelas as k ON s.id_kelas=k.id_kelas WHERE u.nis='$siswa' ";
 $kasus=mysqli_query($koneksi,$sql) or die (mysqli_error($koneksi));
 

 
//==========isi kolom==========================
   while($row=mysqli_fetch_array($kasus)){  
       $t=date('d F Y',strtotime($row['tgl_konsultasi']));
 $pdf->SetFont('Arial','','10');
$pdf->Cell(260,0.5,'','B',1,'L');
$pdf->Cell(30);
$pdf->Cell(10,8,$no++.'.',0);
$pdf->Cell(30,8,'Kode Konsultasi',0);
$pdf->Cell(10,8,':',0);
$pdf->Cell(30,8,$row['kode_konsultasi'],0);
 
$pdf->Cell(30,8,'Tanggal Konsultasi',0);
$pdf->Cell(10,8,' :',0);
$pdf->Cell(26,8,$t,0,1);
$pdf->Cell(260,0.5,'','B',1,'L');

$pdf->Cell(40);
$pdf->Cell(30,8,'Keluhan',0);
$pdf->Cell(10,8,' :',0);
$pdf->MultiCell(100,8,$row['keluhan'],0,1);

$pdf->Cell(40);
$pdf->Cell(30,8,'Saran BK',0);
$pdf->Cell(10,8,' :',0);
$pdf->MultiCell(100,8,$row['saran_bk'],0,1);
$pdf->Cell(260,0.5,'','B',1,'L');





}
}else{

    echo"<script>alert('Maaf data tidak ditemukan!')</script>";
    echo"<script>location='laporan_kasus.php';</script>";
}

//tanda tangan
$tgl=date("d F Y");
$pdf->Ln(5);
// $pdf->Cell(270,1,'','B',0,'L');
      $pdf->SetFont('Arial','B',9);
    $pdf->Cell(200);
     $pdf->Cell(30,5,'Ciparay,'.$tgl,0,1,'C');
     $pdf->SetFont('Arial','B',9);
      $pdf->Cell(200);
     $pdf->Cell(30,7,'Kepala SMK Itikurih Hibarna,',0,1,'C');
     $pdf->Ln(7);
     $pdf->SetFont('Arial','B',9);
      $pdf->Cell(200);
     $pdf->Cell(30,7,'Drs.Sonson Sukarsa',0,1,'C');
     $pdf->Cell(195);
     $pdf->Cell(38,0.5,'','B',1,'L');
     $pdf->Cell(200);
      $pdf->SetFont('Arial','B',9);
      $pdf->Cell(30,7,'NUPTK.7760741642200002',0,1,'C');



$pdf->Output();
?>







