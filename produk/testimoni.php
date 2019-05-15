<?php 
  if(isset($_SESSION['username']))
  {
    $username = $_SESSION['username']; 
    ?>
    <h3>Tulis Testimoni anda</h3>
            <form action="" method="post">
              <table class="table-responsive table">
                <?php 
                  $username = $_SESSION['username'];
                  $sql = "SELECT * FROM member where username='$username'";
                  $hasil=mysqli_query($koneksi, $sql);
                  while($record = mysqli_fetch_assoc($hasil)){
                ?>
                <input type="hidden" name="nama" class="required" size="50" value="<?php echo "$record[username]"; ?>">
                <input type="hidden" name="mail" class="required" size="50" value="<?php echo "$record[email]"; ?>">
                <?php }
                    $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE br_id='$_GET[kd]'");
                    $data  = mysqli_fetch_array($query);
                    ?>
                <input type="hidden" name="barang" class="required" size="50" value="<?php echo "$data[br_id]"; ?>" >
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
              <input type="submit" name="submit" value="Tulis Testimoni" class="btn btn-info btn-md">
            </form>

            <?php
  if (isset($_POST['submit'])){
    $tanggal=date("Y-n-d");
    $sql = "insert into testimoni (tanggal, nama, email, br_id, judul, pesan) values ('$tanggal','".$_POST['nama']."', '".$_POST['mail']."', '".$_POST['barang']."','".$_POST['judul']."','".$_POST['pesan']."')";
    mysqli_query($koneksi,$sql) or die("error".mysqli_error());
    // Simpan di Folder Gambar
    echo"<script>alert('Testimoni Anda Berhasil Dikirimkan');</script>";
    echo "<meta http-equiv='refresh' content='0;'>"; 
  } 
?>
    <?php
  }
  else 
  { 
    echo "<h3>Login untuk kirim testimoni</h3>";
  }
?>