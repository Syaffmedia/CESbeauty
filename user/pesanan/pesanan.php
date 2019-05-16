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
  <div class="navbar navbar-collapse">
    <div class="nav-item">
      <center><h1>DAFTAR PESANAN</h1></center>
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

			$sql="SELECT * FROM pesanan WHERE penjual='$username' ORDER BY no DESC";
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
          <?php 
          if ($status==0) { ?>
             <a class="btn btn-sm btn-info" href="pesananaksi.php?ID=<?php echo $data['no_beli'];?>">Kirim</a>
          <?php } ?>
          
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