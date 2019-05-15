<?php 
    require_once("../include/config.php");
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
    <title>ceseauty</title>
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
<div id="wrapper">
                
        <!-- start: Container -->
        <div class="container">

            <!-- start: Table -->
 <form id="formku" action="../pesan/selesai.php" method="post">
            <div class="title"><h2>Detail Keranjang Belanja</h2></div>
<table class="table table-hover table-condensed">
<tr>
                    <th><center>No Pembelian</center></th>
                    <th><center>Kode Barang</center></th>
                    <th><center>Nama Barang</center></th>
                    <th><center>Jumlah</center></th>
                    <th><center>Harga Satuan</center></th>
                    <th><center>Sub Total</center></th>
                    <th><center>Opsi</center></th>
                </tr>
                <?php
                //MENAMPILKAN DETAIL KERANJANG BELANJA//
                
    $total = 0;
    //mysql_select_db($database_conn, $conn);
    if (isset($_SESSION['items'])) {
        foreach ($_SESSION['items'] as $key => $val) {
            $query = mysqli_query($koneksi, "select * from barang where br_id = '$key'");
            $data = mysqli_fetch_array($query);

            $jumlah_harga = $data['br_hrg'] * $val;
            $total += $jumlah_harga;
            $no = time();
            ?>
                <tr>
                <td>
                    <input type="hidden" name="nopembelian" value="<?php echo $no; ?>">
                    <center><?php echo $no; ?></center>
                </td>
                <td>
                    <input type="hidden" name="kodebarang" value="<?php echo $data['br_id']; ?>">
                    <center><?php echo $data['br_id']; ?></center>
                </td>
                <td>
                    <input type="hidden" name="namabarang" value="<?php echo $data['br_nm']; ?>">
                    <center><?php echo $data['br_nm']; ?></center>
                </td>
                <td>
                    <input type="hidden" name="jmlbarang" value="<?php echo $val; ?>">
                    <center><?php echo number_format($val); ?></center>
                </td>
                <td>
                    <input type="hidden" name="hargabarang" value="<?php echo $data['br_hrg']; ?>">
                    <center><?php echo number_format($data['br_hrg'],2,",","."); ?></center>
                </td>
                <td>
                    <input type="hidden" name="jmlharga" value="<?php echo $jumlah_harga; ?>">
                    <center><?php echo number_format($jumlah_harga,2,",","."); ?></center>
                </td>
                <td><center><a href="../keranjang.php?act=plus&amp;barang_id=<?php echo $key; ?>&amp;ref=keranjang/detail.php" class="btn btn-sm btn-success"><b>+</b></a> <a href="../keranjang.php?act=min&amp;barang_id=<?php echo $key; ?>&amp;ref=keranjang/detail.php" class="btn btn-sm btn-warning"><b>-</b></a> <a href="../keranjang.php?act=del&amp;barang_id=<?php echo $key; ?>&amp;ref=keranjang/detail.php" class="btn btn-sm btn-danger"><b>x</b></a></center></td>
                </tr>
                
                    <?php
                    //mysql_free_result($query);            
                        }
                            //$total += $sub;
                        }?>  
                         <?php
                if($total == 0){
                    echo '<tr><td colspan="7" align="center"><h1>Upps, Keranjang belanja kosong.<h1></td></tr></table>';
                    echo '<p><div align="right">
                        <a href="../index.php" class="btn btn-danger btn-lg">Mulailah Belanja!</a>
                        </div></p>';
                } else {
                    echo '
                        <tr style="background-color: #DDD;"><td colspan="5" align="right"><b>Tot al :</b></td><td align="right"><b>Rp. '.number_format($total,2,",",".").'</b></td></td></td><td></td></tr></table>
                        <p><div align="right">
                        <a href="../index.php" class="btn btn-primary">Lanjutkan Belanja</a>
                        </div></p>
                    ';
                }
                ?>

</table>       
                
            <!-- end: Table -->
            <!-- start: Table -->
            <hr>
                 <div class="table-responsive">
                 <div class="title"><center><h2>Form Checkout</h2></center></div>
                 <div class="hero-unit"><center><p><b>Total Belanja Anda <?php echo 'Rp. '.number_format($total,2,",",".").''; ?>,- </b><br>Harap teliti lagi alamat dibawah ini dengan lengkap dan benar sesuai identitas anda!<br></p></center></div>
                <br> 
            <?php 
                $sql = "SELECT * FROM member where username='$username'";
                $hasil=mysqli_query($koneksi, $sql);
                while($record = mysqli_fetch_assoc($hasil)){
                    $nama=$record['nama'];
                    $alamat=$record['alamat'];
                    $kodepos=$record['kdpos'];
                    $kota=$record['kota'];
                    $tlp=$record['telp'];
                    $email=$record['email'];
                echo '<p><b>_-- Nama Lengkap : '.$record['nama'].'<br>';
                echo '_-- Alamat : '.$record['alamat'].'<br>';
                echo '_-- Kode Pos : '.$record['kdpos'].'<br>';
                echo '_-- Kota : '.$record['kota'].'<br>';
                echo '_-- No Telepon : '.$record['telp'].'<br></b></p>';
                //echo "$key;";
                //echo "$val;";
             }

             include 'optionradio.php';
             ?>
        <input type="hidden" name="nm_usr" value="<?php echo "$nama"; ?>">
        <input type="hidden" name="almt_usr" value="<?php echo "$alamat"; ?>">
        <input type="hidden" name="kp_usr" value="<?php echo "$kodepos"; ?>">
        <input type="hidden" name="kota_usr" value="<?php echo "$kota"; ?>">
        <input type="hidden" name="tlp" value="<?php echo "$tlp"; ?>">
        <input type="hidden" name="email_usr" value="<?php echo $email; ?>">
        <input type="hidden" name="total" value="<?php echo $total; ?>">
        <input type="submit" value="Check Out" name="finish"  class="btn btn-sm btn-success"/>&nbsp;<a href="index.php" class="btn btn-sm btn-danger">Kembali</a>
    </form>
                   </div>
                
            <!-- end: Table -->

        </div>
        <!-- end: Container -->
                
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


</body>

</html>