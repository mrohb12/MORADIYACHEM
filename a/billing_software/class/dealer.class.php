<?php 
include_once("include/config.php");

class DEALER
{		
	// THis function is used to add a new Client 
	function addDealer($arrDealerInfo)
	{	
		if(DEBUG){
			print("<pre>arrDealerInfo: ");
			print_r($arrDealerInfo);
			print("</pre>");
			die;
		}
		
		$datetime = date('Y-m-d H:i:s');

		$insQry = "INSERT INTO dealer(name,email,username,password,mobileno,address,city,pincode,commission,status,datetimex) 
					VALUES('".$arrDealerInfo['txtDealerName']."',
					'".$arrDealerInfo['txtDealerEmail']."',
					'".$arrDealerInfo['txtUsername']."',
					'".md5($arrDealerInfo['txtPassword'])."',
					'".$arrDealerInfo['txtMobileNo']."',
					'".$arrDealerInfo['taAddress']."',
					'".$arrDealerInfo['txtCity']."',
					'".$arrDealerInfo['txtPincode']."',
					'".$arrDealerInfo['lsCommission']."',
					'".$arrDealerInfo['status']."',
					'".$datetime."')";	
					
		if(DEBUG){			
			print($insQry);
			die;
		}
		
		$queryInsert = mysql_query($insQry) or die(mysql_error());
		if($queryInsert) {
			header("Location:add-dealer.php?required=SC");
		}
		else{
			header("Location:add-dealer.php?required=NSC");
		}
		
	}
	
	// THis function is used to update the particular user based on user id 
	function updateDealer($arrUpdateDealer)
	{
		if(DEBUG){
			print("<pre>arrUpdateDealer: ");
			print_r($arrUpdateDealer);
			print("</pre>");
			die;
		}
		$datetime = date('Y-m-d H:i:s');
		
		$query = " UPDATE dealer SET 
					name = '".$arrUpdateDealer['txtDealerName']."',
					email = '".$arrUpdateDealer['txtDealerEmail']."',
					username = '".$arrUpdateDealer['txtUsername']."',
					password = '".$arrUpdateDealer['txtPassword']."',
					mobileno = '".$arrUpdateDealer['txtMobileNo']."',
					address = '".$arrUpdateDealer['taAddress']."',
					city = '".$arrUpdateDealer['txtCity']."',
					pincode = '".$arrUpdateDealer['txtPincode']."',
					commission = '".$arrUpdateDealer['lsCommission']."',
					status = '".$arrUpdateDealer['status']."',
					updated_at = '".$datetime."'
					WHERE id='".$arrUpdateDealer['dealerId']."'";
	
		if(DEBUG){
			print($query);
			die;
		}
		
		$qryUpdate = mysql_query($query);
		$dealerId = $arrUpdateDealer['dealerId'];
		
		if($qryUpdate)
		{
			header("Location:add-dealer.php?doAction=editDealer&dealerId=".$dealerId."&required=USC");
		}
		else {
			header("Location:add-dealer.php?doAction=editDealer&dealerId=".$dealerId."&required=NUSC");
		}
			
	}	
	
	
	// THis function is used to delete the particular user based on user id 
	function deleteDealer($dealerId)
	{
		if(DEBUG){
			print("<pre>dealerId: ");
			print_r($dealerId);
			print("</pre>");
			die;
		}
		$datetime = date('Y-m-d');
		$query = " UPDATE dealer SET endeffdate = '".$datetime."'  WHERE id='".$dealerId."'";
	
		if(DEBUG){
			print($query);
			die;
		}
		
		$qryDelete = mysql_query($query);
		
		if($qryDelete)
		{
			header("Location:dealers.php?required=DSC");
		}
		else {
			header("Location:dealers.php?required=NDSC");
		}
			
	}	

}
?>