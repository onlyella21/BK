<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login BK</title>
 <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="assets/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
	<!---<link rel="stylesheet" href="assets/css/style.css">-->
  </head>

  <body>

     <h2 class="text-muted" style="text-align:center; ">Bimbingan Konseling SMK Itikurih Hibarna</h2>

<hr>
<div class="col-md-4 col-md-offset-4 form-login">
<div class="panel panel-info">
<div class="panel-heading" style="align:center;">
  	
    <div class="login-form">
       <img src="assets/img/logo1.png"style="float:left; width:40px; height: 40px; margin: 4px 5px 4px 20px;">
     <h2 style="text-align: left;">LOGIN</h2>
     
</div>
<div class="panel-body">
     <form action="cekLogin.php" method="POST">
     <div class="form-group ">
       <input type="text" class="form-control" placeholder="Username" id="username" name="username">
       
     </div>
     <div class="form-group log-status">
       <input type="password" class="form-control" placeholder="Password" id="password" name="password">
       
     </div>
     <div class="form-group ">
                    <select name="level" class="form-control" id="level"required>
                    <option value="">Level</option>
                    <option value="admin">Admin</option>
                    <option value="siswa">Siswa</option>
                    <option value="orangtua">OrangTua</option>
                    </select>
                </div>
                <div class="col-md-offset-4">
    
     <input type="reset" class="btn btn-danger" name="reset" >
      <input type="submit" class="btn btn-success" name="login" value="Login" >
   </div>
   <div class="text-center forget">
    <!--<p>Forgot Password ?</p>-->
</form>
</div>
</div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>