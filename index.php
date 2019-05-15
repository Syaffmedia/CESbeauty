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
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
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
				<!--div class="title"><h5>Fitur</h5></div>
				<div class="body">
					<p>
            <?php// include 'tentangkami.txt'; ?>
          </p>
				</div> <hr>
        <div class="title"><h5>Script Kiddies</h5></div>
        <div class="body">
          <p>
            <?php //include 'kontak.txt'; ?>
          </p>
        </div>
        	</div -->
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
					    <?php include 'produk/tampil.php'; ?>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
   
    <?php include 'include/footer.php'; ?>   
   
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