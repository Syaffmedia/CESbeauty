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
    include '../include/navigation3.php';
  }
  else 
  { 
    include '../include/navigation2-before.php';
  }
?>
<div class="container">
  <div class="navbar navbar-collapse">
    <div class="nav-item">
      <center><h1>DAFTAR BARANG</h1></center>
    </div>  
  </div>
   <hr>
  
	<table class="table-responsive table table-condensed">
    <tr>
      <td colspan="5">&nbsp;</td>
      <td><a href="#" class="btn btn-md btn-warning"> Pesanan </a></p></td>
      <td><a href="tambah.php" class="btn btn-md btn-warning"> Tambah Produk </a></p></td>
    </tr>
			<tr>
				<th width="50">ID</th>
				<th width="150">Nama</th>
				<th width="100"><center>Harga</center></th>
				<th width="50"><center>Stok</center></th>
				<th width="300">Keterangan</th>
				<th width="150">Foto</th>
			<th width="100"><center>Aksi</center></th>
				
			</tr>
			<?php
			include'../include/config.php';
			$sql="SELECT * FROM barang WHERE Penjual='$username' ORDER BY br_id ASC";
			$qry=mysqli_query($koneksi,$sql) or die("Query gagal".mysqli_error());
		//	$data=mysqli_fetch_array($qry); 
			
			while ($data = mysqli_fetch_array($qry)){ ?>
			<tr>
				<td><?php echo $data['br_id']; ?></td>
				<td><?php echo $data['br_nm']; ?></td>
				<td align="right"><?php echo 'Rp. '.number_format($data['br_hrg'],0,",",".").''; ?></td>
				<td align="center"><?php echo $data['br_stok']; ?></td>
				<td><?php echo $data['ket']; ?></td>
				<td><img width="100px" height="100px" src="../produk/gambar/<?php echo $data['br_gbr']; ?>"></td>
				<td align="center">
					<a class="btn btn-sm btn-success" href="ubah.php?ID=<?php echo $data['br_id'];?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
					<a class="btn btn-sm btn-danger" href="hapus.php?ID=<?php echo $data['br_id'];?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
				</td>
			</tr>
<?php
}
?>
    </table>
  </div>
    <?php include '../include/footer2.php'; ?> 
</div>



 <!-- start: Java Script -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="css/jquery/jquery.js"></script>
    <script src="css/bootstrap/js/bootstrap.js"></script>
    <script src="css/flexslider.js"></script>
    <script src="css/carousel.js"></script>
    <script src="css/jquery.cslider.js"></script>
    <script src="css/slider.js"></script>
    <script def src="js/custom.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script src="css/jquery/jquery.min.js"></script>
    <script src="css/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>