<?php
	include'../include/config.php';
	$id=$_GET['ID'];
	$status="3";
	$sql="SELECT status FROM pesanan WHERE no_beli='$id'";
	$qry=mysqli_query($koneksi,$sql) or die("Query gagal".mysqli_error());
	$data=mysqli_fetch_array($qry);
	$statusawal=$data['status'];
	if ($statusawal!=$status) {
		echo"<script>alert('barang belum dikirim atau sudah diterima!');</script>";
		echo "<meta http-equiv='refresh' content='0; url=pesanan.php'>";	
	}
	else{
		$status2="4";
		$sql2="UPDATE pesanan SET status='$status2' WHERE no_beli='$id'";
	$qry=mysqli_query($koneksi,$sql2) or die("Query gagal".mysqli_error());
	echo"<script>alert('Konfirmasi Berhasil!');</script>";
		echo "<meta http-equiv='refresh' content='0; url=pesanan.php'>";
	}
	 
?>