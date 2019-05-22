<?php
	include'../include/config.php';
	$id=$_GET['ID'];
	$status="1";
	$sql="UPDATE konfirm SET status='$status' WHERE no_beli='$id'";
	$qry=mysqli_query($koneksi,$sql) or die("Query gagal".mysqli_error());
		//	$data=mysqli_fetch_array($qry);
	$status2="3";
	 $sql="UPDATE pesanan SET status='$status2' WHERE no_beli='$id'";
	$qry=mysqli_query($koneksi,$sql) or die("Query gagal".mysqli_error());
	echo"<script>alert('Pesanan Berhasil Di ACC !');</script>";
		echo "<meta http-equiv='refresh' content='0; url=pesanan.php'>";
?>