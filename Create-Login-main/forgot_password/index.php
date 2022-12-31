<?php
session_start();
if (!isset($_SESSION['log'])){
  echo "<script>alert('Anda Harus Konfirmasi Akun Dahulu');document.location.href='konfirmasi.php';</script>";
    exit;
    // return var_dump($_SESSION);
}

?>
<?php             
include "../koneksi.php";
$email_user =$_SESSION['email_user'];
$sql = "SELECT * FROM user WHERE email_user ='$email_user'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($query);
$err = array();
if (isset($_POST['submit'])) {
	array_push($err);
	$password_user = md5($_POST["password_user"]);
	mysqli_query($conn, "UPDATE user SET password_user ='$password_user' WHERE email_user='$email_user'");
	echo "<script> alert('Password Berhasil diganti');document.location.href='logout.php';</script>";	
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Silahkan Melakukan Regristasi</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../css/style.css" rel="stylesheet" type="text/css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<body>
	<div class="main-w3layouts wrapper">
		<h1>Silahkan Ganti Password Anda</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">  
				<form method="post">
                    <input class="text" type="password" name="password_user" placeholder="Ganti Password Anda" required="">
                    <input type="submit" name="submit" value="submit">
				</form>	
			</div>
		</div>
		
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>
