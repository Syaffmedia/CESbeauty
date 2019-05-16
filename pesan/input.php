<?php
if($_POST['finish']){
   session_destroy();

require_once("../keranjang.php");
$koneksi=mysqli_connect("localhost","root","") or die("gagal konek ke server".mysqli_error());
 
if ($koneksi) {
mysqli_select_db($koneksi,"dbsite_cesbeauty") or die("Database gagal dibuka!".mysqli_error());

        $status="0";
        $narek="0";
        $norek ="0";
        $bank="0";
        $nm_usr=$_POST['nm_usr'];
        $penjual=$_POST['penjual'];
        $almt_usr=$_POST['almt_usr'];
        $kp_usr=$_POST['kp_usr'];
        $kota_usr=$_POST['kota_usr'];
        $tlp=$_POST['tlp'];
        $email_usr="$_POST['email']";
        $nopembelian=$_POST['nopembelian'];
        $kodebarang=$_POST['kodebarang'];
        $namabarang=$_POST['namabarang'];
        $jmlbarang=$_POST['jmlbarang'];
        $hargabarang=$_POST['hargabarang'];
        $subtotal=$_POST['jmlharga'];
        $total=$_POST['total'];
        $tanggal=date("Y-n-d");

//echo "$status, $nm_usr, $almt_usr, $kp_usr, $kota_usr, $email_usr, $tlp, $narek, $norek, $bank, $nopembelian, $kodebarang, $namabarang, $jmlbarang, $hargabarang, $subtotal, $total";
        $sql="INSERT INTO pesanan (tanggal,  nama, alamat, kdpos, kota, email, telp, narek, norek, bank, no_beli, kd_barang, nm_barang, penjual, jumlah, harga, subtotal, total, status) VALUES ('$tanggal','$nm_usr', '$almt_usr', '$kp_usr', '$kota_usr', '$email_usr', '$tlp', '$narek', '$norek', '$bank', '$nopembelian', '$kodebarang', '$namabarang','$penjual','$jmlbarang','$hargabarang','$subtotal','$total','$status')";
//$sql="INSERT INTO jajal(nama, notel,kota) VALUES('$jjlnama','$jjlnotel','$jjlkota')";
        mysqli_query($koneksi,$sql) or die("Query gagal disimpan".mysqli_error());
        echo "<script>alert('Anda berhasil checkout, Silahkan lakukan pembayaran Rp. $total; '); window.location = 'selesai.php'</script>";
        }
}else{
   header("Location: index.php");
}

?>