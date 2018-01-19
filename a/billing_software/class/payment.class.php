<?php 
include_once("include/config.php");

class PAYMENT
{		
	// THis function is used to add a new Client 
	function addPayment($arrPayment)
	{	
		if(DEBUG){
			print("<pre>arrPayment: ");
			print_r($arrPayment);
			print("</pre>");
			die;
		}
		
		$datetime = date('Y-m-d H:i:s');
		$dtPaymentDate = date('Y-m-d',strtotime($arrPayment['dtPaymentDate']));
		
		$insQry = "INSERT INTO payment(dealer_id,amount,date,mode,remark,datetimex) 
					VALUES('".$arrPayment['lsDealer']."',
					'".$arrPayment['txtAmount']."',
					'".$dtPaymentDate."',
					'".$arrPayment['txtPaymentMode']."',
					'".$arrPayment['taRemark']."',
					'".$datetime."')";	
					
		if(DEBUG){			
			print($insQry);
			die;
		}
		
		$queryInsert = mysql_query($insQry) or die(mysql_error());
		if($queryInsert) {
			header("Location:add-payment.php?required=SC");
		}
		else{
			header("Location:add-payment.php?required=NSC");
		}
		
	}
	
	// THis function is used to update the particular user based on user id 
	function updatePayment($arrUpdatePayment)
	{
		if(DEBUG){
			print("<pre>arrUpdatePayment: ");
			print_r($arrUpdatePayment);
			print("</pre>");
			die;
		}
		$datetime = date('Y-m-d H:i:s');
		$dtPaymentDate = date('Y-m-d',strtotime($arrUpdatePayment['dtPaymentDate']));
		
		$query = " UPDATE payment SET 
					dealer_id = '".$arrUpdatePayment['lsDealer']."',
					amount = '".$arrUpdatePayment['txtAmount']."',
					date = '".$dtPaymentDate."',
					mode = '".$arrUpdatePayment['txtPaymentMode']."',
					remark = '".$arrUpdatePayment['taRemark']."',
					updated_at = '".$datetime."'
					WHERE id='".$arrUpdatePayment['paymentId']."'";
	
		if(DEBUG){
			print($query);
			die;
		}
		
		$qryUpdate = mysql_query($query);
		$paymentId = $arrUpdatePayment['paymentId'];
		
		if($qryUpdate)
		{
			header("Location:add-payment.php?doAction=editPayment&paymentId=".$paymentId."&required=USC");
		}
		else {
			header("Location:add-payment.php?doAction=editPayment&paymentId=".$paymentId."&required=NUSC");
		}
			
	}	
	
	
	// THis function is used to delete the particular user based on user id 
	function deletePayment($paymentId)
	{
		if(DEBUG){
			print("<pre>paymentId: ");
			print_r($paymentId);
			print("</pre>");
			die;
		}
		$datetime = date('Y-m-d');
		$query = " UPDATE payment SET endeffdate = '".$datetime."'  WHERE id='".$paymentId."'";
	
		if(DEBUG){
			print($query);
			die;
		}
		
		$qryDelete = mysql_query($query);
		
		if($qryDelete)
		{
			header("Location:payment.php?required=DSC");
		}
		else {
			header("Location:payment.php?required=NDSC");
		}
			
	}	
	
	function saveSortOrder($arrSortOrder)
	{
		if(DEBUG){
			print("<pre>arrSortOrder: ");
			print_r($arrSortOrder);
			print("</pre>");
			die;
		}
		
		foreach($arrSortOrder as $key => $value){
			$qrySortOrder = " UPDATE pages SET sortorder = '".$value."' WHERE id = '".$key."'";
			if(DEBUG){
				print($qrySortOrder);
			}
			$qrySortOrder = mysql_query($qrySortOrder);
		}

		if($qrySortOrder)
		{
			header("Location:payment.php?required=SOUS");
		}
		else {
			header("Location:payment.php?&required=SOUNS");
		}
			
	}

}
?>