<?php 
  include 'config.php';

  $sql = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY br_id ASC");
	if(mysqli_num_rows($sql) == 0){
		echo "Tidak ada produk!";
	}else{
		while($data = mysqli_fetch_assoc($sql)){
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
    }
  }
              
?>