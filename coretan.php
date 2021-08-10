</div>
         <div class="form-group form-group-sm">
                    <label class=" control-label col-sm-2" for="txtnama">Nama Jurusan</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" name="txtnama" id="txtnama" required>
                </div>
         </div>
          <div class="col-xs-offset-3">
                 <button type="reset" align="right" class="btn btn-danger">Reset</button>
                  <input type="submit" align="right" class="btn btn-success"  value="Simpan" name="simpan">
              </div>





              <script type="text/javascript">
    $(document).ready(function(){
      loadData();

      $('form').on('submit',function(e){
        e.preventDefault();
        $ajax({
          type:$(this).attr('method'),
          url:$(this).attr('action'),
          data:$(this).serialize(),
          success:function(){
            loadData();
          }
        });
      })
    })

    function loadData(){
      $.get('control_jurusan.php',function(data){
        $('#contentJurusan').html(data)
      })
    }
      
</script>


script type="text/javascript">
      $(document).ready(function(){
        tampilJurusan();

        //menambah data baru
        $(document).on('click','#simpan',function(){
          if($('#txtkode').val()==""||$('#txtnama').val()==""){
            alert('Silahkan isi data dulu');
          }
          else{
            $kode=$('#txtkode').val();
            $nama=$('#txtnama').val();
                  $.ajax({
                        type:"POST",
                        url:"control_jurusan.php",
                        data:{
                          kode_jurusan:$kode,
                          nama_jurusan:$nama,
                          add:1,
                        },
                        success:function(){
                          tampilJurusan();
                        }
                  });
          }
        });
        // Menghapus Data
          $(document).on('click','.hapus', function(){
            $
          })

      })     


  $(document).on('click', '#simpan', function(){
         $('form').on('submit',function(e){
          $.ajax({
            type:$(this).attr('method'),
            url:$(this).attr('action'),
            data:$(this).serialize(),
            success:function(){
              loadData();
            }
          });
        })


         <script type="text/javascript">
      $(document).ready(function(){
        loadData();

      $('#formJur').on('submit',function(e){
        e.preventDefault();
          $.ajax({
            type:'POST',
            url:'simpan_jurusan.php',
            data:$(this).serialize(),
            success:function(){
              loadData();
            }
          });
        })

      })

      //Menampilkan Data
      function loadData(){
        $.get('tampil_jurusan.php',function(data){
          $('#contentJurusan').html(data)
        })
      }
    
  </script>



                    <?php
                    $kode= $row['kode_jurusan'];
                    $queryEdit ="SELECT * FROM tab_jurusan where kode_jurusan='$kode'";
                    $data=mysqli_query($koneksi,$queryEdit);
                        if(mysqli_num_rows($data) > 0){

                          while($row=mysqli_fetch_assoc($data)){
                      ?>


                       <?php
          }
        }
        ?>
         $kode=$data['kode_jurusan'];
                      $nama=$data['nama_jurusan'];


                       $kode=$_POST['kode_jurusan'];
     $nama=$_POST['nama_jurusan'];




     if($hasil){
      echo"<script>alert('Berhasil dirubah')</script>";
    echo"<script>location='jurusan.php';</script>";
      
    } else{

      
    die("Query gagal dijalankan:".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
     }





     echo"<script>alert('Berhasil dirubah')</script>";
    echo"<script>location='jurusan.php';</script>";



    <?php
                $query="SELECT * FROM tab_jurusan";  
                 $data=mysqli_query($koneksi,$query);
                  if(mysqli_num_rows($data) > 0){

                    while($row=mysqli_fetch_assoc($data)){
                ?>
                    <option value="<?php echo $row['nama_jurusan']?>"><?php echo $row['nama_jurusan']?></option>
                    <?php
                 }  
                 } 
                  ?>



<!--Menampilkan nilai dari combobox ke texbox-->
                         <?php
                $query="SELECT * FROM tab_jurusan";  
                 $data=mysqli_query($koneksi,$query);
                 $jsArray="var nama=new Array();\n";
                
                    echo'<select name="cbjur" onchange="document.getElementById(\'kode_jurusan\').value=nama[this.value]">'; 
                      
                    echo'<option value="">Pilih Jurusan</option>';
                    while($row=mysqli_fetch_array($data)){
                    echo'<option value="'.$row['nama_jurusan'].'">'.$row['nama_jurusan'].'</option>';
                    $jsArray.="nama['".$row['nama_jurusan']."']='".addslashes($row['kode_jurusan'])."';\n";
                    }
                echo'</select>';
                    ?>
                    
                </div>
                <!--untuk kode jurusan-->
                <input type="hidden" class="form-control" name="kode_jurusan" id="kode_jurusan">

                <script type="text/javascript">
                  <?php echo $jsArray;?>
                </script>
                <!--untuk di simpan ke tab_siswa nya-->


                 $jsArray="var pel=new Array();\n";
                
                    echo'<select name="cbpel" onchange="document.getElementById(\'nama_pel\').value=pel[this.value]">'; 
                      
                    echo'<option value="">Pilih Jurusan</option>';
                    while($row=mysqli_fetch_array($data)){
                    echo'<option value="'.$row['id_pelanggaran'].'">'.$row['nama_pelanggaran'].'</option>';
                    $jsArray.="pel['".$row['id_pelanggaran']."']='".addslashes($row['nama_pelanggaran'])."';\n";
                    }
                echo'</select>';
                    ?>
                    
                </div>
                <!--untuk nama_pelanggaran-->
                <input type="text" class="form-control" name="nama_pel" id="nama_pel">
                <script type="text/javascript">
                  <?php echo $jsArray;?>
                </script>
                </div>
              </div>

<!--ini untuk dua textbox tapi belum berhasil-->
  <select name="cbpel" onchange='changeValue(this.value)' class="form-control" id="cbpel" required> ;
                  <option value="">---------Pilih--------</option>
                  <?
                  $query="SELECT * FROM tab_pelanggaran"; 
                 $data=mysqli_query($koneksi,$query);
                  $jsArray="var nama=new Array();\n"; 
                  if(mysqli_num_rows($data) > 0){

                    while($row=mysqli_fetch_assoc($data)){
                ?>
              <option value="<?php echo $row['id_pelanggaran']?>"><?php echo $row['nama_pelanggaran']?></option>
              <?php $jsArray.="nama['".$row['id_pelanggaran']."']={pelanggaran:'".addslashes($row['nama_pelanggaran'])."',point:'".addslashes($row['pengurangan_point'])."';\n";?>
                <?php
                 }
                 }  
                  
                  ?>
                   </select> 






                 $query="SELECT kode_kelas.tab_kelas, tahun_pelajaran.tab_kelas, nama_guru.tab_guru FROM tab_siswa INNER JOIN tab_guru ON nip.tab_kelas=nip.tab_guru ";



                  <div class="form-group form-group-sm">
                 <label class=" control-label col-sm-2" for="tingkat">Tingkat</label>
                   <div class="col-sm-2">
                    <select name="tingkat" class="form-control" id="tingkat"required>
                    <option value="">-Pilih-</option>
                    <option value="X" <?php if($tingkat=="X"){echo "selected=\"selected\"";}?>>X</option>
                    <option value="XI" <?php if($tingkat=="XI"){echo "selected=\"selected\"";}?>>XI</option>
                    <option value="XI" <?php if($tingkat=="XII"){echo "selected=\"selected\"";}?>>XII</option>
                    </select>
                  </div>
                 </div>

                  <div class="form-group form-group-sm">
                  <label class=" control-label col-sm-2" for="txthuruf">Huruf</label>
                   <div class="col-sm-2">
                    <input type="text" class="form-control" name="txthuruf" id="txthuruf" maxlength="1" placeholder="Huruf A-Z" required>
                  </div>
                 </div>

                 <div class="form-group form-group-sm">
                    <label class="control-label col-sm-2" for="tahun">Tahun Pelajaran</label>
                    <div class="col-sm-2">
                    <input type="text" class="form-control" name="tahun" id="tahun" maxlength="4" placeholder="Tahun" required>
              
                
                </div>
                </div>

                 <div class="form-group form-group-sm">
                  <label class=" control-label col-sm-2" for="guru">Wali Kelas</label>
                   <div class="col-sm-3">


                    <select name="guru" class="form-control" id="guru"required>
                    <option value="">Pilih</option>
                    <?php
                $query="SELECT * FROM tab_guru";  
                 $data=mysqli_query($koneksi,$query);
                  if(mysqli_num_rows($data) > 0){

                    while($row=mysqli_fetch_assoc($data)){
              
              echo"<option value="$row['id_guru']"><?php echo $row['nama_guru']?></option>

                <?php
                 }  
                 } 
                  ?>
                    </select>
                  </div>
                 </div>
                 </div>
               
                </div>
                </div>

              


                  <!--untuk menampilkan combobox yg data nya dari database di form edit--->
               <select name="kode_jurusan" class="form-control" id="kode_jurusan">
                        
                   <?php
                   $q=mysqli_query($koneksi,"SELECT * FROM tab_jurusan");
                   while($a=mysqli_fetch_assoc($q)){
                    if($id_jurusan==$a['id_jurusan']){
                      echo'<option value="'.$a['id_jurusan'].'" selected>'.$a['nama_jurusan'].'</option>';
                    }else{
                       echo'<option value="'.$a['id_jurusan'].'">'.$a['nama_jurusan'].'</option>';
                    }
                   }
                 
                 ?>
             </select>

             $sim="INSERT INTO tab_point_siswa (id_point,nis,point_awal,point_akhir,jumlah_kasus)VALUES ('',$nis,'100','100','0')";


             if($bu='1')
    {$bulan='Januari';
  }else if($bu='2')
  {$bulan='Februari';}
  else if($bu='3')
    {$bulan='Maret';}
  else if($bu='4')
    {$bulan='April';}
  else if($bu='5')
    {$bulan='Mei';}
  else if($bu='6')
    {$bulan='Juni';}
  else if($bu='7')
    {$bulan='Juli';}
  else if($bu='8')
    {$bulan='Agustus';}
  else if($bu='9')
    {$bulan='September';}
  else if($bu='10')
    {$bulan='Oktober';}
  else if($bu='11')
    {$bulan='November';}
  else if($bu='12')
    {$bulan='Desember';}





$pdf->Cell(10,8,$no++,1,0);
$pdf->Cell(22,8,$row['kode_konsultasi'],1,0);
$pdf->Cell(26,8,$row['tgl_konsultasi'],1,0);
$pdf->Cell(25,8,$row['nis'],1,0);
$pdf->Cell(35,8,$row['nama_siswa'],1,0);
$pdf->Cell(130,8,$row['keluhan'],1,0);
$pdf->Cell(25,8,$row['saran_bk'],1,1);

$pdf->Cell(10,8,$no++,1,0);
$pdf->Cell(22,8,$row['kode_konsultasi'],1,0);
$pdf->Cell(26,8,$row['tgl_konsultasi'],1,0);
$pdf->Cell(25,8,$row['nis'],1,0);
$pdf->Cell(35,8,$row['nama_siswa'],1,0);
$pdf->Cell(130,8,$row['keluhan'],1,0);
$pdf->Cell(25,8,$row['saran_bk'],1,1);





 $this->MultiCell(10,7,'',0,1);
        $this->SetFont('Arial','B',10);
        $this->MultiCell(10,8,'NO',1,0,'C');
        $this->MultiCell(22,8,'Kode Konsul',1,0,'C');
        $this->MultiCell(26,8,'Tanggal Konsul',1,0,'C');
        $this->MultiCell(25,8,'NIS',1,0,'C');
        $this->MultiCell(35,8,'Nama Siswa',1,0);
        $this->MultiCell(130,8,'Keluhan',1,0,'C');
        $this->MultiCell(25,8,'Saran BK',1,1,'C');






<!---------poit ku------------------------->
        <div class="col">
        <?php
         $query="SELECT * FROM tab_siswa as s JOIN tab_point_siswa as t ON s.nis=t.nis ";
          $result=mysqli_query($koneksi,$query);
          $data=mysqli_fetch_assoc($result);
       ?>

       <div class="panel panel-info">
          <div class="panel-heading">
             <label class="control-label"  control-label">Point Ku</label>
          </div>
          <div class="panel-body">
       <div>
        <table class="table table-striped">
         
          <tr>
          <td>Point Awal</td>
          <td>:</td>
          <td><?php echo $data['point_awal']?></td>
        </tr>
        <tr>
          <td>Point Akhir</td>
          <td>:</td>
         <td><?php echo $data['point_akhir']?></td>
        </tr>
        <tr>
          <td>Jumlah Kasus</td>
          <td>:</td>
         <td><?php echo $data['jumlah_kasus']?></td>
        </tr>
        
           </table>
         </div>
       </div>
     </div>



     #E0FFFF


     
                $hari=date('l,d-M-Y');
                ?>
                <h3 class="text-primary"><?php echo $hari?></h3>
                <h4 class="text-danger"><?php echo" Hallo....". $_SESSION['username']?></h3>
               <h4 class="text-danger">Selamat Datang Di Sistem Infomasi Bimbingan Konseling SMk Itikurih Hibarna <h4><br>




                <script type="text/javascript">
   
      chart1 = new Highcharts.Chart({
        chart:{
          renderTo:'mygraph',
          type:'column',
        },
        title:{
          text:'Kasus Pelanggaran'
        },
        xAxis: {
          categories:['siswa']
        },
        yAxis:{
          title:{
            text:'Jumlah Pelanggaran'
          }
        },
        series:
        [
        <?php
        $sql="SELECT nama_siswa from tab_siswa";
        $query=mysqli_query($con,$sql) or die(mysqli_error());
        while ($temp=mysqli_fetch_array($query,$sql_jumlah))
        {
          $siswa=$temp['nama_siswa'];
          $sql_jumlah="SELECT * FROM tab_point_siswa as p JOIN tab_siswa as s ON p.nis=s.nis WHERE nama_siswa='$siswa' ";
          while ($data=mysqli_fetch_array($con,$sql_jumlah))
          {
            $jumlah=$data['jumlah'];
          }
        ?>
        {
          name:'<?php echo $siswa;?>',
          data:[<?php echo $jumlah;?>]
        },
        <?php
        }
        ?>
        ]
      });
   
  </script>