<?php include'../include/config.php'; ?>
<?php
$username	=$_POST['username'];
$password	=$_POST['password'];
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

//Mengatur Zona Waktu WIB
date_default_timezone_set('Asia/Jakarta');
$tanggal	= date("Y/m/d");

if (empty($username) || empty($password) || empty($nm_usr) || empty($almt_usr) || empty($tlp))
	{
		header("location:../daftar.php?status=Maaf,_semua_field_harus_di_isi.");
	}
else{
//cek username yang sama
$query = mysqli_fetch_array(mysqli_query($koneksi, "SELECT username FROM member WHERE username='$username'"));

if($query){
	header("location:../daftar.php?status=Maaf,_Username_telah_digunakan");
	}
else{
	move_uploaded_file($tmp, $path);
	$sql="INSERT INTO member (username, password, tgl_daftar,  nama, alamat, kdpos, kota, email, telp, foto) VALUES ('$username','$password','$tanggal','$nm_usr', '$almt_usr', '$kp_usr', '$kota_usr', '$email_usr', '$tlp', '$fotobaru')";
	$hasil = mysqli_query($koneksi, $sql);
	if($hasil){
		echo "<script> alert('Selamat. Anda telah terdaftar toko ini. Silahkan login dengan username dan password Anda.'); location = '../'; </script>";
	}
	else {
		echo "Data gagal disimpan <br>";
		 }	
	}
}
?>