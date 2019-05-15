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
        <a class="navbar-brand" href="../index.php"><b>&nbsp;Bang</b> Sayur</a>
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
            <li class="nav-item">
              <a class="nav-link" href="../list/list.php">Daftar Barang</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="kurir.php">Data Kurir</a>
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
    <h2>TAMBAH KURIR</h2>
    <hr>
  </div>
	<form method="post" enctype="multipart/form-data">
		<table class="table-responsive table table-condensed">
			<tr>
				<td>Nama Lengkap</td>
				<td>:</td>
				<td>
					<input type="text" name="nama" size="45" maxlength="35"/>	
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td>
					<input type="text" name="alamat" size="45" maxlength="35"/>	
				</td>
			</tr>
			<tr>
				<td>Telepon</td>
				<td>:</td>
				<td>
					<input type="text" name="telepon" size="45" maxlength="35"/>	
				</td>
			</tr>		
			<tr>
				<td>&nbsp;</td>
				<td>
					<input class="btn btn-md btn-info" type="submit" name="save" value="Tambah"/>
				</td>
			</tr>
		</table>
	</form>

<?php
if (isset($_POST['save'])){
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include'../include/config.php';
$nama		= $_POST['nama'];
$alamat		= $_POST['alamat'];
$telepon	= $_POST['telepon'];
if (empty($nama) || empty($alamat) || empty($telepon))
	{
		header("location:tambah.php?status=Maaf, semua field harus di isi.");
	}
else{
	$sql = "insert into kurir (nama, alamat, telp) values ('$nama', '$alamat', '$telepon')";

	$hasil = mysqli_query($koneksi, $sql);
	if($hasil){
		echo "<script> alert('Input Kurir Baru Sukses.'); location = 'kurir.php'; </script>";
	}
	else {
		echo "Data gagal disimpan <br>";
		 }	
	}
 
}
?>

		<footer class="site-footer">
    <?php include '../include/footer.php'; ?>   
    </footer>

</div>
</body>
</html>