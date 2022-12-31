<?php
include "koneksi.php"; //memngambi data dari koneksi.php
date_default_timezone_set("Asia/Jakarta");
$err = array();
if(isset($_POST['submit'])){
	array_push($err);
  $password = md5($_POST["password_user"]);
  $tanggal_login = $_POST['tgl_login'];
  $no_user = $_POST['no_user'];
  //$post digunakan untuk memuat data pengisian form dari html
  mysqli_query($conn,"insert into user set nama_user= '$_POST[nama_user]',
  email_user= '$_POST[email_user]', no_user = '$no_user', password_user = '$password', join_login = '$tanggal_login'");
  //fungsi memasukan atau membuat data di mysql
  echo "<script type='text/javascript'>alert('Register_Berhasil'); 
  window.location='login.php'; </script>";
}
                       
                    
?>
<!DOCTYPE html>
<html>
<head>
<title>Silahkan Melakukan Regristasi</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<link href="css/login.css" rel="stylesheet" type="text/css" >

</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Silahkan Regristasi</h1></h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form method="post">
					<input type="hidden" name="tgl_login" value="<?=date ('Y-m-d H:i')?>">
                    <input class="text" type="text" name="nama_user" placeholder="Nama" required="">
					<input class="text email" type="email" name="email_user" placeholder="Email" required="">
					<input class="text email" type="number" name="no_user" placeholder="No_Telepon" required="">
					<input class="text" type="password" name="password_user" placeholder="Password" required="">
                    <input type="submit" name="submit" value="submit">
				</form>
			</div>
		</div>
		
	</div>
	<!-- //main -->
</body>
</html>