<?php  include('include/config.php'); 
if(!isset($_SESSION['earth_india@AdminUserData']) || empty($_SESSION['earth_india@AdminUserData']) || $_SESSION['earth_india@AdminUserData']=="" )
{
	header("Location:login.php");
}
else
{
	header("Location:dashboard.php");
}
?>