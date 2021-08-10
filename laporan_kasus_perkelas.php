<?php
require('assets/phpfpdf/fpdf.php');
include'koneksi.php';

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
      $this->SetFont('Arial','B','12');
      include'koneksi.php';
      if(@$_POST['cetak']){
  $ke=mysqli_real_escape_string($koneksi,$_POST['id_kelas']);
  
  
  $tglawal=mysqli_real_escape_string($koneksi,$_POST['txt_tanggalawal']);
  $tglakhir=mysqli_real_escape_string($koneksi,$_POST['txt_tanggalakhir']);

  $t_awal=date("d F Y",strtotime($tglawal));
$t_akhir=date("d F Y",strtotime($tglakhir));
 

  $query="SELECT * FROM tab_siswa as s JOIN tab_point_siswa as p ON s.nis=p.nis JOIN tab_kelas as k ON s.id_kelas=k.id_kelas JOIN tab_guru as r ON k.id_guru=r.id_guru  WHERE k.id_kelas='$ke'";
  $result=mysqli_query($koneksi,$query) or die(mysqli_error($koneksi));;
  $data=mysqli_fetch_assoc($result);
                      $kela=$data["kode_kelas"];
                      $gur=$data["nama_guru"];
}
      $this->Cell(270,7,'Kasus yang dilakukan pada periode '.$t_awal.' sampai '.$t_akhir,0,1,'C');
      $this->Cell(30,7,'Kelas :'  .$kela,0,1,'C');
      $this->Cell(50,7,'Wali Kelas :' .$gur,0,1,'C');
      //memberikan jarak agar tidak rapat
        $this->Cell(10,7,'',0,1);
        $this->SetFont('Arial','B',10);
        $this->Cell(10,20,'NO',1,0,'C');
        $this->Cell(25,20,'Kode Kasus',1,0,'C');
        $this->Cell(30,20,'Tanggal Kasus',1,0,'C');
        $this->Cell(15,20,'NIS',1,0,'C');
         $this->Cell(30,20,'Nama siswa',1,0,'C');
        $this->Cell(130,20,'Pelanggaran',1,0,'C');
         $this->Cell(25,20,'Minus Point',1,1,'C');
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
$pdf->SetFont('Arial','','10');


if(@$_POST['cetak']){
  $kelas=mysqli_real_escape_string($koneksi,$_POST['id_kelas']);
   $tgl_awal=mysqli_real_escape_string($koneksi,$_POST['txt_tanggalawal']);
  $tgl_akhir=mysqli_real_escape_string($koneksi,$_POST['txt_tanggalakhir']);
$t_awal=date("d F Y",strtotime($tgl_awal));
$t_akhir=date("d F Y",strtotime($tgl_akhir));

$sql="SELECT * FROM tab_kasus as u JOIN tab_siswa as s ON u.nis=s.nis JOIN tab_kelas as k ON s.id_kelas=k.id_kelas JOIN tab_pelanggaran as p ON u.id_pelanggaran=p.id_pelanggaran WHERE s.id_kelas='$kelas' and u.tgl_kasus between'$tgl_awal' and '$tgl_akhir'";
 $kasus=mysqli_query($koneksi,$sql) or die (mysqli_error($koneksi));
 

if(mysqli_num_rows($kasus)>0){
        while($row=mysqli_fetch_array($kasus)){


$pdf->Cell(10,20,$no++,1,0);
$pdf->Cell(25,20,$row['kode_kasus'],1,0);
$pdf->Cell(30,20,$row['tgl_kasus'],1,0);
$pdf->Cell(15,20,$row['nis'],1,0);
$pdf->Cell(30,20,$row['nama_siswa'],1,0);
$pdf->Cell(130,20,$row['nama_pelanggaran'],1,0);
$pdf->Cell(25,20,$row['pengurangan_point'],1,1);

}
}else{

    echo"<script>alert('Maaf data tidak ditemukan!')</script>";
    echo"<script>location='laporan_kasus.php';</script>";
}
} 

//tanda tangan
$tgl=date("d F Y");
$pdf->Ln(15);
 $pdf->Cell(270,1,'','B',0,'L');
      $pdf->SetFont('Arial','B',9);
      $pdf->Cell(200);
     $pdf->Cell(30,5,'Ciparay,'.$tgl,0,1,'C');
     $pdf->SetFont('Arial','B',9);
      $pdf->Cell(200);
     $pdf->Cell(30,7,'Kepala SMK Itikurih Hibarna,',0,1,'C');
     $pdf->Ln(12);
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







