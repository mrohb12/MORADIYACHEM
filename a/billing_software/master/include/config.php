<?php 

session_start();

error_reporting(0);

$conn = mysqli_connect('localhost', 'root', '', 'sbms');
//$conn = mysqli_connect('localhost', 'sanskjos_user1', 'billing@321', 'sanskjos_billing');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}  
	
define('SITE_URL','http://localhost/sms/securemts/');
define('BASE_URL','http://localhost/sms/securemts/');

//define('SITE_URL','http://sanskarsoftware.com/billingsoft/master/');
//define('BASE_URL','http://sanskarsoftware.com/billingsoft/master/');

define('DEBUG',0);
define('APP_NAME','Sanskar Billing Software');

$page = basename($_SERVER['PHP_SELF']);
$page = str_replace(".php","",$page);
$page =	str_replace("_"," ",$page);
$page =	str_replace("-"," ",$page);
$page =	str_replace("index","Welcome",$page);
$page =	ucwords($page);

 include('function.php');
?>