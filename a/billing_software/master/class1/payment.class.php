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
		
		$queryInsert = mysqli_query($conn,$insQry);
		if($queryInsert) {
			//header("Location:add-payment.php?required=SC");
			?><script>document.location="add-payment.php?required=SC";</script><?php
		}
		else{
			//header("Location:add-payment.php?required=NSC");
			?><script>document.location="add-payment.php?required=NSC";</script><?php
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
		
		$qryUpdate = mysqli_query($conn,$query);
		$paymentId = $arrUpdatePayment['paymentId'];
		
		if($qryUpdate)
		{
			header("Location:add-payment.php?doAction=editPayment&paymentId=".$paymentId."&required=USC");
			?><script>document.location="add-payment.php?doAction=editPayment&paymentId=<?php print($paymentId);?>&required=USC";</script><?php
		}
		else {
			//header("Location:add-payment.php?doAction=editPayment&paymentId=".$paymentId."&required=NUSC");
			?><script>document.location="add-payment.php?doAction=editPayment&paymentId=<?php print($paymentId);?>&required=NUSC";</script><?php
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
		
		$qryDelete = mysqli_query($conn,$query);
		
		if($qryDelete)
		{
			//header("Location:payment.php?required=DSC");
			?><script>document.location="payment.php?required=DSC";</script><?php
		}
		else {
			//header("Location:payment.php?required=NDSC");
			?><script>document.location="payment.php?required=NDSC";</script><?php
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
			$qrySortOrder = mysqli_query($conn,$qrySortOrder);
		}

		if($qrySortOrder)
		{
			//header("Location:payment.php?required=SOUS");
			?><script>document.location="payment.php?required=SOUS";</script><?php
		}
		else {
			//header("Location:payment.php?&required=SOUNS");
			?><script>document.location="payment.php?required=SOUNS";</script><?php
		}
			
	}

}
?>