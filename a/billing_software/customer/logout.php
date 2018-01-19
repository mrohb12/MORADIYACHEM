<?php include('include/config.php'); 

date_default_timezone_set('Asia/Kolkata');
$ldate=date( 'Y-m-d h:i:s A', time () );
mysql_query("UPDATE userlog  SET logout = '$ldate' WHERE user_id = '".$_SESSION['earth_india@AdminUserData']['id']."' ORDER BY id DESC LIMIT 1");
	unset($_SESSION['earth_india@AdminUserData']);
	header("Location:login.php");
	exit;
?>