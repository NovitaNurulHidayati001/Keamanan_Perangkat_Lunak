<?php
    session_start();
 
?>
<?php
include "../koneksi.php";
$err = array();
if (isset($_POST['submit'])) {
    array_push($err,"Harap masukan email");
    $email_user = $_POST['email_user'];
    $no_user = $_POST['no_user'];
    $cek_user = mysqli_query($conn, "SELECT * FROM user WHERE email_user='$email_user' and no_user='$no_user'");
    $row      = mysqli_num_rows($cek_user);
    if ($row == 1) {
        $fetch_pass = mysqli_fetch_assoc($cek_user);
        $cek_pass = $fetch_pass['no_user'];
        if ($cek_pass != $no_user) {
        echo "<script>alert('No salah');</script>";
        } else{
        $_SESSION['log'] =  $fetch_pass ;
        $_SESSION['email_user'] = $email_user;
        echo "<script>alert('Konfirmasi Berhasil');document.location.href='index.php';</script>";
        }
    } else {
    echo "<script>alert('email/no salah');</script>";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
<title>Silahkan Melakukan Konfirmasi</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../css/login.css" rel="stylesheet" type="text/css">

</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Konfirmasi Akun Anda</h1></h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form method="post">
					<input class="text email" type="email" name="email_user" placeholder="Masukan Email Anda" required="">
					<input class="text" type="number" name="no_user" placeholder="Masukan No Anda" required="">
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
	<!-- //main -->
</body>
</html>