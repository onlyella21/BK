<?php
ob_start();
session_start();
require'koneksi.php';
if(@$_POST['login']){
	$user=mysqli_real_escape_string($koneksi,$_POST['username']);
	$pass=mysqli_real_escape_string($koneksi,md5($_POST['password']));
	$level=mysqli_real_escape_string($koneksi,$_POST['level']);
	
	if($level=='admin'){
		$sql="SELECT * FROM tab_user WHERE username='$user' and password='$pass'";
		$query=mysqli_query($koneksi,$sql);
		if(mysqli_num_rows($query)>0){
			$row=mysqli_fetch_array($query);

			$_SESSION['username']=$row['nama'];
			$_SESSION['level']=$level;
			$_SESSION['islogin']=true;
			header('location:home.php');
		}else{
		echo"<script>alert(' Maaf Username dan Password tidak cocok')</script>";
		echo"<script>location='index.php';</script>";
	}
		

	} else if($level=='siswa'){
		$sql="SELECT * FROM tab_siswa WHERE nis='$user' and password='$pass'";
		$query=mysqli_query($koneksi,$sql);
		if(mysqli_num_rows($query)>0){
			$row=mysqli_fetch_array($query);
			$_SESSION['nis']=$row['nis'];
			$_SESSION['username']=$row['nama_siswa'];
			$_SESSION['level']=$level;
			$_SESSION['islogin']=true;
			header('location:home.php');
	}else{
		echo"<script>alert(' Maaf Username dan Password tidak cocok')</script>";
		
		echo"<script>location='index.php';</script>";
		
		
	}

	}else if($level=='orangtua'){
		$sql="SELECT * FROM tab_ortu WHERE id_ortu='$user' and password='$pass'";
		$query=mysqli_query($koneksi,$sql);
		if(mysqli_num_rows($query)>0){
			$row=mysqli_fetch_array($query);
			$_SESSION['id']=$row['id_ortu'];
			$_SESSION['nis']=$row['nis'];
			$_SESSION['username']=$row['nama_ayah'];
			$_SESSION['level']=$level;
			$_SESSION['islogin']=true;
			header('location:home.php');
	}else{
		echo"<script>alert(' Maaf Username dan Password tidak cocok')</script>";
		echo"<script>location='index.php';</script>";
		
		
	}
}
}
?>
