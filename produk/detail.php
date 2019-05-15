<?php include'../include/config.php';?>
<?php include '../include/session.php';?>
<!DOCTYPE html>
<html>

<head>
    <title>Bang Sayur</title>
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
    <div class="container">

        <br>
        <div class="row product">
            <div class="col-lg-3">
                <div class="hero-unit">
	<?php 
	if(isset($_SESSION['username'])){
	$username = $_SESSION['username'];
	include '../include/keranjang2.php';
	}
	else {
		echo ' ';
	}
?>
                
        </div>
            </div>
            <?php                  
                $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE br_id='$_GET[kd]'");
                $data  = mysqli_fetch_array($query);
            ?>

            <div class="col-lg-3 col-md-offset-0" style="text-align: right;"><img class="img-responsive" width="300px" height="300px" src="../produk/gambar/<?php echo $data['br_gbr']; ?>"></div>
            <div class="col-lg-6">
                <div class="title"><h2><?php echo $data['br_nm']; ?></h2></div>
                <p><?php echo $data['br_des']; ?></p>
                <p><?php echo $data['ket']; ?></p>
                <p>Penjual : <?php echo $data['Penjual']; ?></p>
                <h5>Rp. <?php echo number_format($data['br_hrg'],2,",",".");?></h5>
                <?php 
                if ($data['br_stok'] >= 1){
                    echo '<strong style="color: blue;">Barang tersedia!<br></strong>';   
                } else {
                    echo '<strong style="color: red;">Barang tidak tersedia!<br></strong>';    
                }; 
                ?>
                <a href="../keranjang.php?act=add&amp;barang_id=<?php echo $data['br_id']; ?>&amp;ref=index.php" class="btn btn-lg btn-success">Tambah ke keranjang</a>
            </div>
        </div>        
         <hr>
        <div class="page-header">
        <?php include 'testimoni.php'; ?>
        </div>


        <div class="media">
            <?php                  
                $query = mysqli_query($koneksi, "SELECT * FROM testimoni WHERE br_id='$_GET[kd]'");
                while ($data  = mysqli_fetch_array($query)) {
                    if (!$data){
                    echo '
                        <div class="media-body">
                            <p>Belum ada Review/Testimoni</p>
                        </div>
                    ';
                    } ?>
                    <div class="media-body">
                <h4><?php echo $data['judul']; ?></h4>
                <!--<div><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i></div> -->
                <p>
                    <?php echo $data['pesan']; ?>
                </p>
                <p><span class="reviewer-name"><strong><?php echo $data['nama']; ?></strong></span><span class="review-date">| <?php echo $data['tanggal']; ?></span></p>
            </div>
                    <?php

                }

            ?>
            
            
        </div>
        
        <!--container-->
    </div>
    <?php include '../include/footer2.php'; ?>   
   
        <!-- start: Java Script -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/flexslider.js"></script>
    <script src="assets/js/carousel.js"></script>
    <script src="assets/js/jquery.cslider.js"></script>
    <script src="assets/js/slider.js"></script>
    <script def src="assets/js/custom.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>