<?php
include("include/config.php"); 

if(isset($_GET["doAction"])&& $_GET["doAction"]=="SaveSortOrder") 
{	
	$arrSortOrder = array();
	$arrSortOrder = $_POST['sortOrder'];
	$objDealer->saveSortOrder($arrSortOrder);	
}

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
		
		$datetime = date('Y-m-d H:i:s');

		$insQry = "INSERT INTO dealer(name,email,username,password,mobileno,address,city,pincode,commission,status,datetimex) 
					VALUES('".$arrNewDealer['txtDealerName']."',
					'".$arrNewDealer['txtDealerEmail']."',
					'".$arrNewDealer['txtUsername']."',
					'".md5($arrNewDealer['txtPassword'])."',
					'".$arrNewDealer['txtMobileNo']."',
					'".$arrNewDealer['taAddress']."',
					'".$arrNewDealer['txtCity']."',
					'".$arrNewDealer['txtPincode']."',
					'".$arrNewDealer['lsCommission']."',
					'".$arrNewDealer['status']."',
					'".$datetime."')";	
					
		if(DEBUG){			
			print($insQry);
			die;
		}
		
		$queryInsert = mysqli_query($conn,$insQry);
		
		if(false === $queryInsert) {
			?><script>document.location="add-dealer.php?required=NSC";</script><?php
		}
		else{
			?><script>document.location="add-dealer.php?required=SC";</script><?php
		}

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
		
		$qryUpdate = mysqli_query($conn,$query);
		$dealerId = $arrUpdateDealer['dealerId'];

		if(false === $qryUpdate) {
			?><script>document.location="add-dealer.php?doAction=editDealer&dealerId=<?php print($dealerId);?>&required=NUSC";</script><?php
		}
		else {
			?><script>document.location="add-dealer.php?doAction=editDealer&dealerId=<?php print($dealerId);?>&required=USC";</script><?php
		}

}



if(isset($_GET["doAction"])&& $_GET["doAction"]=="deleteDealer")
{	

		$dealerId = $_GET['dealerId'];
	 	
		$datetime = date('Y-m-d');
		$query = " UPDATE dealer SET endeffdate = '".$datetime."'  WHERE id='".$dealerId."'";
	
		if(DEBUG){
			print($query);
			die;
		}
		
		$qryDelete = mysqli_query($conn,$query);
		
		if(false === $qryDelete)
		{
			?><script>document.location="dealers.php?required=NDSC";</script><?php
		}
		else {
			?><script>document.location="dealers.php?required=DSC";</script><?php
		}
} 



function allDealer(){

	$qrySel = mysqli_query($conn,"SELECT * FROM dealer WHERE (endeffdate IS NULL OR endeffdate ='NULL' OR endeffdate='0000-00-00')");

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

?>