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
        <a class="navbar-brand" href="../index.php"><b>&nbsp;CES</b> Beauty</a>
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
              <a class="nav-link" href="list.php">Daftar Barang</a>
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
    <h2>TAMBAH DATA BARANG</h2>
    <hr>
  </div>
	<form method="post" enctype="multipart/form-data">
		<table class="table-responsive table table-condensed">
			<tr>
				<td>Penjual</td>
				<td>
					<input type="text" name="penjual" size="45" maxlength="35"/>	
				</td>
			</tr>
			<tr>
				<td>Nama Barang</td>
				<td>
					<input type="text" name="nama" size="45" maxlength="35"/>	
				</td>
			</tr>
			<tr>
				<td>Kategori</td>
				<td>
					<select name="kat" id="kategori" style="width:200px;">
						<option value="Sayuran">Sayuran</option>
						<option value="Buah">Buah</option>
						<option value="Daging">Daging</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Deskripsi</td>
				<td>
					<input type="text" name="des" size="45" maxlength="35"/>	
				</td>
			</tr>
			<tr>
						<tr>
				<td>harga</td>
				<td>
					<input type="text" name="harga" size="45" maxlength="35"/>	
				</td>
			</tr>
						<tr>
				<td>Jumlah</td>
				<td>
					<input type="text" name="stok" size="45" maxlength="35"/>	
				</td>
			</tr>
						
			<tr>
				<td>Nama Satuan</td>
				<td><input type="text" name="satuan" size="35" maxlength="35" placeholder="ex: kg, butir, buah,..etc"/></td>
			</tr>
			<tr>
				<td>keterangan</td>
				<td>
					<textarea name="ket" size="30" value="" rows="4" cols="45"></textarea>
					<!--<input type="text" name="txtket" size="100" maxlength="500"/>-->	
				</td>
			</tr>
			<tr>
				<td>Upload Gambar</td>
				<td>
					<input type="file" name="foto" size="100" maxlength="500"/>
					<p>.Gambar yang diupload maksimal 1mb <br>.Nama gambar hanya boleh memakai huruf & angka <br>.tidak boleh mengandung karakter khusus <br>.misal: gambar 01.jpg, gambar01.jpg</p>
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
$kat		= $_POST['kat'];
$des		= $_POST['des'];
$harga		= $_POST['harga'];
$stok 		= $_POST['stok'];
$satuan		= $_POST['satuan'];
$ket 		= $_POST['ket'];
$penjual	= $_POST['penjual'];
$foto 		= $_FILES['foto']['name'];
$tmp 		= $_FILES['foto']['tmp_name'];

// Rename nama foto dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis').$foto;

// Set path folder tempat menyimpan fotonya
$path = "../../produk/gambar/".$fotobaru;

if (empty($nama) || empty($harga) || empty($satuan) || empty($des))
	{
		header("location:tambah.php?status=Maaf, semua field harus di isi.");
	}
else{
	if(move_uploaded_file($tmp, $path)){
	$sql = "insert into barang (br_nm, br_kat, br_des, br_hrg, br_stok, br_sat, br_gbr, ket, Penjual) values ('$nama', '$kat', '$des', '$harga', '$stok', '$satuan' ,'$fotobaru', '$ket', '$penjual')";

	$hasil = mysqli_query($koneksi, $sql);
	}
	else{
		echo "Maaf, Gambar gagal untuk diupload.";
	}
	if($hasil){
		echo "<script> alert('Input Produk Sukses.'); location = 'list.php'; </script>";
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