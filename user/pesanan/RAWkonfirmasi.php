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
  <title>Konfirmasi Barang</title>
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
              <a class="nav-link" href="pesanan.php">Data Pesanan</a>
            </li>
            <li class="nav-item">
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
    <h2>KONFIRMASI PESANAN</h2>
    <hr>
  </div>
	<table class="table-responsive table table-condensed">
		
			<tr style="text-align: center;">
        <th width="50">No</th>
				<th width="100">Kode Pembelian</th>
				<th width="100">Kode Transaksi</th>
        <th width="100">No Rekening</th>
        <th width="150">Nama Rekening</th>
				<th width="50">Tanggal</th>
				<th width="140">Total</th>
        <th width="200">Bukti Pembayaran</th>
			  <th width="100">Aksi</th>
				
			</tr>
			<?php
			include'../include/config.php';
      $status="0";
			$sql="SELECT * FROM konfirm WHERE status='$status' ORDER BY no DESC";
			$qry=mysqli_query($koneksi,$sql) or die("Query gagal".mysqli_error());
		//	$data=mysqli_fetch_array($qry); 
			
			while ($data = mysqli_fetch_array($qry)){ ?>
			<tr>
        <td style="text-align: center;"><?php echo $data['no']; ?></td>
				<td style="text-align: center;"><?php echo $data['no_beli']; ?></td>
        <td style="text-align: center;"><?php echo $data['kd_trans']; ?></td>
        <td style="text-align: right;"><?php echo $data['norek']; ?></td>
				<td style="text-align: center;"><?php echo $data['narek']; ?></td>
        <td style="text-align: center;"><?php echo $data['tanggal']; ?></td>
				<td style="text-align: right;"><?php echo 'Rp. '.number_format($data['total'],2,",",".").''; ?></td>
        <td style="text-align: center;"><img width="200px" height="200px" src="../../gambar/konfirmasi/<?php echo $data['bukti']; ?>"></td>
				<td align="center">
					<a class="btn btn-sm btn-success" href="acc.php?ID=<?php echo $data['no_beli'];?>">V</a>
          <a class="btn btn-sm btn-danger" href="tolak.php?ID=<?php echo $data['no_beli'];?>">X</a>
				</td>
			</tr>
<?php
}
?>
		</table>
		<footer class="site-footer">
    <?php include '../include/footer.php'; ?>   
    </footer>

</div>
</body>

</html>