<?php
require_once "class/payment.class.php";
$objPayment = new PAYMENT();if(isset($_GET["doAction"])&& $_GET["doAction"]=="SaveSortOrder") {		$arrSortOrder = array();	$arrSortOrder = $_POST['sortOrder'];	$objDealer->saveSortOrder($arrSortOrder);	}
if(isset($_GET["doAction"])&& $_GET["doAction"]=="addPayment")
{	
		$arrPayment = array();
		$arrPayment['lsDealer'] = $_POST["lsDealer"];
		$arrPayment['txtAmount'] = $_POST["txtAmount"];
		$arrPayment['dtPaymentDate'] = $_POST["dtPaymentDate"];
		$arrPayment['txtPaymentMode'] = $_POST["txtPaymentMode"];
		$arrPayment['taRemark'] = $_POST["taRemark"];
				
	 	$objPayment->addPayment($arrPayment);
}

if(isset($_GET["doAction"])&& $_GET["doAction"]=="updatePayment")
{	
		$arrUpdatePayment = array();
		if(DEBUG){
			print("<pre>");
			print_r( $_POST);
			print("</pre>");
			die;
		}
		$arrUpdatePayment['lsDealer'] = $_POST["lsDealer"];	
		$arrUpdatePayment['txtAmount'] = $_POST['txtAmount'];
		$arrUpdatePayment['dtPaymentDate'] = $_POST["dtPaymentDate"];
		$arrUpdatePayment['txtPaymentMode'] = $_POST["txtPaymentMode"];
		$arrUpdatePayment['taRemark'] = $_POST['taRemark'];
		$arrUpdatePayment['paymentId'] = $_POST["paymentId"];
				
	 	$objPayment->updatePayment($arrUpdatePayment);
}

if(isset($_GET["doAction"])&& $_GET["doAction"]=="deletePayment")
{	

		$paymentId = $_GET['paymentId'];
	 	$objPayment->deletePayment($paymentId);
} 

function allPayment(){
	$qrySel = mysql_query("SELECT * FROM payment WHERE (endeffdate IS NULL OR endeffdate ='NULL' OR endeffdate='0000-00-00')") or die(mysql_error());
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
function getDealer(){

	$qrySel = mysql_query("SELECT id,name FROM dealer WHERE (endeffdate IS NULL OR endeffdate ='NULL' OR endeffdate='0000-00-00')") or die(mysql_error());

	if(DEBUG){
		print($qrySel);
	}

	$arrReturn = array();
	$check = mysql_num_rows($qrySel);
	if($check > 0) {
		while ($row = mysql_fetch_array($qrySel))  
		{
			$arrReturn[$row['id']] = $row['name'];	
		}
	} 
	return $arrReturn;
}

function getDealerName($dealerId){

	$qrySel = mysql_query("SELECT * FROM dealer WHERE (endeffdate IS NULL OR endeffdate ='NULL' OR endeffdate='0000-00-00') AND id = {$dealerId}") or die(mysql_error());

	if(DEBUG){
		print($qrySel);
	}

	$arrReturn = array();
	$check = mysql_num_rows($qrySel);
	
	$row = mysql_fetch_array($qrySel);
	
	return $row['name'];
}

function getPackageValidity($pckId){

	$qrySel = mysql_query("SELECT * FROM packages WHERE id = '".$pckId."'");

	if(DEBUG){
		print($qrySel);
	}

	$arrReturn = array();
	$check = mysql_num_rows($qrySel);
	
	$row = mysql_fetch_array($qrySel);
	
	return $row['validity'];
}
?>