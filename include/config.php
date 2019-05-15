<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'dbsite_cesbeauty';

$koneksi = new mysqli($dbhost,$dbuser,$dbpass,$dbname);

if ($koneksi->connect_error) {
   die('Maaf koneksi gagal: '. $connect->connect_error);
}
?>