<?php
if(!session_id())session_start();
if(!isset($_SESSION['SES_ADMIN'])) {
  echo "<div align=center><b></b><br>";
  echo "<script>alert('AKSES DILARANG! User tidak dikenal. '); window.location = '../login.php'</script>";
  exit;
}
include '../include/session.php';
include '../include/config.php';
?>
<!DOCTYPE html>
<html>

<head>
        <!-- start: CSS --> 
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">
    <link href="../css/css.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fonts/font-awesome.min.css">
    <!-- end: CSS -->
</head>

<body>
<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="row-lg-3">
        <img src="../gambar/logo.png" height="40px">
      </div>
      <div class="row-lg-3">
        <a class="navbar-brand" href="index.php"><b>&nbsp;Bang</b> Sayur</a>
      </div>
      
      <div class="row-lg-6" >
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="../index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="../list/list.php">Daftar Barang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../kurir/kurir.php">Data Kurir</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../pesanan/pesanan.php">Data Pesanan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../pesanan/penjualan.php">Data Penjualan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav> 
     
<div class="container">
	<div align="center">
    	<h2>UPDATE DATA BARANG</h2>
    	<hr>
  	</div>
	<?php 
		$id=$_GET['ID'];
		$sql="SELECT * FROM kurir WHERE  id='$id'";
		$qry=mysqli_query($koneksi,$sql) or die("Query gagal".mysqli_error());
		$data=mysqli_fetch_array($qry);
		$nama		=$data['nama'];
		$alamat	=$data['alamat'];
		$telp		=$data['telp'];
	?>
	
	<form method="post" enctype="multipart/form-data">
		<table class="table table-hover text-centered">
			<tr>
				<td style="text-align: right;">ID</td>
				<td><?php echo $id; ?></td><input type="hidden" name="id" value="<?php echo "$id"; ?>">
			</tr>
			<tr>
				<td style="text-align: right;">Nama</td>
				<td><input type="text" name="nama" size="35" value="<?php echo "$nama";?>" /></td>
			</tr>
			<tr>
				<td style="text-align: right;">Alamat</td>
				<td><input type="text" name="alamat" size="35" value="<?php echo "$alamat";?>" /></td>
			</tr>
			<tr>
				<td style="text-align: right;">No Telepon</td>
				<td><input type="text" name="telp" size="35" value="<?php echo "$telp";?>"/>	</td>
			</tr>
=			<tr>
				<td> </td>
				<td><input class="btn btn-md btn-info" type="submit" name="simpan" value="Update"/></td>
			</tr>
				</table>
		</form>

		<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
 if (isset($_POST['simpan'])){
$id			= $_POST['id'];
$namabr		= $_POST['nama'];
$alamatbr	= $_POST['alamat'];
$telpbr		= $_POST['telp'];

	$query	= "UPDATE kurir SET nama='".$namabr."', alamat='".$alamatbr."', telp='".$telpbr."' WHERE id='".$id."'";
    $sql	= mysqli_query($koneksi, $query);
	if($sql){
		echo "<script> alert('Perubahan data berhasil.'); location = 'kurir.php'; </script>";
	}
	else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    //echo "<br><a href='../produk.php'>Kembali Ke Form</a>";
  }
}
?>

		<footer class="site-footer">
    <?php include '../include/footer.php'; ?>   
    </footer>

</div>
</body>

</html>