<?php
require('assets/phpfpdf/fpdf.php');
include'koneksi.php';

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
$pdf=new PDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->SetMargins(15,15,15);
$pdf->AddPage();
$pdf->SetFont('Arial','B','16');

$pdf->SetFont('Arial','B','12');
$pdf->Cell(190,7,'DATA DIRI GURU WALI KELAS ',0,1,'C');


//memberikan space kebawah agar tidak rapat





 if(@$_POST['cetak']){
        $id=mysqli_real_escape_string($koneksi,$_POST['id_guru']);
         $maha=mysqli_query($koneksi,"SELECT * FROM tab_guru as g JOIN tab_kelas as k ON g.id_guru=k.id_guru where g.id_guru='$id'");
        if(mysqli_num_rows($maha)>0){
        while($row=mysqli_fetch_array($maha)){

$fo=$row['foto_guru'];
$foto='assets/img/guru/'.$fo;
$pdf->Image($foto,15,57,50,50);
$pdf->Cell(61);
$pdf->Cell(10,8,'Nama Guru           : '.$row['nama_guru'],0,1);
$pdf->Cell(61);
$pdf->Cell(10,8,'Jenis Kelamin      : '.$row['jenis_kelamin'],0,1);
$pdf->Cell(61);
$pdf->Cell(10,8,'Alamat                  : '.$row['alamat'],0,1);
$pdf->Cell(61);
$pdf->Cell(10,8,'No Telpon            : '.$row['no_tlp'],0,1);
$pdf->Cell(61);
$pdf->Cell(10,8,'Wali Kelas Dari    : '.$row['kode_kelas'],0,1);

//$pdf->Cell(27,8,$row['kode_kelas'],1,1);
//$pdf->Cell(10,20,$pdf->Image($foto, $pdf->GetX(),$pdf->GetY(),15,15),0,1,'C');
//$pdf->Cell(30,6,Image('assets/img/siswa/'.$foto,1,1);
}
}else{
  echo "Error:".$id."<br>".mysqli_error($koneksi);
  
}
} 

//tanda tangan
$tgl=date("d F Y");
$pdf->Ln(30);
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