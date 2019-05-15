<?php
/*error_reporting(0);
session_start();
ob_start();

$koneksi=mysqli_connect("localhost","root","") or die("gagal konek ke server".mysqli_error());
mysqli_select_db($koneksi,"dbtoko_mini") or die("Database gagal dibuka!".mysqli_error());*/
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "db_tokonline";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass);

if(mysqli_connect_error()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}
mysqli_select_db($koneksi,$db_name) or die("DB ne langka".mysqli_error());


?>