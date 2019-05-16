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
?><div class="container">
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
			$sql="SELECT * FROM pesanan WHERE penjual='$username' status='3' AND  ORDER BY no DESC";
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