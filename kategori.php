 <?php include'include/config.php';?>
 <?php include 'include/session.php';?>
 <?php require_once 'keranjang.php';?>
<html lang="en">

  <head> 

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>cesbeauty</title>
    <!-- start: CSS --> 
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet"/>
    <link href="assets/css/style.css" rel="stylesheet"/>
    <link href="assets/css/css.css" rel="stylesheet"/>
    <link href="assets//css/bootstrap.min.css" rel="stylesheet"/>
	<link href="assets/css/font-awesome.min.css" rel="stylesheet"/>
	
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>


  </head>
<body>

    <!-- Navigation -->
    <?php 
	if(isset($_SESSION['username']))
	{
		$username = $_SESSION['username'];
		include 'include/navigation.php';
	}
	else 
	{	
		include 'include/navigation-before.php';
	}
?>
	<div class="container">
		<div class="row">

			<div class="col-lg-3">

<div class="hero-unit">
<?php include'include/cari.php'; ?>
	<?php 
	if(isset($_SESSION['username'])){
	$username = $_SESSION['username'];
	include 'include/keranjang.php';
	}
	else {
		echo ' ';
	}
	?>
            </div>
				<div class="title">&nbsp;</div>
				<div class="body">
				</div>
        <div class="title">&nbsp;</div>
        <div class="body">
        </div>
        	</div>
        <!-- /.col-lg-3 -->

	        <div class="col-lg-9">

    	    	<div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
           			<ol class="carousel-indicators">
            			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            		</ol>
           	 		<div class="carousel-inner" role="listbox">
              			<div class="carousel-item active">
                			<img class="d-block img-fluid" src="gambar/slider4.jpg" alt="First slide">
              			</div>
              			<div class="carousel-item">
                			<img class="d-block img-fluid" src="gambar/slider1.jpg" alt="Second slide">
              			</div>
              			<div class="carousel-item">
                			<img class="d-block img-fluid" src="gambar/slider2.jpg" alt="Third slide">
              			</div>
                    <div class="carousel-item">
                      <img class="d-block img-fluid" src="gambar/slider3.jpg" alt="Third slide">
                    </div>
            		</div>
            		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
              			<span class="sr-only">Previous</span>
            		</a>
            		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              			<span class="carousel-control-next-icon" aria-hidden="true"></span>
              			<span class="sr-only">Next</span>
            		</a>
                <p><marquee scrollamount=”3”>
              Selamat datang di CES Beauty. Happy Shopping....&nbsp;
          </marquee></p>
          		</div>
				<div class="row">

<?php
@$kategori=$_GET['kat'];
if ($kategori=='Powder' || $kategori=='Foundation' || $kategori=='Blush On' || $kategori=='Maskara' ||$kategori=='Eyebrow' ||$kategori=='Lipstick' ){

$batas=10;
@$halaman=$_GET['halaman'];

if(empty($halaman)){
	$posisi=0;
	$halaman=1;
}
else{ 
$posisi = ($halaman-1) * $batas; 
}

$Cari_Produk=$_GET['produk'];

$tampil="SELECT * FROM barang WHERE br_kat='$kategori'";
$hasil=mysqli_query($koneksi,$tampil) or die("gagal".mysqli_error());
$jumlah=mysqli_num_rows($hasil);

if ($jumlah > 0){
//echo "<table width='980' border='0' align='left' cellpadding='0' cellspacing='3' bgcolor='#f1f1f1'>";
//echo "<tr><td><div align='left'>No.</div></td><td>Tanggal Daftar</td></td><td>Nama</td><td>Jenis Kelamin</td><td>Pilihan Jurusan</td>
  //        <td>Tahun Ajaran</td><td>Alamat</td><td>Kota</td><td>Provinsi</td><td>Telp</td></tr>";
$no=$posisi+1;
while ($data=mysqli_fetch_array($hasil)){
?>
<div class="col-lg-4">  			
    <div class="product-item">
      <div class="title"><h4><?php echo $data['br_nm']; ?></h4>
        <img width="220px" height="150px" src="produk/gambar/<?php echo $data['br_gbr']; ?>" /></div>
			<div><h5>Rp.<?php echo number_format($data['br_hrg'],2,",",".");?></h5></div>
		  <div class="clear"><a href="produk/detail.php?hal=detailbarang&kd=<?php echo $data['br_id'];?>" class="btn btn-md btn-primary">Detail</a> <a href="keranjang.php?act=add&amp;barang_id=<?php echo $data['br_id']; ?>&amp;ref=index.php" class="btn btn-md btn-success">  Beli</a>
    </div>
  </div>
</div>
<?php
$no++;
}
?>

<div class="clear"></div>
				</div>
				<?php
echo "<h5><p>Halaman : &nbsp;";


$tampil2="SELECT * FROM barang WHERE br_kat='$kategori'";
$hasil2=mysqli_query( $koneksi, $tampil2);
$jmldata=mysqli_num_rows($hasil2);

$jmlhalaman=ceil($jmldata/$batas);

for($i=1;$i<=$jmlhalaman;$i++)
if ($i != $halaman)
{
	echo " <a href=$file?halaman=$i&Cari_Produk=$Cari_Produk&oke=$oke>$i</A> | ";
}
else
{
	echo " <b>$i</b>&nbsp; | &nbsp;";
}
echo "Ditemukan <b>$jmldata</b> data dengan nama <b>$Cari_Produk</b></p></h5>";

}
else{
  echo "<h5>Tidak ditemukan data <b>$Cari_Produk</b></h5>";
  ?></div><?php
}
}
?>
			</div>

		</div>

<?php include 'include/footer.php'; ?>   

        <!-- start: Java Script -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../template/js/jquery.js"></script>
    <script src="../template/js/bootstrap.js"></script>
    <script src="../template/js/flexslider.js"></script>
    <script src="../template/js/carousel.js"></script>
    <script src="../template/js/jquery.cslider.js"></script>
    <script src="../template/js/slider.js"></script>
    <script def src="../template/js/custom.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script src="../template/js/bootstrap.bundle.min.js"></script>
</body>
</html>