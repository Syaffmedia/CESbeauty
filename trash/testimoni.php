 <?php include'include/config.php';?>
 <?php include 'include/session.php';?>
 <?php require_once 'keranjang.php';?>
<html lang="en">
  <head> 

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BangSayur</title>
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
        <div class="title"><h5>Fitur</h5></div>
        <div class="body">
          <p>
            <?php include 'tentangkami.txt'; ?>
          </p>
        </div> <hr>
        <div class="title"><h5>Script Kiddies</h5></div>
        <div class="body">
          <p>
            <?php include 'kontak.txt'; ?>
          </p>
        </div>
          </div>


	        <div class="col-lg-9">

    	    	<div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item">
                      <img class="d-block img-fluid" src="gambar/slider4.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item" >
                      <img class="d-block img-fluid" src="gambar/slider1.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item active">
                      <img class="d-block img-fluid" src="gambar/slider2.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block img-fluid" src="gambar/slider3.jpg" alt="Fourth slide">
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
              Selamat datang di BangSayur. Happy Shopping....&nbsp;
          </marquee></p>
          		</div>

					    <div class="container">
                <center>
                  <h2>TESTIMONIAL</h2>
                  <hr>
                  <b>Tulis Testimoni Anda di bawah ini:</b>
                </center>
            <form action="" method="post">
              <table class="table-responsive table">
                <?php 
                  $username = $_SESSION['username'];
                  $sql = "SELECT * FROM member where username='$username'";
                  $hasil=mysqli_query($koneksi, $sql);
                  while($record = mysqli_fetch_assoc($hasil)){
                ?>
                <tr>
                  <td>Nama</td>
                  <td>:</td>
                  <td><input type="text" name="nama" class="required" size="50" value="<?php echo "$record[username]"; ?>" disabled></td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td>:</td>
                  <td><input type="Email" name="mail" class="required" size="50" value="<?php echo "$record[email]"; ?>" disabled></td>
                </tr>
                <?php } ?>
                <tr>
                  <td>Item</td>
                  <td>:</td>
                  <td>
                    <?php 
                      $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE br_id='$_GET[kd]'");
                      $data  = mysqli_fetch_array($query);
                      echo '<input type="text" name="barang" class="required" size="50" value="<?php echo "$record[email]"; ?>" disabled></td>';
            /*
            echo "<select name='barang'>";
            $sql=mysqli_query($koneksi,"SELECT * FROM barang ORDER BY br_nm ASC") or die("Query gagal".mysqli_error());
            echo "<option value='pilih' selected class='required' size='50'>Pilih Item yang Dimaksud</option>";
            while ($data=mysqli_fetch_array($sql)) {
              echo "<option value=$data[br_id]>$data[br_nm]</option>";
            } */
                    ?>
                  </td>
                </tr>
                <tr>
                  <td>Judul</td>
                  <td>:</td>
                  <td><input type="text" name="judul" placeholder="Judul Testimoni Anda" class="required" size="50"></td>
                </tr>
                <tr>
                  <td>Pesan</td>
                  <td>:</td>
                  <td><textarea name="pesan" cols="52" placeholder="Isi Testimoni Anda" class="required"></textarea></td>
                </tr>
              </table>
              <input type="submit" name="submit" value="Proses">
            </form>
          </div>
					<div class="clear"></div>
			</div>
		</div>
	</div>
  <?php
  if (isset($_POST['submit'])){
    $tanggal=date("Y-n-d");
    $sql = "insert into testimoni (tanggal, nama, email, br_id, judul, pesan) values ('$tanggal','".$_POST['nama']."', '".$_POST['mail']."', '".$_POST['barang']."','".$_POST['judul']."','".$_POST['pesan']."')";
    mysqli_query($koneksi,$sql) or die("error".mysqli_error());
    // Simpan di Folder Gambar
    echo"<script>alert('Testimoni Anda Berhasil Dikirimkan');</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php'>"; 
  } 
?>
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