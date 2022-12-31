<?php
date_default_timezone_set("Asia/Jakarta");
session_start();
if (!isset($_SESSION['log'])){
  echo "<script>alert('ANDA HARUS LOGIN DAHULU');document.location.href='login.php';</script>";
    exit;
    // return var_dump($_SESSION);
}

?>

<?php
  include "koneksi.php";
  $email_user =$_SESSION['email_user'];
  $sql = "SELECT * FROM user WHERE email_user ='$email_user'";
  // return var_dump($sql);
  $query = mysqli_query($conn, $sql);
  $data = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>
<head>
<title>WELCOME</title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<body>
	<audio autoplay> 
		<source src="lagu/laguburutani.mp3" type="audio/mp3">
	</audio>

	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>WELCOME</h1></h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<h1 class="coba"><?= $data['nama_user'] ?></h1>
				<h3>Anda Mendaftar Website ini pada</h3>
				<h3><?= $data['join_login'] ?> </h3>
				<h4>Anda Login Pada Tangal dan Jam</h4>
				<h4><?= $data['data_login'] ?></h4>
				<form method="post">
                    <input type="hidden" name="jam_keluar" value="<?=date ('Y-m-d H:i')?>">
                    <input type="submit" name="logout" value="Logout">
				</form>
				<?php
               
                include "koneksi.php";
                if (isset($_POST['logout'])) {
					$email_user =$_SESSION['email_user'];
                    $keluarlogin = $_POST['jam_keluar'];
                    mysqli_query($conn, "UPDATE user SET keluar_login ='$keluarlogin' WHERE email_user='$email_user'");
					echo "<script> alert('Yakin Keluar?');document.location.href='logout.php';</script>";	
                }
				?>

			
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
<script>
function kelapKelip() {
$('.coba').fadeOut();
$('.coba').fadeIn(); 
}
setInterval(kelapKelip, 1000); 
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'></script>
</body>
</html>
