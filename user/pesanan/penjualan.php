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
              <a class="nav-link" href="../kurir/kurir.php">Data Kurir</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pesanan.php">Data Pesanan</a>
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
  <div class="navbar navbar-collapse">
    <div class="nav-item">
      <center><h1>DAFTAR PENJUALAN</h1></center>
    </div>
    <div class="nav-item" align="right"> <p>
      <a href="#" class="btn btn-lg btn-success"> Cetak Laporan </a></p>
    </div>  
  </div>
   
   <form method="POST" enctype="multipart/form-data">
     <table class="table-responsive table table-condensed">
       <tr>
         <td>Bulan</td>
         <td>
           <select name="bulan">
<option value="01">Januari</option>
<option value="02">Februari</option>
<option value="03">Maret</option>
<option value="04">April</option>
<option value="05">Mei</option>
<option value="06">Juni</option>
<option value="07">Juli</option>
<option value="08">Agustus</option>
<option value="09">September</option>
<option value="10">Oktober</option>
<option value="11">November</option>
<option value="12">Desember</option>
</select>
         </td>
         <td>Tahun</td>
         <td>
            <select name="tahun">
<?php
$mulai= date('Y') - 50;
for($i = $mulai;$i<$mulai + 100;$i++){
    $sel = $i == date('Y') ? ' selected="selected"' : '';
    echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
}
?>
</select>           
         </td>
         <td>
           <input class="btn btn-md btn-info" type="submit" name="save" value="Cetak"/>
         </td>
       </tr>
     </table>
   </form>

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
			<th width="100">Aksi</th>
				
			</tr>
			<?php
			include'../include/config.php';
			$sql="SELECT * FROM pesanan WHERE status='3' ORDER BY no DESC";
			$qry=mysqli_query($koneksi,$sql) or die("Query gagal".mysqli_error());
			
			while ($data = mysqli_fetch_array($qry)){ ?>
			<tr>
        <td style="text-align: center;"><?php echo $data['no']; ?></td>
				<td style="text-align: center;"><?php echo $data['no_beli']; ?></td>
				<td style="text-align: center;"><?php echo $data['nm_barang']; ?></td>
        <td style="text-align: right;"><?php echo 'Rp. '.number_format($data['harga'],0,",",".").''; ?></td>
				<td style="text-align: center;"><?php echo $data['jumlah']; ?></td>
				<td style="text-align: right;"><?php echo 'Rp. '.number_format($data['total'],2,",",".").''; ?></td>
        <td style="text-align: center;"><?php echo $data['nama']; ?></td>
        <td style="text-align: center;">
          <?php
            $status=$data['status'];
            if ($status=3) {
              echo "Sukses";
            }
          ?>  
        </td>
				<td align="center">
					<a class="btn btn-sm btn-info" href="penjualan_detail.php?ID=<?php echo $data['no_beli'];?>">Detail</a>
				</td>
			</tr>
<?php
}

include'../include/config.php';
 if (isset($_POST['save'])){
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
    echo "$bulan";
    echo "$tahun";
    $status="3";
    $sql = "select * from pesanan where status='$status' and month(tanggal)='$bulan' and year(tanggal) = '$tahun'";
    mysqli_query($koneksi,$sql) or die("error".mysqli_error());
 while ($data = mysqli_fetch_array($qry)){ ?>
      <tr>
        <td style="text-align: center;"><?php echo $data['no']; ?></td>
        <td style="text-align: center;"><?php echo $data['no_beli']; ?></td>
        <td style="text-align: center;"><?php echo $data['nm_barang']; ?></td>
        <td style="text-align: center;"><?php echo $data['kd_barang']; ?></td>
        <td style="text-align: right;"><?php echo 'Rp. '.number_format($data['harga'],0,",",".").''; ?></td>
        <td style="text-align: center;"><?php echo $data['jumlah']; ?></td>
        <td style="text-align: right;"><?php echo 'Rp. '.number_format($data['total'],2,",",".").''; ?></td>
        <td style="text-align: center;"><?php echo $data['nama']; ?></td>
        <td style="text-align: center;">
          <?php
            $status=$data['status'];
            if ($status=3) {
              echo "Sukses";

            }
          ?>  
        </td>
        <td align="center">
          <a class="btn btn-sm btn-info" href="penjualan_detail.php?ID=<?php echo $data['no_beli'];?>">Detail</a>
        </td>
      </tr>
<?php
}
  } 
?>

</table>


    <footer class="site-footer">
    <?php include '../include/footer.php'; ?>   
    </footer>

</div>
</body>

</html>