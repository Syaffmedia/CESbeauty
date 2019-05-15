<?php
if(!session_id())session_start();
if(!isset($_SESSION['SES_ADMIN'])) {
	echo "<div align=center><b></b><br>";
	include "login.php";
	exit;
}
?>
<html>
<html>

<head>
</head>

<body>
    <?php include 'home.php'; ?>
</body>

</html>