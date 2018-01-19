<?php session_start();

mysql_connect("localhost","root","");
mysql_select_db("sbms");


//mysql_connect("localhost","sanskjos_user1","billing@321");
//mysql_select_db("sanskjos_billing");

$conn = mysqli_connect('localhost', 'root', '', 'sbms');
//$conn = mysqli_connect('localhost', 'sanskjos_user1', 'billing@321', 'sanskjos_billing');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}  
	
define('APP_NAME','Sanskar Billing Software');

define('APP_EMAIL','info@sanskartechnolab.com');


define('SITE_URL','http://192.168.0.111/billing_software/customer/');

//define('SITE_URL','http://sanskarsoftware.com/billingsoft/customer/');

$page = basename($_SERVER['PHP_SELF']);
$page = str_replace(".php","",$page);
$page =	str_replace("_"," ",$page);
$page =	str_replace("-"," ",$page);
$page =	ucwords($page);

$project_status_array = array("Allocated","Submitted For Client Review","Cancled","Completed");
$project_status_color = array("info","warning","danger","success");

$product_material_qty_type_array = array(1=>"Meter",2=>"No Of Unit",3=>"KG",4=>"Roll",5=>"Package",6=>"Pieces",7=>"Bundle",8=>"Liter",9=>"Rs.");

include('function.php');
?>