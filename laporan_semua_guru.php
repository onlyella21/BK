<?php
require('assets/phpfpdf/fpdf.php');

class PDF extends FPDF
{
  function Header(){
    //logo

    $this->Image('logo.jpeg',10,14,30);
     
     //geser kanan 35 mm
     $this->Cell(35);
     //judul
     $this->SetFont('Arial','B',12);
     $this->Cell(30,7,'Sekolah Menengah Kejuruan (SMK)',0,1,'L');
      $this->Cell(31);
     $this->SetFont('Arial','B',16);
     $this->Cell(30,7,'ITIKURIH HIBARNA CIPARAY',0,1,'L');
      $this->Cell(31);
      $this->SetFont('Arial','B',12);
     $this->Cell(30,7,'Teknik Komputer dan Jaringan - Perbankan',0,1,'L');
      $this->Cell(31);
      $this->SetFont('Arial','B',14);
     $this->Cell(30,7,'Ciparay-Kabupaten Bandung',0,1,'L');
     $this->Ln(2);
     $this->SetFont('Arial','i',10);
     $this->Cell(30,7,'Jl.Raya laswi No.782 Ciparay Bandung 40381 Tel (022) 595 7900 Fax (022) 595 3182 E-mail:itikurihibarna@plasa.com',0,1,'L');
     //garis bawah double
     $this->Cell(190,1,'','B',1,'L');
     $this->Cell(190,1,'','B',0,'L');

     //line break 5mm
      $this->Ln(7);
  }
  function Footer(){
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    //page number
    $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
  }
}
//instance objek dan memberikan pengaturan halaman pdf
$pdf=new PDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->SetMargins(10,15,15);
$pdf->AddPage();
$pdf->SetFont('Arial','B','16');

$pdf->SetFont('Arial','B','12');
$pdf->Cell(190,7,'DAFTAR GURU WALI KELAS SMK ITIKURIH HIBARNA',0,1,'C');

//memberikan space kebawah agar tidak rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,8,'NO',1,0,'C');
$pdf->Cell(30,8,'NIP',1,0,'C');
$pdf->Cell(40,8,'Nama GURU',1,0,'C');
$pdf->Cell(30,8,'Jenis Kelamin',1,0,'C');
$pdf->Cell(35,8,'Alamat',1,0,'C');
$pdf->Cell(30,8,'No Telpon',1,0,'C');
$pdf->Cell(20,8,'Wali Kelas',1,1,'C');


$no=1;
$pdf->SetFont('Arial','','10');

include'koneksi.php';
$maha=mysqli_query($koneksi,"SELECT * FROM tab_guru as g JOIN tab_kelas as k ON g.id_guru=k.id_guru");
while($row=mysqli_fetch_array($maha)){

//$fo=$row['foto'];
//$foto='assets/img/siswa/'.$fo;
  $pdf->Cell(10,8,$no++,1,0);
$pdf->Cell(30,8,$row['nip'],1,0);
$pdf->Cell(40,8,$row['nama_guru'],1,0);
$pdf->Cell(30,8,$row['jenis_kelamin'],1,0);
$pdf->Cell(35,8,$row['alamat'],1,0);
$pdf->Cell(30,8,$row['no_tlp'],1,0);
$pdf->Cell(20,8,$row['kode_kelas'],1,1);

//$pdf->Cell(10,20,$pdf->Image($foto, $pdf->GetX(),$pdf->GetY(),15,15),0,1,'C');
//$pdf->Cell(30,6,Image('assets/img/siswa/'.$foto,1,1);
}

//tanda tangan
$tgl=date("d F Y");
$pdf->Ln(8);
      $pdf->SetFont('Arial','B',9);
      $pdf->Cell(140);
     $pdf->Cell(30,5,'Ciparay,'.$tgl,0,1,'C');
     $pdf->SetFont('Arial','B',9);
      $pdf->Cell(140);
     $pdf->Cell(30,7,'Kepala SMK Itikurih Hibarna,',0,1,'C');
     $pdf->Ln(12);
     $pdf->SetFont('Arial','B',9);
      $pdf->Cell(140);
     $pdf->Cell(30,7,'Drs.Sonson Sukarsa',0,1,'C');
     $pdf->Cell(135);
     $pdf->Cell(38,0.5,'','B',1,'L');
     $pdf->Cell(140);
      $pdf->SetFont('Arial','B',9);
      $pdf->Cell(30,7,'NUPTK.7760741642200002',0,1,'C');
$pdf->Output();
?>







