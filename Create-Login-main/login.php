<?php
    session_start();
    // menyimpan sesion di login
 
?>
<?php
include "koneksi.php";
date_default_timezone_set("Asia/Jakarta"); //membuat fungsi jam sesuai asia/jakarta
$err = array();
if (isset($_POST['login'])) {
    //konfigurasi ketika klik login
    array_push($err);
    $email_user = $_POST['email_user']; // form pengisian di html yaitu emal
    $password = md5($_POST["password_user"]); //form pengisisan password yang telah di enskripsi dengan md5
    $joinlogin = $_POST['jam_login']; //form pengisian jam login
    $cek_user = mysqli_query($conn, "SELECT * FROM user WHERE email_user='$email_user' and password_user='$password'");// menampilkan data keseluruan
    $query = mysqli_query($conn, "UPDATE user SET data_login ='$joinlogin' WHERE email_user='$email_user' and password_user='$password'");//update data di mysll
    $row      = mysqli_num_rows($cek_user);
    if ($row == 1) {
        $fetch_pass = mysqli_fetch_assoc($cek_user);
        $cek_pass = $fetch_pass['password_user'];
        if ($cek_pass != $password) {
        echo "<script>alert('password salah');</script>";
        } else{
        $_SESSION['log'] =  $fetch_pass ;
        $_SESSION['email_user'] = $email_user;
        if($query){}
        echo "<script>alert('login Berhasil');document.location.href='index.php';</script>";
        }
    } else {
    echo "<script>alert('email/password salah');</script>";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/login.css" rel="stylesheet" type="text/css">

</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Login</h1></h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form method="post">
                    <input type="hidden" name="jam_login" value="<?=date ('Y-m-d H:i')?>">
					<input class="text email" type="email" name="email_user" placeholder="Masukan Email Anda" required="">
					<input class="text" type="password" name="password_user" placeholder="Masukan Password Anda" required="">
                    <input type="submit" name="login" value="Login">
				</form>
                <a href="forgot_password/konfirmasi.php">forgot password</a>
                <br>
				<p>Don't have an Account? <a href="sign.php"> Registrasi Now!</a></p>
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
	<!-- //main -->
</body>
</html>