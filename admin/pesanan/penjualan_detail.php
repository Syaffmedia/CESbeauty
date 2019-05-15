<?php
if(!session_id())session_start();
if(!isset($_SESSION['SES_ADMIN'])) {
  echo "<div align=center><b></b><br>";
  echo "<script>alert('AKSES DILARANG! User tidak dikenal. '); window.location = '../login.php'</script>";
  exit;
}
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
            <li class="nav-item">
              <a class="nav-link" href="../list/list.php">Daftar Barang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pesanan.php">Data Transaksi</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="penjualan.php">Data Penjualan</a>
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
		<h2>DETAIL PENJUALAN</h2>
		<hr>
	</div>

	<table class="table-responsive table table-condensed">
			<tr style="text-align: center;">
				<th width="50">Kd_Transaksi</th>
				<th width="450">Alamat</th>
				<th width="100">Kode Pos</th>
				<th width="100">Kota</th>
				<th width="100">Email</th>
				<th width="100">Telepon</th>
        <th width="100">Kurir</th>
				
			</tr>
			<?php
			include'../include/config.php';
			$id=$_GET['ID'];
			$sql="SELECT * FROM pesanan WHERE  no_beli='$id'";
			$qry=mysqli_query($koneksi,$sql) or die("Query gagal".mysqli_error());
		//	$data=mysqli_fetch_array($qry); 
			
			while ($data = mysqli_fetch_array($qry)){ ?>
			<tr>
				<td><?php echo $data['no_beli']; ?></td>
				<td><?php echo $data['alamat']; ?></td>
				<td style="text-align: center;"><?php echo $data['kdpos']; ?></td>
				<td><?php echo $data['kota']; ?></td>
				<td><?php echo $data['email'];?></td>
				<td style="text-align: center;"><?php echo $data['telp']; ?></td>
        <td><?php echo $data['kurir'];?></td>
			</tr>
<?php
}
?>
		</table>
		<div align="right"><a href="penjualan.php" class="btn btn-md btn-info">Kembali</a></div>
		<footer class="site-footer">
    <?php include '../include/footer.php'; ?>   
    </footer>

</div>
</body>

</html>