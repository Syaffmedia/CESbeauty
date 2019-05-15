<?php
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$username = $_POST['username'];
$password = $_POST['password'];

include("../include/config.php");

if (empty($username) || empty($password))
	{
		header("location:../?status=Maaf, semua field harus diisi");
	}
else{

$sql = "SELECT * FROM member WHERE username = '$username' AND password = '$password'";

$hasil = mysqli_query($koneksi, $sql);
$record = mysqli_fetch_array($hasil);
$e=mysqli_num_rows($sql);

if($record[username]==$username and $row[password]==$password)
 { //membuat variabel untuk menambahkan variabel ke dalam cookie browser
  $username =$row[username];
  $password =$row[password];
 
  setcookie("username", $username, time()+3600);
  setcookie("password", $password, time()+3600);
 }

if($record['username'] == ""){
	
	header("location:../?status=Maaf, username dan password tidak valid");
	exit();
	}

if($record['username']){
	$_SESSION['username'] = $username;
	print "<script>alert('Selamat datang $username!'); location = '../'; </script>";
	
	}
}
  ?>