<?php
require_once 'include/config.php';
require_once 'keranjang.php';
?>
<!DOCTYPE html>
<html lang="en">

  <head> 

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>cesbeauty</title>
    <!-- start: CSS --> 
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/css.css" rel="stylesheet">
    <!-- end: CSS -->
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fonts/font-awesome.min.css">


  </head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="row-lg-3">
        <img src="gambar/logo.png" width="40px" height="40px">
      </div>
      <div class="row-lg-3">
        <a class="navbar-brand" href="index.php"><b>&nbsp;CES</b> Beauty</a>
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
             <a class="nav-link" href="konfirmasi.php">Konfirmasi
               <span class="sr-only"></span>
             </a>
          </li>
            <li class="nav-item">
              <a class="nav-link" href="testimoni.php">Testimoni</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
        <div class="row">

            <div class="col-lg-3">

<div class="hero-unit">
            <!--<div class="tittle"><h3><strong><span class="glyphicon glyphicon-shopping-cart"></span> Your Cart</strong></h3></div>--><br>
            <h5>Keranjang Belanja</h5>
          <table class="table table-hover table-condensed">
          <tr>
          <th><center>Item</center></th>
          <th><center>Jml</center></th>
          <th><center>Harga</center></th>
        </tr>
      <?php
        //MENAMPILKAN DETAIL KERANJANG BELANJA//
       include 'include/config.php';         
    $total = 0;
    //mysql_select_db($database_conn, $conn);
    if (isset($_SESSION['items'])) {
        foreach ($_SESSION['items'] as $key => $val) {
            $query = mysqli_query($koneksi, "SELECT br_id, br_nm, br_hrg FROM barang WHERE br_id = '$key'");
            $data = mysqli_fetch_array($query);

            $jumlah_harga = $data['br_hrg'] * $val;
            $total += $jumlah_harga;
            //$no = 1;
            ?>
                <tr>
                <!-- <td><center><?php echo $no ++; ?></center></td> -->
                <td><center><?php echo $data['br_nm']; ?></center></td>
                <td><center><?php echo number_format($val); ?> Pcs</center></td>
                <td><center>Rp. <?php echo number_format($jumlah_harga); ?></center></td>
                </tr>
                
          <?php
                    //mysql_free_result($query);      
            }
              //$total += $sub;
            }?>
                        <?php
        if($total == 0){ ?>
          <td colspan="3" align="center"><?php echo "Keranjang Kosong!"; ?></td>
        <?php } else { ?>
          
                        <td colspan="2" style="font-size: 14px;"><div class="pull-right">Total: Rp. <?php echo number_format($total); ?>,- </div></td>
                        <td><div align="right">
            <a href="keranjang/detail.php" class="btn btn-sm btn-success">Atur</a>
            </div></td>
          
      <?php }
        ?>
                </table>
            </div>
        <hr>
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
                <div class="row"></div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3><center>Konfirmasi Pembayaran</center></h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Kode Pemesanan</label>
                                    <div class="col-sm-8">
                                        <input required type="text" name="kode" class="form-control" placeholder="Kode Pemesanan">
                                    </div>
                                </div>
                                  <div class="form-group">
                                  <label class="col-sm-4 control-label">Kode Transaksi</label>
                                    <div class="col-sm-8">
                                        <input required type="text" name="struk" class="form-control" placeholder="Kode Transaksi">
                                    </div>
                                </div>
                                  <div class="form-group">
                                  <label class="col-sm-4 control-label">No Rek Pengirim</label>
                                    <div class="col-sm-8">
                                        <input required type="text" name="norek" class="form-control" placeholder="Nomor Rek. Anda">
                                    </div>
                                </div>
 
                                <div class="form-group">
                                  <label class="col-sm-4 control-label">Tanggal Transfer</label>
                                    <div class="col-sm-8">
                                        <input required name="tanggal" type="date" class="form-control" min="<?php echo date('Y-m-d'); ?>" value="<?php echo $tanggal ?>" placeholder="Tanggal">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Jumlah</label>
                                    <div class="col-sm-8">
                                        <input required type="text" name="jumlah" class="form-control" placeholder="Jumlah">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Pengirim</label>
                                    <div class="col-sm-8">
                                        <input required type="text" name="pengirim" class="form-control" placeholder="Pengirim">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Upload Bukti Transfer</label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" name="gambar" size="100" maxlength="500"/>
                                    	<p>.Gambar yang diupload maksimal 1mb <br>.Nama gambar hanya boleh memakai huruf & angka <br>.tidak boleh mengandung karakter khusus <br>.misal: gambar 01.jpg, gambar01.jpg</p>
                                    </div>
                                </div>
										
				
                                <div class="form-group">
                                    <div class="col-sm-offset-1 col-sm-5">
                                        <button  type="submit" name="kirim" class="btn btn-success">Konfirmasi</button>
                                    </div>
                                
                                 <!--   <div class=" col-sm-5">
                                        <button class="btn btn-primary" style="margin-left:5%" onclick="print_d()">Cetak Kwitansi</button>
                                    <script>
                                        function print_d(){
                                        window.open("print.php","_blank");
                                        }
                                    </script>
                                    </div>-->
                                </div>
                            </form>
                        </div></div>
                    </div></div>
                    </div>
            <?php
include'include/config.php';
 if (isset($_POST['kirim'])){
 	$status="0";
	$gambare = $_FILES['gambar']['name'];
		// Simpan ke Database
		$sql = "insert into konfirm (no_beli, kd_trans, norek, tanggal, total, narek, bukti, status) values ('".$_POST['kode']."', '".$_POST['struk']."','".$_POST['norek']."','".$_POST['tanggal']."','".$_POST['jumlah']."','".$_POST['pengirim']."','$gambare','$status')";
		mysqli_query($koneksi,$sql) or die("error".mysqli_error());
		// Simpan di Folder Gambar
		move_uploaded_file($_FILES['gambar']['tmp_name'], "gambar/konfirmasi/".$_FILES['gambar']['name']);
		echo"<script>alert('Konfirmasi Berhasil!');</script>";
		echo "<meta http-equiv='refresh' content='0; url=index.php'>";	
	} 
?>

    <footer class="site-footer">
    <?php include 'include/footer.php'; ?>   
    </footer>
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