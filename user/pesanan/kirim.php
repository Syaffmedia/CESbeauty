<?php
	include'../include/config.php';
	$id=$_POST['nobeli'];
	$kurir=$_POST['kurir'];
	$status="1";
	$sql="UPDATE konfirm SET status='$status' WHERE no_beli='$id'";
	$qry=mysqli_query($koneksi,$sql) or die("Query gagal".mysqli_error());
		//	$data=mysqli_fetch_array($qry);
	$status2="1";
	 $sql="UPDATE pesanan SET status='$status2', kurir='$kurir' WHERE no_beli='$id'";
	$qry=mysqli_query($koneksi,$sql) or die("Query gagal".mysqli_error());
	echo"<script>alert('Pesanan Berhasil Di ACC !');</script>";
		echo "<meta http-equiv='refresh' content='0; url=pesanan.php'>";
?>