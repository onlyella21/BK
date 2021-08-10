<?php
require('assets/phpfpdf/fpdf.php');
include'koneksi.php';

class PDF extends FPDF
{
  function Header(){
    //logo
    $this->Image('logo.jpeg',45,14,30);
     
     //geser kanan 35 mm
     $this->Cell(60);
     //judul
     $this->SetFont('Arial','B',12);
     $this->Cell(30,7,'Sekolah Menengah Kejuruan (SMK)',0,1,'L');
      $this->Cell(60);
     $this->SetFont('Arial','B',16);
     $this->Cell(30,7,'ITIKURIH HIBARNA CIPARAY',0,1,'L');
      $this->Cell(60);
      $this->SetFont('Arial','B',12);
     $this->Cell(30,7,'Teknik Komputer dan Jaringan - Perbankan',0,1,'L');
      $this->Cell(60);
      $this->SetFont('Arial','B',14);
     $this->Cell(30,7,'Ciparay-Kabupaten Bandung',0,1,'L');
     $this->Ln(2);
     $this->SetFont('Arial','i',10  );
     $this->Cell(30,7,'Jl.Raya laswi No.782 Ciparay Bandung 40381 Tel (022) 595 7900 Fax (022) 595 3182 E-mail:itikurihibarna@plasa.com',0,1,'L');
     //garis bawah double
     $this->Cell(185,1,'','B',1,'L');
     $this->Cell(185,1,'','B',0,'L');

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

 $pdf->SetFont('Arial','B',14);
$pdf->Cell(180,7,' DATA SISWA SMK ITIKURIH HIBARNA CIPARAY ',0,1,'C');
$pdf->Cell(180,3,'','B',1,'L');
$pdf->SetFont('Arial','B','12');
$pdf->Ln(3);
$pdf->Cell(10,7,'A. DATA SISWA ',0,1,'L');
 $pdf->Cell(180,3,'','B',1,'L');
$pdf->Ln(3);
//memberikan space kebawah agar tidak rapat





 if(@$_POST['cetak']){
        $id=mysqli_real_escape_string($koneksi,$_POST['nis']);
        $perin="SELECT * FROM tab_siswa as s JOIN tab_kelas as k ON s.id_kelas=k.id_kelas JOIN tab_jurusan as j ON k.kode_jurusan=j.kode_jurusan JOIN tab_ortu as o ON s.nis=o.nis where s.nis='$id'";
         $maha=mysqli_query($koneksi,$perin);
        if(mysqli_num_rows($maha)>0){
        while($row=mysqli_fetch_array($maha)){
$fo=$row['foto'];
$foto='assets/img/siswa/'.$fo;
$pdf->Image($foto,15,83,40,55);
//=====Baris 1==================
$pdf->SetFont('Arial','','11');
$pdf->Cell(42);
$pdf->Cell(10,8,'NIS   ',0,0);
$pdf->Cell(42);
$pdf->Cell(10,8,' : ',0,0);
$pdf->Cell(10,8,$row['nis'],0,1);

$pdf->SetFont('Arial','','11');
$pdf->Cell(42);
$pdf->Cell(10,8,'Nama Siswa   ',0,0);
$pdf->Cell(42);
$pdf->Cell(10,8,' : ',0,0);
$pdf->Cell(10,8,$row['nama_siswa'],0,1);

//=====Baris 2==================
$pdf->Cell(42);
$pdf->Cell(10,8,'Jenis Kelamin ',0,0);
$pdf->Cell(42);
$pdf->Cell(10,8,' : ',0,0);
$pdf->Cell(10,8,$row['jenis_kelamin'],0,1);

$pdf->Cell(42);
$pdf->Cell(10,8,'Alamat   ',0,0);
$pdf->Cell(42);
$pdf->Cell(10,8,' : ',0,0);
$pdf->Cell(10,8,$row['alamat'],0,1);

$pdf->Cell(42);
$pdf->Cell(10,8,'Jurusan  ',0,0);
$pdf->Cell(42);
$pdf->Cell(10,8,' : ',0,0);
$pdf->Cell(10,8,$row['nama_jurusan'],0,1);
//=====Baris 3==================
$pdf->Cell(42);
$pdf->Cell(10,8,'Kelas ',0,0);
$pdf->Cell(42);
$pdf->Cell(10,8,' : ',0,0);
$pdf->Cell(10,8,$row['kode_kelas'],0,1);
//=====Baris 4==================
$pdf->Cell(42);
$pdf->Cell(10,8,'No Telpon Siswa ',0,0);
$pdf->Cell(42);
$pdf->Cell(10,8,' : ',0,0);
$pdf->Cell(10,8,$row['no_telp_siswa'],0,1);

//=====Baris==================
$pdf->Cell(180,3,'','B',1,'L');
$pdf->Ln(3);
$pdf->SetFont('Arial','B','12');
$pdf->Cell(180,7,'B. DATA ORANG TUA / WALI SISWA ',0,1,'L');
 $pdf->Cell(180,3,'','B',1,'L');

$pdf->SetFont('Arial','','11');
$pdf->Cell(10,8,'ID Orang Tua',0,0);
$pdf->Cell(45);
$pdf->Cell(10,8,' : ',0,0);
$pdf->Cell(5);
$pdf->Cell(10,8,$row['id_ortu'],0,1);

$pdf->Cell(10,8,'Nama Orang Tua / Wali',0,0);
$pdf->Cell(45);
$pdf->Cell(10,8,' : ',0,0);
$pdf->Cell(5);
$pdf->Cell(10,8,$row['nama_ayah'],0,1);

$pdf->Cell(10,8,'No Telpon Orang Tua / Wali',0,0);
$pdf->Cell(45);
$pdf->Cell(10,8,' : ',0,0);
$pdf->Cell(5);
$pdf->Cell(10,8,$row['no_telpon_ortu'],0,1);

 $pdf->Cell(180,1,'','B',1,'L');
    

}
}else{
 echo"<script>alert('Maaf data siswa Belum lengkap, mohon lengkapi data orang tua siswa!')</script>";
 echo"<script>location='tambah_orangtua.php';</script>";
  
}
} 

//tanda tangan
$tgl=date("d F Y");
$pdf->Ln(10);
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