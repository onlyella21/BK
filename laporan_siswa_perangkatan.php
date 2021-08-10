<?php
require('assets/phpfpdf/fpdf.php');
include'koneksi.php';
if(@$_POST['cetak']){
        $id=mysqli_real_escape_string($koneksi,$_POST['txtcari']);
        $maha=mysqli_query($koneksi,"SELECT * FROM tab_siswa as s JOIN tab_kelas as k ON s.id_kelas=k.id_kelas where s.angkatan='$id'");
        $a=mysqli_fetch_array($maha);
        $ko=$a['angkatan'];
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
      $this->Ln(5);
  }
  function Footer(){
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    //page number
    $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
  }
}
//instance objek dan memberikan pengaturan halaman pdf
$pdf=new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->SetMargins(15,15,15);
$pdf->AddPage();
$pdf->SetFont('Arial','B','16');

$pdf->SetFont('Arial','B','12');
$pdf->Cell(270,7,'DAFTAR SISWA SMK ITIKURIH HIBARNA ',0,1,'C');
$pdf->Cell(190,7,'Angkatan: '.$ko,0,1,'L');

//memberikan space kebawah agar tidak rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,8,'NIS',1,0,'C');
$pdf->Cell(50,8,'Nama Siswa',1,0,'C');
$pdf->Cell(27,8,'Jenis Kelamin',1,0,'C');
$pdf->Cell(90,8,'Alamat',1,0,'C');
$pdf->Cell(35,8,'No Telpon',1,0,'C');
$pdf->Cell(27,8,'Kelas',1,1,'C');
//$pdf->Cell(27,8,'Kelas',1,1,'C');
//$pdf->Cell(22,20,'Foto',1,1);

$pdf->SetFont('Arial','','10');


 if(@$_POST['cetak']){
        $id=mysqli_real_escape_string($koneksi,$_POST['txtcari']);
        $maha=mysqli_query($koneksi,"SELECT * FROM tab_siswa as s JOIN tab_kelas as k ON s.id_kelas=k.id_kelas where s.angkatan='$id'");
        if(mysqli_num_rows($maha)>0){
        while($row=mysqli_fetch_array($maha)){

//$fo=$row['foto'];
//$foto='assets/img/siswa/'.$fo;
$pdf->Cell(20,8,$row['nis'],1,0);
$pdf->Cell(50,8,$row['nama_siswa'],1,0);
$pdf->Cell(27,8,$row['jenis_kelamin'],1,0);
$pdf->Cell(90,8,$row['alamat'],1,0);
$pdf->Cell(35,8,$row['no_telp_siswa'],1,0);
$pdf->Cell(27,8,$row['kode_kelas'],1,1);
//$pdf->Cell(10,20,$pdf->Image($foto, $pdf->GetX(),$pdf->GetY(),15,15),0,1,'C');
//$pdf->Cell(30,6,Image('assets/img/siswa/'.$foto,1,1);
}
}else{
  echo"<script>alert('Data tidak ditemukan')</script>";
  //echo"<script>location='laporan_siswa.php';</script>";
}
} 

//tanda tangan
//tanda tangan
$tgl=date("d F Y");
$pdf->Ln(8);
      $pdf->SetFont('Arial','B',9);
      $pdf->Cell(180);
     $pdf->Cell(30,5,'Ciparay,'.$tgl,0,1,'C');
     $pdf->SetFont('Arial','B',9);
      $pdf->Cell(180);
     $pdf->Cell(30,7,'Kepala SMK Itikurih Hibarna,',0,1,'C');
     $pdf->Ln(12);
     $pdf->SetFont('Arial','B',9);
      $pdf->Cell(180);
     $pdf->Cell(30,7,'Drs.Sonson Sukarsa',0,1,'C');
     $pdf->Cell(175);
     $pdf->Cell(38,0.5,'','B',1,'L');
     $pdf->Cell(180);
      $pdf->SetFont('Arial','B',9);
      $pdf->Cell(30,7,'NUPTK.7760741642200002',0,1,'C');
$pdf->Output();
?>