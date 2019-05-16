<?php include'../include/session.php';?>
<?php include'../include/config.php';?>
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
				<th width="300">Nama Barang</th>
        <th width="50">Jml</th>
        <th width="120">Harga</th>
				<th width="140">Total</th>
        <th width="100">Kurir</th>
        <th width="50">Status</th>
			<th width="100">Aksi</th>
				
			</tr>
			<?php
			include'../include/config.php';
      $lama = 1; // lama data yang tersimpan di database dan akan otomatis terhapus setelah 5 hari
 
// proses untuk melakukan penghapusan data
 
$query = "DELETE FROM pesanan
          WHERE DATEDIFF(CURDATE(), tanggal) > $lama AND status='0'";
$hasil = mysqli_query($koneksi,$query);

$username = $_SESSION['username'];
			$sql2="SELECT nama FROM member WHERE username='$username'";
			$qry2=mysqli_query($koneksi,$sql) or die("Query1 gagal".mysqli_error());
		  $data2=mysqli_fetch_array($qry2); 
      $nama=$data2['nama'];
			
      $sql="SELECT * FROM pesanan WHERE nama='$nama' ORDER BY no DESC";
      //$sql="SELECT DISTINCT no_beli, nm_barang = substring ((SELECT ', ' + nm_barang FROM pesanan S2 WHERE S2.no_beli = S1.no_beli FOR XML path(''), elements), 3, 500) FROM pesanan S1";
      $qry=mysqli_query($koneksi,$sql) or die("Query gagal".mysqli_error());
			while ($data = mysqli_fetch_array($qry)){ ?>
			<tr>
        <td style="text-align: center;"><?php echo $data['no']; ?></td>
				<td style="text-align: center;"><?php echo $data['no_beli']; ?></td>
				<td><?php echo $data['nm_barang']; ?></td>
        <td style="text-align: center;"><?php echo $data['jumlah']; ?></td>
        <td style="text-align: right;"><?php echo 'Rp. '.number_format($data['subtotal'],0,",",".").''; ?></td>
				<td style="text-align: right;"><?php echo 'Rp. '.number_format($data['total'],2,",",".").''; ?></td>
        <td><?php 
        $kurir=$data['kurir'];
        switch ($kurir) {
          case '0':
            echo "Tahap Packing";
            break;
          
          default:
            echo "$kurir";
            break;
        }
         ?></td>
        <td style="text-align: center;">
          <?php
            $status=$data['status'];
            switch ($status) {
              case '0':
                echo "Menunggu";
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
          <?php 
            if ($status==1) { ?>
              <a class="btn btn-sm btn-info" href="konfirmasi.php?ID=<?php echo $data['no_beli'];?>">Konfirmasi</a>
            <?php } ?>
					
				</td>
			</tr>
<?php
}
?>
		</table>
  </div>
    <?php include '../include/footer2.php'; ?>   

</body>

</html>