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