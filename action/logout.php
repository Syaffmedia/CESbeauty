<?php 
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if(session_is_registered['username']){
unset($_SESSION['username']);
session_destroy($_SESSION['username']);
print "<script>alert('Anda berhasil logout'); location = '../index.php'; </script>";
}
?>