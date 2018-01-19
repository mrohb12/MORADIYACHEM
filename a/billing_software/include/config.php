<?php session_start();error_reporting(0);
mysql_connect("localhost","root","");mysql_select_db("sbms");	//mysql_connect("localhost","sanskjos_user1","billing@321");//mysql_select_db("sanskjos_billing");	
define('SITE_URL','http://localhost/sms/securemts/');
define('BASE_URL','http://localhost/sms/securemts/');//define('SITE_URL','http://sanskarsoftware.com/billingsoft/');//define('BASE_URL','http://sanskarsoftware.com/billingsoft/');
define(DEBUG,0);
define('APP_NAME','Sanskar Billing Software');
$page = basename($_SERVER['PHP_SELF']);
$page = str_replace(".php","",$page);
$page =	str_replace("_"," ",$page);
$page =	str_replace("-"," ",$page);
$page =	str_replace("index","Welcome",$page);
$page =	ucwords($page);
include('function.php');
?>

 
