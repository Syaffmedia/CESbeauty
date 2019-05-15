<?php
if(!session_id())session_start();
if(!isset($_SESSION['SES_ADMIN'])) {
  echo "<div align=center><b></b><br>";
  echo "<script>alert('AKSES DILARANG! User tidak dikenal. '); window.location = 'login.php'</script>";
  exit;
}
?>
<!DOCTYPE html>
<html>

<head>
        <!-- start: CSS --> 
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/css.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fonts/font-awesome.min.css">
    <!-- end: CSS -->
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="row-lg-3">
        <img src="gambar/logo.png" height="40px">
      </div>
      <div class="row-lg-3">
        <a class="navbar-brand" href="index.php"><b>&nbsp;CES</b>Beauty</a>
      </div>
      
      <div class="row-lg-6" >
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="list/list.php">Daftar Barang</a>
            </li>
            <!--li class="nav-item">
              <a class="nav-link" href="kurir/kurir.php">Data Kurir</a>
            </li-->
            <li class="nav-item">
              <a class="nav-link" href="pesanan/pesanan.php">Data Pesanan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pesanan/penjualan.php">Data Penjualan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">

        <h1 align="center">Selamat Datang!</h1>
        <hr>
        <center><img src="gambar/logo.png" height="100px"></center>
        
        
    </div>

    <footer class="site-footer">
    <?php include '../include/footer.php'; ?>   
    </footer>

</div>


 <!-- start: Java Script -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="css/jquery/jquery.js"></script>
    <script src="css/bootstrap/js/bootstrap.js"></script>
    <script src="css/flexslider.js"></script>
    <script src="css/carousel.js"></script>
    <script src="css/jquery.cslider.js"></script>
    <script src="css/slider.js"></script>
    <script def src="js/custom.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script src="css/jquery/jquery.min.js"></script>
    <script src="css/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>