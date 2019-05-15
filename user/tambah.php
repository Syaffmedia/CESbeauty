<?php
include'../include/session.php';
include'../include/config.php';?>

<!DOCTYPE html>
<html>

  <head> 

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>cesbeauty</title>
    <!-- start: CSS --> 
    <link href="../assets/css/bootstrap.css" rel="stylesheet"/>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet"/>
    <link href="../assets/css/style.css" rel="stylesheet"/>
    <link href="../assets/css/css.css" rel="stylesheet"/>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="../assets/css/font-awesome.min.css" rel="stylesheet"/>
  
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <!-- end: CSS -->
  </head>

<body>
    <!-- Navigation -->
    <!-- Navigation -->
<?php 
  if(isset($_SESSION['username']))
  {
    $username = $_SESSION['username'];
    include '../include/navigation2.php';
  }
  else 
  { 
    include '../include/navigation2-before.php';
  }
?>
<div class="container">
	<div align="center">
    <h2>TAMBAH DATA BARANG</h2>
    <hr>
  </div>
	<form method="post" enctype="multipart/form-data">
		<table class="table-responsive table table-condensed">
			<input type="hidden" name="penjual" value="<?php echo $username; ?>" size="45" maxlength="35"/>
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
						<option value="Powder">Powder</option>
						<option value="Foundation">Foundation</option>
						<option value="Blush On">Blush On</option>
						<option value="Mascara">Mascara</option>
						<option value="Eyebrow">Eyebrow</option>
						<option value="Lipstick">Lipstick</option>
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
$path = "../produk/gambar/".$fotobaru;

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