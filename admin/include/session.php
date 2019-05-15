<?php
if(!session_id())session_start();
if(!isset($_SESSION['SES_ADMIN'])) {
header ("location: http://localhost/PRIMA/admin/login.php");
exit;
}
?>