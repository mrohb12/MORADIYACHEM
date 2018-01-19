<?php
require_once "class/dealer.class.php";
$objDealer = new DEALER();if(isset($_GET["doAction"])&& $_GET["doAction"]=="SaveSortOrder") {		$arrSortOrder = array();	$arrSortOrder = $_POST['sortOrder'];	$objDealer->saveSortOrder($arrSortOrder);	}
if(isset($_GET["doAction"])&& $_GET["doAction"]=="addDealer")
{	
		$arrNewDealer['txtDealerName'] = $_POST["txtDealerName"];
		$arrNewDealer['txtDealerEmail'] = $_POST["txtDealerEmail"];
		$arrNewDealer['txtUsername'] = $_POST["txtUsername"];
		$arrNewDealer['txtPassword'] = $_POST["txtPassword"];
		$arrNewDealer['txtMobileNo'] = $_POST["txtMobileNo"];
		$arrNewDealer['taAddress'] = $_POST["taAddress"];
		$arrNewDealer['txtCity'] = $_POST["txtCity"];
		$arrNewDealer['txtPincode'] = $_POST["txtPincode"];
		$arrNewDealer['lsCommission'] = $_POST["lsCommission"];
		if(isset($_POST["status"]) && !empty($_POST["status"])){
			$_POST["status"] = 1;
		}
		else {
			$_POST["status"] = 0;
		}
		$arrNewDealer['status'] = $_POST["status"];
		
		
	 	$objDealer->addDealer($arrNewDealer);
}

if(isset($_GET["doAction"])&& $_GET["doAction"]=="updateDealer")
{	
		$arrUpdateDealer = array();
		if(DEBUG){
			print("<pre>");
			print_r( $_POST);
			print("</pre>");
			die;
		}
		$arrUpdateDealer['dealerId'] = $_POST["dealerId"];	
		$arrUpdateDealer['txtDealerName'] = $_POST['txtDealerName'];
		$arrUpdateDealer['txtDealerEmail'] = $_POST["txtDealerEmail"];
		$arrUpdateDealer['txtUsername'] = $_POST["txtUsername"];
		$arrUpdateDealer['txtPassword'] = $_POST["txtPassword"];
		$arrUpdateDealer['txtMobileNo'] = $_POST["txtMobileNo"];
		$arrUpdateDealer['taAddress'] = $_POST['taAddress'];
		$arrUpdateDealer['txtCity'] = $_POST["txtCity"];
		$arrUpdateDealer['txtPincode'] = $_POST["txtPincode"];
		$arrUpdateDealer['lsCommission'] = $_POST["lsCommission"];
		if(isset($_POST["status"]) && !empty($_POST["status"])){
			$_POST["status"] = 1;
		}
		else {
			$_POST["status"] = 0;
		}
		$arrUpdateDealer['status'] = $_POST["status"];
	 	$objDealer->updateDealer($arrUpdateDealer);
}

if(isset($_GET["doAction"])&& $_GET["doAction"]=="deleteDealer")
{	

		$dealerId = $_GET['dealerId'];
	 	$objDealer->deleteDealer($dealerId);
} 

function allDealer(){
	$qrySel = mysql_query("SELECT * FROM dealer WHERE (endeffdate IS NULL OR endeffdate ='NULL' OR endeffdate='0000-00-00')") or die(mysql_error());
	if(DEBUG){
		print($qrySel);
	}
	$arrReturn = array();
	$check = mysql_num_rows($qrySel);
	if($check > 0) {
		while ($row = mysql_fetch_array($qrySel))  
		{
			$arrReturn[] = $row;	
		}
	} 
	return $arrReturn;
}
?>