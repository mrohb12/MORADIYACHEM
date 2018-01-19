<?php 

include("include/config.php"); 

if($_REQUEST['action'] == "getPackagePrice") {

	if(isset($_REQUEST['pckId']) && $_REQUEST['pckId'] != ''){
		
		$selClassSql = mysql_query("SELECT * FROM packages WHERE id = '".$_REQUEST['pckId']."'") or die(mysql_error());
		if(mysql_num_rows($selClassSql) > 0 ){
			$row = mysql_fetch_array($selClassSql);
			$pckPrice = $row['price'];	
			print($pckPrice);
		}
		else{
			print(0);
		}
	}
	
}
?>