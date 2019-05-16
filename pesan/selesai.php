<?php require_once("../include/config.php");
 include'../include/session.php'; 
  if(isset($_SESSION['username']))
  {
    $username = $_SESSION['username'];
  }
  else 
  { 
    header("location:../");
  }
?>

<!DOCTYPE html>
<html>

<head>
        <!-- start: CSS --> 
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
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!-- start: Container -->
		<div class="container">

			<!-- start: Table -->
                 <div class="table-responsive">
                 <div class="title"><center><h3>Checkout Berhasil</h3></center></div>
                 <div class="hero-unit"><h5><center>Selamat! Data berhasil dikirimkan. Permintaan anda akan segera kami proses.</center></h5></div>
                 <div class="hero-unit"> 
    <?php
			if($_POST['finish']){
				

				echo 'Terima kasih Anda sudah berbelanja di CES Beauty. Mohon simpan informasi di bawah ini:';
				echo '
				<p>
					1. Kode Transaksi pesanan anda: <b> '.$_POST['nopembelian'].'</b> 
					<br>
					2. Total biaya untuk pembelian Produk adalah <b> Rp. '.number_format($_POST['total'],2,",",".").',- </b>
					<br>
					3. biaya bisa di bayarkan saat barang datang (COD). </b>
					<br>
					4. Simpan bukti transfer untuk melakukan konfirmasi.<br>';
				echo '5. Dan barang akan kami kirim ke alamat di bawah ini:</p>';
				echo '<p><b>_-- Nama Lengkap : '.$_POST['nm_usr'].'<br>';
                echo '_-- Alamat : '.$_POST['almt_usr'].'<br>';
                echo '_-- Kode Pos : '.$_POST['kp_usr'].'<br>';
                echo '_-- Kota : '.$_POST['kota_usr'].'<br>';
                echo '_-- No Telepon : '.$_POST['tlp'].'<br>';
                echo '_-- Total Belanja : Rp. '.$_POST['total'].',-</b></p><br>';
                echo '<a href="../user/pesanan.php" class="btn btn-lg btn-success">Lihat Pesanan Anda</a>';


        //require_once("../keranjang.php");
//$koneksi=mysqli_connect("localhost","root","") or die("gagal konek ke server".mysqli_error());
 
//if ($koneksi) {
//mysqli_select_db($koneksi,"db_tokonline") or die("Database gagal dibuka!".mysqli_error());
     

        if (isset($_SESSION['items'])) {
        foreach ($_SESSION['items'] as $key => $val) {
        $query = mysqli_query($koneksi, "select * from barang where br_id = '$key'");
            $data = mysqli_fetch_array($query);
            $kodebarang=$data['br_id'];
            $hargabarang=$data['br_hrg'];
            $namabarang=$data['br_nm'];
            $penjual=$data['penjual'];
            $subtotal=$data['br_hrg'] * $val;

            $status="0";
        $narek="0";
        $norek ="0";
        $bank="0";

        $jmlbarang=$val;
        $status="0";
        $nm_usr=$_POST['nm_usr'];
        $email_usr=$_POST['email_usr'];
        $almt_usr=$_POST['almt_usr'];
        $kp_usr=$_POST['kp_usr'];
        $kota_usr=$_POST['kota_usr'];
        $tlp=$_POST['tlp'];
        $nopembelian=$_POST['nopembelian'];
        
        $total=$_POST['total'];
        date_default_timezone_set('Asia/Jakarta');
        $tanggal=date("Y-n-d");
        $kurir="0";
        $waktuorder=$_POST['waktu'];
        if (empty($waktuorder)) {
          $waktuorder=date("H:i");
        }
        
        //$sql="INSERT INTO pesanan (tanggal,  nama, alamat, kdpos, kota, email, telp, no_beli, kd_barang, nm_barang, penjual, jumlah, harga, subtotal, total, status, kurir) VALUES ('$tanggal','$nm_usr', '$almt_usr', '$kp_usr', '$kota_usr', '$email_usr', '$tlp', '$nopembelian', '$kodebarang', '$namabarang','$penjual','$jmlbarang','$hargabarang','$subtotal','$total','$status','$kurir')";

        $sql="INSERT INTO pesanan (tanggal,  nama, alamat, kdpos, kota, email, telp, narek, norek, bank, no_beli, kd_barang, nm_barang, penjual, jumlah, harga, subtotal, total, status, kurir) VALUES ('$tanggal','$nm_usr', '$almt_usr', '$kp_usr', '$kota_usr', '$email_usr', '$tlp', '$narek', '$norek', '$bank', '$nopembelian', '$kodebarang', '$namabarang','$penjual','$jmlbarang','$hargabarang','$subtotal','$total','$status','$kurir')";

        $simpan=mysqli_query($koneksi,$sql) or die("gagal disimpan".mysqli_error($koneksi).mysql_errno($koneksi));
        }
         
}}
//session_destroy();
  if(session_is_registered['items']){
unset($_SESSION['items']);
session_destroy($_SESSION['items']);
//print "<script>alert('Permintaan Dikirimkan');</script>";
}

			else{
        print "<script>alert('Permintaan Ditolak');</script>";
				header("Location: index.php");
			}
			?>
		</div>
                   </div>
				
			<!-- end: Table -->

		</div>
		<!-- end: Container -->
				
	</div>
	<!-- end: Wrapper  -->			
    </div>
    <?php include '../include/footer2.php'; ?> 
</div>

</body>

</html>