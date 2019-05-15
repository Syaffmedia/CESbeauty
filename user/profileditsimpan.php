<?php include'../include/config.php'; ?>
<?php
$id 		=$_POST['id'];
$nm_usr		=$_POST['nm_usr'];
$email_usr	=$_POST['email_usr'];
$almt_usr	=$_POST['almt_usr'];
$kp_usr		=$_POST['kp_usr'];
$kota_usr	=$_POST['kota_usr'];
$tlp		=$_POST['tlp'];

$foto 		= $_FILES['foto']['name'];
$tmp 		= $_FILES['foto']['tmp_name'];

// Rename nama foto dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis').$foto;

// Set path folder tempat menyimpan fotonya
$path = "../user/images/".$fotobaru;

if (empty($nm_usr) || empty($almt_usr) || empty($tlp))
	{
		header("location:profiledit.php?status=Maaf,_semua_field_harus_di_isi.");
	}
else{
//cek username yang sama
$query = mysqli_fetch_array(mysqli_query($koneksi, "SELECT username FROM member WHERE username='$username'"));

if($query){
	header("location:profiledit.php?status=Maaf,_Username_telah_digunakan");
	}
else{
	move_uploaded_file($tmp, $path);
	$sql="UPDATE member SET nama='".$_POST['nm_usr']."', alamat='".$_POST['almt_usr']."', kdpos='".$_POST['kp_usr']."', kota='".$_POST['kota_usr']."', email='".$_POST['email_usr']."', telp='".$_POST['tlp']."', foto='$fotobaru' where id='$id'";
	$hasil = mysqli_query($koneksi, $sql);
	if($hasil){
		echo "<script> alert('Data berhasil disimpan.'); location = '../'; </script>";
	}
	else {
		echo "Data gagal disimpan <br>";
		 }	
	}
}
?>