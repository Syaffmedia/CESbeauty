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
        <img src="../gambar/logo.png" width="40px" height="40px">
      </div>
      <div class="row-lg-3">
        <a class="navbar-brand" href="index.php"><b>&nbsp;Secaf</b> Distro</a>
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
              <a class="nav-link">|</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../testimoni.php">Testimoni</a>
            </li>
            </li>
          </ul>
        </div>
      </div>
    </nav>
	
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
				

				echo 'Terima kasih Anda sudah berbelanja di Secaf Distro. Mohon simpan informasi di bawah ini:';
				echo '
				<p>
					1. Kode Transaksi pesanan anda: <b> '.$_POST['nopembelian'].'</b> 
					<br>
					2. Total biaya untuk pembelian Produk adalah <b> Rp. '.number_format($_POST['total'],2,",",".").',- </b>
					<br>
					3. biaya bisa di kirimkan melalui <b> BRI 123-234-56347-8 a.n Secaf Distro. </b>
					<br>
					4. Simpan bukti transfer untuk melakukan konfirmasi.<br>';
				echo '5. Dan barang akan kami kirim ke alamat di bawah ini:</p>';
				echo '<p><b>_-- Nama Lengkap : '.$_POST['nm_usr'].'<br>';
                echo '_-- Email : '.$_POST['email_usr'].'<br>';
                echo '_-- Alamat : '.$_POST['almt_usr'].'<br>';
                echo '_-- Kode Pos : '.$_POST['kp_usr'].'<br>';
                echo '_-- Kota : '.$_POST['kota_usr'].'<br>';
                echo '_-- No Telepon : '.$_POST['tlp'].'<br>';
                echo '_-- Total Belanja : Rp. '.$_POST['total'].',-</b></p>';

                require_once("../keranjang.php");
$koneksi=mysqli_connect("localhost","root","") or die("gagal konek ke server".mysqli_error());
 
if ($koneksi) {
mysqli_select_db($koneksi,"db_tokonline") or die("Database gagal dibuka!".mysqli_error());

        $status="0";
        $nm_usr=$_POST['nm_usr'];
        $email_usr=$_POST['email_usr'];
        $almt_usr=$_POST['almt_usr'];
        $kp_usr=$_POST['kp_usr'];
        $kota_usr=$_POST['kota_usr'];
        $tlp=$_POST['tlp'];
        $norek=$_POST['rek'];
        $narek=$_POST['nmrek'];
        $bank=$_POST['bank'];
        $nopembelian=$_POST['nopembelian'];
        $kodebarang=$_POST['kodebarang'];
        $namabarang=$_POST['namabarang'];
        $jmlbarang=$_POST['jmlbarang'];
        $hargabarang=$_POST['hargabarang'];
        $subtotal=$_POST['jmlharga'];
        $total=$_POST['total'];
        $tanggal=date("Y-n-d");

//echo "$status, $nm_usr, $almt_usr, $kp_usr, $kota_usr, $email_usr, $tlp, $narek, $norek, $bank, $nopembelian, $kodebarang, $namabarang, $jmlbarang, $hargabarang, $subtotal, $total";
        $sql="INSERT INTO pesanan (tanggal,  nama, alamat, kdpos, kota, email, telp, narek, norek, bank, no_beli, kd_barang, nm_barang, jumlah, harga, subtotal, total, status) VALUES ('$tanggal','$nm_usr', '$almt_usr', '$kp_usr', '$kota_usr', '$email_usr', '$tlp', '$narek', '$norek', '$bank', '$nopembelian', '$kodebarang', '$namabarang','$jmlbarang','$hargabarang','$subtotal','$total','$status')";
//$sql="INSERT INTO jajal(nama, notel,kota) VALUES('$jjlnama','$jjlnotel','$jjlkota')";
        $simpan=mysqli_query($koneksi,$sql) or die("Query gagal disimpan".mysqli_error());
        //echo "<script>alert('Anda berhasil checkout, Silahkan lakukan pembayaran Rp. $total; '); window.location = 'selesai.php'</script>";
        }
        

session_destroy();
			}else{
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

   
        <footer class="footer-distributed">

      <div class="footer-left">

        <img width="150px" src="../gambar/logo.png">

        <p class="footer-links">
          SECAF DISTRO
        </p>

        <p class="footer-company-name">Secaf Originals &copy; 2013</p>
      </div>

      <div class="footer-center">

        <div>
          <i class="fa fa-map-marker"></i>
          <p><span>Jl. Martadireja 1 (Depan MAN 1 Banyumas)</span>Purwokerto, Indonesia</p>
        </div>
    
        <div>
          <i class="fa fa-phone"></i>
          <p>+62 8816694110</p>
        </div>

        <div>
          <i class="fa fa-facebook"></i>
          <p><a href="mailto:support@company.com">Secaf Distro</a></p>
        </div>

      </div>

      <div class="footer-right">

        <p class="footer-company-about">
          <span>Secaf?</span>
          SECAF adalah distro muslim dengan produk berupa pakaian dan perlengkapan muslim yang berkualitas dan 100% original produksi sendiri yang tentunya keren, patut, mendidik tur islami. Nama Secaf diambil dari nama marga dari foundernya, yaitu Habib Haedar Alwi Assegaf sejak tahun 2013. Hingga sekarang ini Secaf sukses mengembangkan usahanya dan sudah membuka beberapa cabang di daerah kabupaten Banyumas, Cilacap, hingga Kebumen. 
        </p>

        <div class="footer-icons">

          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-linkedin"></i></a>
          <a href="#"><i class="fa fa-github"></i></a>

        </div>

      </div>

    </footer>
  <!--
      <div class="container">
        <hr>
            <div class="row">
                <div class="col-sm-6">
                    <h5>Secaf Distro © 2018 by Kelompok 8 (SI 16 B)</h5></div>
                <div class="col-sm-6 social-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-instagram"></i></a></div>
            </div>
      </div>
       -->



</body>

</html>