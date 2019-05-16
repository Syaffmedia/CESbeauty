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
        <a class="navbar-brand" href="index.php"><b>&nbsp;CES</b> Beauty</a>
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
    <h2>UPDATE DATA BARANG</h2>
    <hr>
  </div>
	<?php 
			//jalankan query
						//jalankan query
			$id=$_GET['ID'];
			$sql="SELECT * FROM barang WHERE  br_id='$id'";
			$qry=mysqli_query($koneksi,$sql) or die("Query gagal".mysqli_error());
			$data=mysqli_fetch_array($qry);
			$ID			=$data['br_id'];
			$nama		=$data['br_nm'];
			$deskripsi	=$data['br_des'];
			$harga		=$data['br_hrg'];
			$stok		=$data['br_stok'];
			$satuan		=$data['br_sat'];
			$foto		=$data['br_gbr'];
			$ket		=$data['ket'];
			$Penjual    =$data['Penjual'];
	 ?>
	

<form method="post" enctype="multipart/form-data">
		<table class="table table-hover text-centered">
			<tr>
				<td style="text-align: right;">ID</td>
				<td><?php echo $ID; ?></td><input type="hidden" name="br_id" value="<?php echo $ID ?>">
			</tr>
			<tr>
				<td style="text-align: right;">Penjual</td>
				<td><input type="text" name="penjual" size="35" value="<?php echo "$Penjual";?>" /></td>
			</tr>
			<tr>
				<td style="text-align: right;">Nama Produk</td>
				<td><input type="text" name="br_nm" size="35" value="<?php echo "$nama";?>" /></td>
			</tr>
			<tr>
				<td style="text-align: right;" valign="middle" >Foto Saat Ini</td>
				<td><img src="../../produk/gambar/<?php echo "$foto";?>" width="100px" height="100px" /></td>
			</tr>
			<tr>
				<td style="text-align: right;">Kategori</td>
				<td>
					<select name="br_kat" id="kategori" style="width:200px;">
						<option value="Sayuran">Sayuran</option>
						<option value="Buah">Buah</option>
						<option value="Daging">Daging</option>
					</select>
				</td>
			</tr>
			<tr>
				<td style="text-align: right;">Deskripsi</td>
				<td><input type="text" name="br_des" size="35" value="<?php echo "$deskripsi";?>"/>	</td>
			</tr>
			<tr>
				<td style="text-align: right;">Harga</td>
				<td><input type="text" name="br_hrg" size="35" value="<?php echo "$harga";?>"/></td>
			</tr>
			<tr>
				<td style="text-align: right;">Stok</td>
				<td><input type="text" name="br_stok" size="35" value="<?php echo "$stok";?>" /></td>
			</tr>
			<tr>
				<td style="text-align: right;">Satuan</td>
				<td><input type="text" name="br_sat" size="35" value="<?php echo "$satuan";?>" /></td>
			</tr>
			<tr>
				<td style="text-align: right;">Keterangan</3d>
				<td><textarea name="ket" size="30" value="" rows="4" cols="38"><?php echo "$ket";?></textarea></td>
			</tr>
			<tr>
				<td style="text-align: right;">Ubah Gambar</td>
				<td><input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br /><br />
					<input type="file" name="br_gbr" size="50" maxlength="500"/></td>
			</tr>		
			<tr>
				<td> </td>
				<td><input class="btn btn-md btn-info" type="submit" name="simpan" value="Update"/></td>
			</tr>
				</table>
		</form>

		<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
 if (isset($_POST['simpan'])){
$id			= $_POST['br_id'];
$nama		= $_POST['br_nm'];
$penjual	= $_POST['penjual'];
$des		= $_POST['br_des'];
$harga		= $_POST['br_hrg'];
$stok 		= $_POST['br_stok'];
$satuan		= $_POST['br_sat'];
$ket 		= $_POST['ket'];
$kat 		= $_POST['kat'];

if(isset($_POST['ubah_foto'])){
	
$foto 	= $_FILES['br_gbr']['name'];
$tmp 	= $_FILES['br_gbr']['tmp_name'];
$fotobaru = date('dmYHis').$foto;
$path = "../../../produk/gambar/".$fotobaru;

if	(move_uploaded_file($tmp, $path)){ 
	$query = "SELECT * FROM barang WHERE br_id='".$id."'";
    $sql = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_array($sql);
	
    // Cek apakah file foto sebelumnya ada di folder images
    if(is_file("../../../gambar/".$data['br_gbr'])) // Jika foto ada
      unlink("../../../gambar/".$data['br_gbr']); // Hapus file foto sebelumnya yang ada di folder images
	
	$query	= "UPDATE barang SET br_nm='".$_POST['br_nm']."', br_kat='".$_POST['kat']."', br_des='".$_POST['br_des']."', br_hrg='".$_POST['br_hrg']."', br_stok='".$_POST['br_stok']."', br_sat='".$_POST['br_sat']."', br_gbr='$fotobaru', ket='".$_POST['ket']."', Penjual='".$_POST['penjual']."' WHERE br_id='".$_POST['br_id']."'";
    $sql	= mysqli_query($koneksi, $query);
	
	if($sql){
		echo "<script> alert('Ubah Produk Sukses.'); location = 'list.php'; </script>";
	}
	else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    //echo "<br><a href='../produk.php'>Kembali Ke Form</a>";
  }
}else{
    // Jika gambar gagal diupload, Lakukan :
    echo "Maaf, Gambar gagal untuk diupload.";
    //echo "<br><a href='../produk.php'>Kembali Ke Form</a>";
  }
}
else
{
	$query	= "UPDATE barang SET br_nm='$nama', br_des='$des', br_hrg='$harga', br_stok='$stok', br_sat='$satuan', ket='$ket', Penjual='".$_POST['penjual']."' WHERE br_id='$id'";
    $sql	= mysqli_query($koneksi, $query);
	if($sql){
		echo "<script> alert('Input Produk Sukses.'); location = 'list.php'; </script>";
	}
	else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
  }
}
}
?>


</div>
</body>
<footer class="site-footer">
    <?php include '../../include/footer2.php'; ?>   
    </footer>
</html>