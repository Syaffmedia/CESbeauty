<?php 
include'../include/config.php';
//	$koneksi=mysqli_connect("localhost","root","") or die("gagal konek ke server".mysqli_error());
 
	if ($koneksi) {
		//mysqli_select_db($koneksi,"barang") or die("Database gagal dibuka!".mysqli_error());
		$id=$_GET['ID'];
		
		$sql="DELETE FROM kurir WHERE id='$id'";
		$qry=mysqli_query($koneksi,$sql) or die("Query gagal dihapus".mysqli_error());
		echo"<script>alert('Kurir berhasil dihapus !');</script>";
		echo "<meta http-equiv='refresh' content='0; url=kurir.php'>";
	}
 ?>