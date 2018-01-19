<?php 

include("include/config.php"); 

if($_REQUEST['action'] == "getPackagePrice") {

	if(isset($_REQUEST['pckId']) && $_REQUEST['pckId'] != ''){
		
		$selClassSql = mysqli_query($conn,"SELECT * FROM packages WHERE id = '".$_REQUEST['pckId']."'");
		if(mysqli_num_rows($selClassSql) > 0 ){
			$row = mysqli_fetch_array($selClassSql);
			$pckPrice = $row['price'];	
			print($pckPrice);
		}
		else{
			print(0);
		}
	}
	
}
?>