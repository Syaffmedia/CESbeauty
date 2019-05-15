<?php 
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if(!isset($_SESSION['username'])){
	unset($_SESSION['username']);
	session_destroy();
	}	
if(isset($_SESSION['username'])){
	$username = $_SESSION['username'];
	}
	
	include "include/config.php";
	$query=mysqli_fetch_array(mysqli_query($koneksi ,"select * from member where username='$username'"));
	$query2=mysqli_fetch_array(mysqli_query($koneksi ,"select * from tabel_topik where pengirim='$username'"));

//Menghitung jumlah topik dan jumlah member
	$query3 = mysqli_query($koneksi ,"SELECT * FROM tabel_topik");
	$query4 = mysqli_query($koneksi ,"SELECT * FROM tabel_member");
	$jumlah_topik = mysqli_num_rows($query3);
	$jumlah_member = mysqli_num_rows($query4);
//mencari total view (dilihat)
$id_topik = $_GET['id_topik'];
$query6=mysqli_fetch_array(mysqli_query($koneksi ,"select dilihat from tabel_topik where id_topik='$id_topik'"));
$dilihat = $query6 ['dilihat'] + 1;
$sql2 = "UPDATE tabel_topik SET dilihat='$dilihat' WHERE id_topik='$id_topik'";
$hasil2 = mysqli_query($koneksi ,$sql2);

$id_balasan   = $_GET['id_balasan'];
$querybal=mysqli_fetch_array(mysqli_query($koneksi ,"select dilihat from tabel_komentar where id_balasan='$id_balasan'"));
$hasil3 = mysqli_query($koneksi ,$querybal);
?>