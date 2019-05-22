<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="row-lg-3">
        <img src="../gambar/logo.png" width="15px" height="40px">
      </div>
      <div class="row-lg-3">
        <a style="color: pink;" class="navbar-brand" href="../index.php"><b>&nbsp;CES</b>Beauty</a>
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
		</ul>
		<ul class="navbar-nav nav-pills ml-auto">
			<li class="nav-item">
              <a class="nav-link" href="daftar.php">Daftar</a>
            </li>
            <li class="nav-item dropdown">
				<a class="nav-link dropdown" href="#" id="navbarDropdown" role="link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Masuk</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
				<form class="px-4 py-3" action='action/signin.php' method="post">
				<div class="input-group">
         <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
         <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
         </div>
        <div class="input-group" style="margin-top: 5px;">
         <span class="input-group-addon"><i class="fa fa-lock"></i></span>
         <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
         </div>
        <br />
        <button class="btn btn-sm btn-primary btn-block" type="submit">Login</button>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item">Lupa password?</a>
				</form>
				</div>
			</li>
        </ul>
      </div>
    </nav> 