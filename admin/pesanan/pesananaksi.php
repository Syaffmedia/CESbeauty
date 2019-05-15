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
            <li class="nav-item">
              <a class="nav-link" href="../kurir/kurir.php">Data Kurir</a>
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
  <div class="navbar navbar-collapse">
    <div class="nav-item">
      <center><h1>DAFTAR PESANAN</h1></center>
    </div>

  </div>
   <hr>
   <form method="POST" action="kirim.php" enctype="multipart/form-data">
	<table class="table-responsive table table-condensed">
		<?php
      include'../include/config.php';
      $id=$_GET['ID'];
      $sql="SELECT * FROM pesanan WHERE  no_beli='$id'";
      $qry=mysqli_query($koneksi,$sql) or die("Query gagal".mysqli_error());
    //  $data=mysqli_fetch_array($qry); 
      
      while ($data = mysqli_fetch_array($qry)){ ?>

			<tr>
        <td>Kode Pembelian</td>
        <td>:</td>
        <td>
          <input type="hidden" name="nobeli" value="<?php echo $data['no_beli']; ?>">
          <?php echo $data['no_beli']; ?></td>
      </tr>
			<tr>
        <td>Nama Barang</td>  
        <td>:</td>
        <td><?php echo $data['nm_barang']; ?></td>
      </tr>
      <tr>
        <td>Harga</td>
        <td>:</td>
        <td><?php echo $data['harga']; ?></td>
      </tr>
      <tr>
        <td>Jumlah</td>
        <td>:</td>
        <td><?php echo $data['jumlah']; ?></td>
      </tr>
			<tr>
        <td>Total</td>
        <td>:</td>
        <td><?php echo $data['total']; ?></td>
      </tr>
			<tr>
        <td>Nama Pemesan</td>
        <td>:</td>
        <td><?php echo $data['nama']; ?></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <TD>:</TD>
        <td><?php echo $data['alamat']; ?></td>
      </tr>
      <tr>
        <td>Kota</td>
        <td>:</td>
        <td><?php echo $data['kota']; ?></td>
      </tr>
      <tr>
        <td>No Telp</td>
        <td>:</td>
        <td><?php echo $data['telp']; ?></td>
      </tr>
      <tr>
        <td>Kurir</td>
        <td>:</td>
        <td>
          <?php 
          include '../include/config.php';
            echo "<select name='kurir'>";
            $sql=mysqli_query($koneksi,"SELECT * FROM kurir ORDER BY nama ASC") or die("Query gagal".mysqli_error());
            echo "<option value='pilih' selected class='required' size='50'>Pilih kurir</option>";
            while ($data=mysqli_fetch_array($sql)) { ?>
            <option value="<?php echo "$data[nama]"; ?>"><?php echo "$data[nama]"; ?> </option>";
              <?php
            }
         ?>
        </td>
        
      </tr>
      
      <tr>
        <td>
          <input type="submit" name="submit" value="Proses">
        </td>
      </tr>
       <?php
}
?> 
			
		</table>
    </form>
		<footer class="site-footer">
    <?php include '../include/footer.php'; ?>   
    </footer>

</div>
</body>

</html>