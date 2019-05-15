<!DOCTYPE html>
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
	<!-- end: CSS -->
  </head>
<body>

    <!-- Navigation -->
<?php include 'include/navigation-before.php'; ?>
                
        <!-- start: Container -->
        <div class="container">

            <!-- start: Table -->
 <form id="formku" action='action/signup.php' method="post" enctype="multipart/form-data">

                 <div class="table-responsive">
    <table width="550" class="table table-condensed">
	<tr>
		<td colspan="2" style="text-align: center;"><div class="title"><h2>Daftar</h2></div></td>
	</td>
	<tr>
        <td style="text-align: right;"><label for="username">Username</label></td>
        <td><input name="username" type="text" class="required" minlength="6" id="nm_usr" size="30" /></td>
      </tr>
      <tr>
        <td style="text-align: right;"><label for="password">Password</label></td>
        <td><input name="password" type="password" class="required" id="password" size="30"/></td>
      </tr>
	  <tr>
        <td style="text-align: right;"><label for="email_usr">Email</label></td>
        <td><input name="email_usr" type="text" class="email required" id="email_usr" size="50"/></td>
      </tr>
	<tr>
        <td style="text-align: right;"><label for="nm_usr">Nama</label></td>
        <td><input name="nm_usr" type="text" class="required" minlength="6" id="nm_usr" size="50" /></td>
      </tr>
      <tr>
        <td style="text-align: right;"><label for="almt_usr">Alamat</label></td>
        <td><textarea name="almt_usr" class="required" cols="52" rows="4"></textarea></td>
      </tr>
      <tr>
        <td style="text-align: right;"><label for="kp_usr">Kode Pos</label></td>
        <td><input name="kp_usr" type="text" class="required number" minlength="5" maxlength="5" id="kp_usr" size="20"  /></td>
      </tr>
      <tr>
        <td style="text-align: right;"><label for="kota_usr">Kota</label></td>
        <td><input name="kota_usr" type="text" class="required" minlength="6" id="kota_usr" size="50" /></td>
      </tr>
      <tr>
        <td style="text-align: right;"><label for="tlp">No Whatsapp</label></td>
        <td><input name="tlp" type="text" class="required number" minlength="12" id="tlp" size="20"/></td>
      </tr>
      <tr>
		<td style="text-align: right;"">Foto Profil</td>
        <td><input name="foto" type="file" /></td>
	  </tr>
      <tr>
      <td></td>
        <td><input type="submit" value="Daftar" name="daftar"  class="btn btn-sm btn-success"/>
			<input type="reset" value="Batal" name="reset"  class="btn btn-sm btn-danger"/>
        </tr>
    </table>
    </form>
                   </div>
                
            <!-- end: Table -->

        </div>
        <!-- end: Container -->
                

    <footer class="site-footer">
    <?php include 'include/footer.php'; ?>   
    </footer>


</body>

</html>