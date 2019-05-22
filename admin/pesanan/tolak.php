<?php
	include'../include/config.php';
	$id=$_GET['ID'];
	//$status="2";
	$sql="DELETE FROM konfirm WHERE no_beli='$id'";
	$qry=mysqli_query($koneksi,$sql) or die("Query gagal".mysqli_error());
	
	$status="2";
	 $sql="UPDATE pesanan SET status='$status' WHERE no_beli='$id'";
	$qry=mysqli_query($koneksi,$sql) or die("Query gagal".mysqli_error());
	echo"<script>alert('Pesanan Ditolak !');</script>";
		echo "<meta http-equiv='refresh' content='0; url=pesanan.php'>";
?>