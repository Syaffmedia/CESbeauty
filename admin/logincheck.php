<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<?php
if(!session_id())session_start();
include "../config.php";

$txtUser	= $_POST['txtUser'];
$txtPass	= $_POST['txtPass'];

if(trim($txtUser) == "") {
	echo "<b align=center>Username</b> belum diisi";
	include "login.php";
}
else if (strlen(trim($txtPass)) <= 5 ) {
	echo "<b>Password </b> minimal 6 digit";
	include "login.php";
}
else {
	$sqlPeriksa = "SELECT * FROM admin WHERE username='$txtUser'
					AND password='$txtPass'";
	$qryPeriksa = mysqli_query( $koneksi, $sqlPeriksa);
	$hslPeriksa = mysqli_num_rows($qryPeriksa);
	if ($hslPeriksa >= 1 ) { 
		# Jika sukses
			
		$_SESSION['SES_ADMIN']= '$txtUser';
		echo"<script>alert('Selamat Datang, $txtUser!');</script>";
		
		#Redireksi menuju index.php
		echo "<meta http-equiv='refresh' content='0; url=index.php'>";

		exit;
	}
	else {
		#Jika gagal
		echo"<script>alert('Login Gagal !');</script>";
		echo "<meta http-equiv='refresh' content='0; url=index.php'>";
	
	}
}
?>
