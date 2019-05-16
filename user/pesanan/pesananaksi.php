<?php
include'../include/session.php';
include'../include/config.php';?>

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
   <form method="POST" action="kirim.php" enctype="multipart/form-data">
	<table class="table-responsive table table-condensed">
		<?php
      include'../include/config.php';
      $id=$_GET['ID'];
      $sql="SELECT * FROM pesanan WHERE  no_beli='$id'";
      $qry=mysqli_query($koneksi,$sql) or die("Query gagal".mysqli_error());
    //  $data=mysqli_fetch_array($qry); 
      
      while ($data = mysqli_fetch_array($qry)){ ?>

			<tr>
        <td>Kode Pembelian</td>
        <td>:</td>
        <td>
          <input type="hidden" name="nobeli" value="<?php echo $data['no_beli']; ?>">
          <?php echo $data['no_beli']; ?></td>
      </tr>
			<tr>
        <td>Nama Barang</td>  
        <td>:</td>
        <td><?php echo $data['nm_barang']; ?></td>
      </tr>
      <tr>
        <td>Harga</td>
        <td>:</td>
        <td><?php echo $data['harga']; ?></td>
      </tr>
      <tr>
        <td>Jumlah</td>
        <td>:</td>
        <td><?php echo $data['jumlah']; ?></td>
      </tr>
			<tr>
        <td>Total</td>
        <td>:</td>
        <td><?php echo $data['total']; ?></td>
      </tr>
			<tr>
        <td>Nama Pemesan</td>
        <td>:</td>
        <td><?php echo $data['nama']; ?></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <TD>:</TD>
        <td><?php echo $data['alamat']; ?></td>
      </tr>
      <tr>
        <td>Kota</td>
        <td>:</td>
        <td><?php echo $data['kota']; ?></td>
      </tr>
      <tr>
        <td>No Telp</td>
        <td>:</td>
        <td><?php echo $data['telp']; ?></td>
      </tr>
      <tr>
        <td>Kurir</td>
        <td>:</td>
        <td>
          <?php 
          include '../include/config.php';
            echo "<select name='kurir'>";
            $sql=mysqli_query($koneksi,"SELECT * FROM kurir ORDER BY nama ASC") or die("Query gagal".mysqli_error());
            echo "<option value='pilih' selected class='required' size='50'>Pilih kurir</option>";
            while ($data=mysqli_fetch_array($sql)) { ?>
            <option value="<?php echo "$data[nama]"; ?>"><?php echo "$data[nama]"; ?> </option>";
              <?php
            }
         ?>
        </td>
        
      </tr>
      
      <tr>
        <td>
          <input type="submit" name="submit" value="Proses">
        </td>
      </tr>
       <?php
}
?> 
			
		</table>
    </form>
		<footer class="site-footer">
    <?php include '../include/footer.php'; ?>   
    </footer>

</div>
</body>

</html>