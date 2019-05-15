<?php include'../include/session.php';?>
<?php include'../include/config.php';?>
<html lang="en">

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
	
  </head>
<body>

    <!-- Navigation -->
<?php 
	if(isset($_SESSION['username']))
	{
		$username = $_SESSION['username'];
		include '../include/navigation2.php';
	}
	else 
	{	
		header('Location:http://localhost/PRIMA/');
	}
?>
                
        <!-- start: Container -->
        <div class="container">

            <!-- start: Table -->
 <form id="formku" method="post" enctype="multipart/form-data">
   <div class="table-responsive">
    <table width="550" class="table table-condensed">
  <tr>
    <td colspan="2" style="text-align: center;"><div class="title"><h2>Ubah Password</h2></div></td>
  </tr>
  <tr>
        <td style="text-align: right;"><label>Password Saat Ini</label></td>
        <td><input name="pass" type="password" class="required" minlength="6" size="20" /></td>
      </tr>
    <tr>
        <td style="text-align: right;"><label>Password Baru</label></td>
        <td><input name="new_pass" type="password" class="required" minlength="6"size="20" /></td>
      </tr>
      <tr>
        <td colspan="2" style="text-align:center;"><input type="submit" value="Ubah" name="ubah"  class="btn btn-md btn-success"/></td>

    </tr>
    </table>
    </form>
    </div>
                
            <!-- end: Table -->

        </div>
        <!-- end: Container -->
    <?php 
      if (isset($_POST['ubah'])) {
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$username =$_SESSION['username'];
$pass     = $_POST['pass'];
$new_pass = $_POST['new_pass'];

if (empty($pass) || empty($new_pass))
  {
    header("location:../user/password.php?status=Maaf, Anda belum memasukan password baru Anda.");
  }
else{

$query = mysqli_fetch_array(mysqli_query($koneksi, "SELECT password FROM member WHERE username='$username'"));
if($new_pass == $query['password']){
    header("location:../password.php?status=Maaf, password baru tidak boleh sama dengan password Anda saat ini.");
  }
else {

$sql = "UPDATE member SET password='$new_pass' where username='$username'";
$hasil = mysqli_query($koneksi, $sql);

if($hasil){
  echo "<script>alert('Selamat. . . !! Update password berhasil.'); location = '../index.php' </script>";

  }
else {
  echo "Password gagal disimpan <br>";
  echo "<a href='../password.php'>Back</a> <br>";
  }
}
}

      }
     ?>

    <footer class="site-footer">
    <?php include '../include/footer2.php'; ?>   
    </footer>
</body>
</html>