<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="row-lg-3">
        <img src="../gambar/logo.png" width="15px" height="40px">
      </div>
      <div class="row-lg-3">
        <a class="navbar-brand" href="../index.php"><b>&nbsp;CES</b>Beauty</a>
      </div>
      
      
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="../index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Kategori
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" name="kategori" href="kategori.php?kat=<?php echo "Powder";?>">Powder</a>
          <a class="dropdown-item" name="kategori" href="kategori.php?kat=<?php echo "Foundation";?>">Foundation</a>
          <a class="dropdown-item" name="kategori" href="kategori.php?kat=<?php echo "Blush On";?>">Blush On</a>
          <a class="dropdown-item" name="kategori" href="kategori.php?kat=<?php echo "Maskara";?>">Maskara</a>
          <a class="dropdown-item" name="kategori" href="kategori.php?kat=<?php echo "Eyebrow";?>">Eyebrow</a>
          <a class="dropdown-item" name="kategori" href="kategori.php?kat=<?php echo "Lipstick";?>">Lipstick</a>
		</div>
		</li>
            <li class="nav-item">
              <a class="nav-link" href="../user/pesanan.php">Pembelian
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../user/list.php">Toko
                <span class="sr-only">(current)</span>
              </a>
            </li>
		</ul>
		<?php 
		$username = $_SESSION['username'];
		$sql = "SELECT * FROM member where username='$username'";
		$hasil=mysqli_query($koneksi, $sql);
		while($record = mysqli_fetch_assoc($hasil)){
		?>
		<ul class="navbar-nav ml-auto">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img src="../user/images/<?php echo $record['foto']; ?>" width='35' height='35' style="border:2px solid #eee; border-radius:50%;" /></a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
				<form class="px-5 py-1">
				<div style="text-align:center;">
				<img src="../user/images/<?php echo $record['foto']; ?>" width='100' height='100' style="border-radius:50%;" />
				<b><?php echo $record['username']; ?></b>
				<div class="dropdown-divider"></div>
				</div>
				<a href="../user/profiledit.php" class="btn btn-sm btn-secondary btn-block">Edit profil</a>
				<a href="../user/password.php" class="btn btn-sm btn-secondary btn-block">Ubah password</a>
				<div class="dropdown-divider"></div>
				<a href="../action/logout.php" class="btn btn-sm btn-primary btn-block">Keluar</a>
				</form>
<?php
}
?>
				</div>
			</li>
        </ul>
      </div>
 </nav>