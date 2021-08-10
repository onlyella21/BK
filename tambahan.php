 <td><?php echo $data->alamat; ?></td>
                  <td><?php echo $data->no_telp_siswa; ?></td>
                  <td><?php echo $data->angkatan; ?></td>
                  <td><?php echo $data->jurusan; ?></td>
                  
                   <th width="15%">Alamat Siswa</th>
                  <th width="15%">No.Telpon Siswa</th>
                  <th width="5%">Angkatan</th>
                  <th width="5%">Jurusan</th>

                  $nis = $_POST['txtnis'];
  $nama = $_POST['txtnama'];
  $jk = $_POST['rbjk'];
  $alamat = $_POST['txtaalamat'];
  $notelp = $_POST['txtnotelp'];
  $angkatan=$_POST['cbangkatan'];
  $jurusan = $_POST['cbjur'];

   (nis,nama_siswa,jenis_kelamin,alamat,no_telp_siswa,angkatan,jurusan,password,foto)


   $extensi = explode(".",$_FILES['fotosis']['name']);
  $foto_sis = "sis-".round(microtime(true)).".".end($extensi);
  $sumber = $_FILES['fotosis']['tmp_name'];
  $upload = move_uploaded_file($sumber, "assets/img/siswa/".$foto_sis);


  $tingkat=$_POST['tingkat'];
  $huruf=$_POST['huruf'];
  $tahun=$_POST['tahun'];
  $wali=$_POST['guru'];
  $status=$_POST['status'];