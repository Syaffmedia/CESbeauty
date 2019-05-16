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
            <li class="nav-item active">
              <a class="nav-link" href="pesanan.php">Data Transaksi</a>
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
  <div class="navbar navbar-collapse">
    <div class="nav-item">
      <center><h1>DAFTAR TRANSAKSI</h1></center>
    </div>
  </div>
   <hr>
	<table class="table-responsive table table-condensed">
		
			<tr style="text-align: center;">
        <th width="50">No</th>
				<th width="50">Kd_Transaksi</th>
				<th width="200">Nama Barang</th>
        <th width="120">Harga</th>
				<th width="50">Jml</th>
				<th width="140">Total</th>
        <th width="200">Nama Pemesan</th>
        <th width="50">Status</th>
			<th width="150">Aksi</th>
			</tr>
			<?php
			include'../include/config.php';
      $lama = 1; // lama data yang tersimpan di database dan akan otomatis terhapus setelah 5 hari
 
// proses untuk melakukan penghapusan data
 
$query = "DELETE FROM pesanan
          WHERE DATEDIFF(CURDATE(), tanggal) > $lama AND status='0'";
$hasil = mysqli_query($koneksi,$query);

			$sql="SELECT * FROM pesanan  ORDER BY no DESC";
			$qry=mysqli_query($koneksi,$sql) or die("Query gagal".mysqli_error());
		//	$data=mysqli_fetch_array($qry); 
			
			while ($data = mysqli_fetch_array($qry)){ ?>
			<tr>
        <td style="text-align: center;"><?php echo $data['no']; ?></td>
				<td style="text-align: center;"><?php echo $data['no_beli']; ?></td>
				<td><?php echo $data['nm_barang']; ?></td>
        <td style="text-align: right;"><?php echo 'Rp. '.number_format($data['harga'],0,",",".").''; ?></td>
				<td style="text-align: center;"><?php echo $data['jumlah']; ?></td>
				<td style="text-align: right;"><?php echo 'Rp. '.number_format($data['total'],2,",",".").''; ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td style="text-align: center;">
          <?php
            $status=$data['status'];
            switch ($status) {
              case '0':
                echo "Belum Diproses";
                break;
              case '1':
                echo "Dalam Proses";
                break;
              case '2':
                echo "Ditolak";
                break;
              default:
                echo "Sukses";
                break;
            }
          ?>  
        </td>
				<td>
					<a class="btn btn-sm btn-info" href="detail.php?ID=<?php echo $data['no_beli'];?>">Detail</a>
          <!-- ?php
          if ($status==0) { ?>
             <a class="btn btn-sm btn-info" href="pesananaksi.php?ID=<?php // echo $data['no_beli'];?>">Kirim</a>
          <?php } ?> -->
          
				</td>
			</tr>
<!--?php
}
?> -->
		</table>

</div>
<footer class="site-footer">
    <?php include '../../include/footer2.php'; ?>   
    </footer>

 <!-- start: Java Script -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../css/jquery/jquery.js"></script>
    <script src="../css/bootstrap/js/bootstrap.js"></script>
    <script src="../css/flexslider.js"></script>
    <script src="../css/carousel.js"></script>
    <script src="../css/jquery.cslider.js"></script>
    <script src="../css/slider.js"></script>
    <script def src="../css/js/custom.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script src="../css/jquery/jquery.min.js"></script>
    <script src="../css/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>