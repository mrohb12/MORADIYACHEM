<?php
include("include/config.php"); 

if(isset($_GET["doAction"])&& $_GET["doAction"]=="addPayment")
{	
		$arrPayment = array();
		$arrPayment['lsDealer'] = $_POST["lsDealer"];
		$arrPayment['txtAmount'] = $_POST["txtAmount"];
		$arrPayment['dtPaymentDate'] = $_POST["dtPaymentDate"];
		$arrPayment['txtPaymentMode'] = $_POST["txtPaymentMode"];
		$arrPayment['taRemark'] = $_POST["taRemark"];
				
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
		if(false === $queryInsert) {
			?><script>document.location="add-payment.php?required=NSC";</script><?php
		}
		else{
			?><script>document.location="add-payment.php?required=SC";</script><?php
			
		}

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
		
		if(false === $qryUpdate)
		{
			?><script>document.location="add-payment.php?doAction=editPayment&paymentId=<?php print($paymentId);?>&required=NUSC";</script><?php
		}
		else {
			?><script>document.location="add-payment.php?doAction=editPayment&paymentId=<?php print($paymentId);?>&required=USC";</script><?php
		}

}



if(isset($_GET["doAction"])&& $_GET["doAction"]=="deletePayment")
{	

		$paymentId = $_GET['paymentId'];
		
	 	$datetime = date('Y-m-d');
		$query = " UPDATE payment SET endeffdate = '".$datetime."'  WHERE id='".$paymentId."'";
	
		if(DEBUG){
			print($query);
			die;
		}
		
		$qryDelete = mysqli_query($conn,$query);
		
		if(false === $qryDelete)
		{
			?><script>document.location="payment.php?required=NDSC";</script><?php
		}
		else {
			?><script>document.location="payment.php?required=DSC";</script><?php
		}
} 



function allPayment(){

	$qrySel = mysqli_query($conn,"SELECT * FROM payment WHERE (endeffdate IS NULL OR endeffdate ='NULL' OR endeffdate='0000-00-00')");

	if(DEBUG){
		print($qrySel);
	}

	$arrReturn = array();
	$check = mysqli_num_rows($qrySel);
	if($check > 0) {
		while ($row = mysqli_fetch_array($qrySel))  
		{
			$arrReturn[] = $row;	
		}
	} 
	return $arrReturn;
}

function getDealer(){

	$qrySel = mysqli_query($conn,"SELECT id,name FROM dealer WHERE (endeffdate IS NULL OR endeffdate ='NULL' OR endeffdate='0000-00-00')");

	if(DEBUG){
		print($qrySel);
	}

	$arrReturn = array();
	$check = mysqli_num_rows($qrySel);
	if($check > 0) {
		while ($row = mysqli_fetch_array($qrySel))  
		{
			$arrReturn[$row['id']] = $row['name'];	
		}
	} 
	return $arrReturn;
}

function getDealerName($dealerId){

	$qrySel = mysqli_query($conn,"SELECT * FROM dealer WHERE (endeffdate IS NULL OR endeffdate ='NULL' OR endeffdate='0000-00-00') AND id = {$dealerId}");

	if(DEBUG){
		print($qrySel);
	}

	$arrReturn = array();
	$check = mysqli_num_rows($qrySel);
	
	$row = mysqli_fetch_array($qrySel);
	
	return $row['name'];
}

function getPackageValidity($pckId){

	$qrySel = mysqli_query($conn,"SELECT * FROM packages WHERE id = '".$pckId."'");

	if(DEBUG){
		print($qrySel);
	}

	$arrReturn = array();
	$check = mysqli_num_rows($qrySel);
	
	$row = mysqli_fetch_array($qrySel);
	
	return $row['validity'];
}
?>