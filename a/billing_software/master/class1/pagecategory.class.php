<?php 
include_once("../include/config.php");

class PAGECATEGORY
{		
	// THis function is used to add a new Client 
	function addPageCategory($arrCatInfo)
	{	
		if(DEBUG){
			print("<pre>arrCatInfo: ");
			print_r($arrCatInfo);
			print("</pre>");
			die;
		}
		
		$datetime = date('Y-m-d H:i:s');
			
		$insQry = "INSERT INTO `page_categories` (category_name,icon,status,datetimex) 
					VALUES('".$arrCatInfo['txtCatName']."',
					'".$arrCatInfo['txtCatIcon']."',
					'".$arrCatInfo['status']."',
					'".$datetime."')";
		
		if(DEBUG){
			print($insQry);
			die;
		}
	
		$queryInsert = mysqli_query($conn,$insQry);
		
		if (false===$queryInsert ) {
			?><script>document.location="add-page-category.php?required=NSC";</script><?php
		}
		else{
			
			?><script>document.location="add-page-category.php?required=SC";</script><?php
		}
		
	}
	
	// THis function is used to update the particular user based on user id 
	function updatePageCategory($arrUpdatePageCat)
	{
		if(DEBUG){
			print("<pre>arrUpdatePageCat: ");
			print_r($arrUpdatePageCat);
			print("</pre>");
			die;
		}
		
		$query = " UPDATE page_categories SET 
					category_name = '".$arrUpdatePageCat['name']."',
					icon = '".$arrUpdatePageCat['txtCatIcon']."',
					status = '".$arrUpdatePageCat['status']."'
					WHERE id='".$arrUpdatePageCat['catId']."'";
	
		if(DEBUG){
			print($query);
			die;
		}
		
		$qryUpdate = mysql_query($query);
		$catId = $arrUpdatePageCat['catId'];
		
		if($qryUpdate)
		{
			header("Location:add-page-category.php?doAction=updatePageCat&catId=".$catId."&required=USC");
		}
		else {
			header("Location:add-page-category.php?doAction=updatePageCat&catId=".$catId."&required=NUSC");
		}
			
	}	
	
	
	// THis function is used to delete the particular user based on user id 
	function deletePageCategory($catId)
	{
		if(DEBUG){
			print("<pre>catId: ");
			print_r($catId);
			print("</pre>");
			die;
		}
		$datetime = date('Y-m-d');
		$query = " UPDATE page_categories SET endeffdate = '".$datetime."'  WHERE id='".$catId."'";
	
		if(DEBUG){
			print($query);
			die;
		}
		
		$qryDelete = mysql_query($query);
		
		if($qryDelete)
		{
			$qryUpdatePages = mysql_query("SELECT * FROM pages WHERE category_id = '".$catId."' AND (endeffdate IS NULL OR endeffdate ='NULL' OR endeffdate='0000-00-00')") or die(mysql_error());
		
			if(DEBUG){
				print("Check Pages: <br/>".$qryUpdatePages);	
			}
			
			$totalPages = mysql_num_rows($qryUpdatePages);

			if($totalPages > 0) {
				$qryUpPages = " UPDATE pages SET endeffdate = '".$datetime."'  WHERE category_id ='".$catId."'";
				
				$qryUpPages = mysql_query($qryUpPages);
		
				if($qryUpPages)
				{
					header("Location:page-category.php?required=DSC");
				}
				else{
					header("Location:page-category.php?required=NDSPC");
				}
				
			}
			else{
				header("Location:page-category.php?required=NDSC");
			}
		}
		else {
			header("Location:page-category.php?required=NDSC");
		}
			
	}	
	function assignPageCategory($arrAssignCat){
		
		if(DEBUG){
			print("<pre>arrAssignPck: ");
			print_r($arrAssignPck);
			print("</pre>");
		}
		
		$query = mysql_query("SELECT * FROM client_packages WHERE clientid = '".$arrAssignPck['clientId']."' AND packageid = '".$arrAssignPck['packageId']."' 
														AND (endeffdate IS NULL OR endeffdate ='NULL' OR endeffdate='0000-00-00')") or die(mysql_error());
		
		if(DEBUG){
			print("Check Assigned Packages to Client: <br/>".$query);	
		}
		
		$check = mysql_num_rows($query);

		if($check > 0) {
			header("Location:assign-package.php?required=AAS&doAction=assignPackage&clientID=".$arrAssignPck['clientId']."");
		}
		else {
			$datetime = date('Y-m-d H:i:s');

			$insQry = "INSERT INTO client_packages(clientid,packageid,price,datetimex) 
						VALUES('".$arrAssignPck['clientId']."',
						'".$arrAssignPck['packageId']."',
						'".$arrAssignPck['price']."',
						'".$datetime."')";	
						
			if(DEBUG){			
				print($insQry);
				die;
			}
			
			$queryInsert = mysql_query($insQry) or die(mysql_error());
			if($queryInsert) {
				header("Location:assign-package.php?required=ASC&doAction=assignPackage&clientID=".$arrAssignPck['clientId']."");
			}
			else{
				header("Location:assign-package.php?required=NASC");
			}
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
			$qrySortOrder = " UPDATE page_categories SET sortorder = '".$value."' WHERE id = '".$key."'";
			if(DEBUG){
				print($qrySortOrder);
			}
			$qrySortOrder = mysql_query($qrySortOrder);
		}

		if($qrySortOrder)
		{
			header("Location:page-category.php?required=SOUS");
		}
		else {
			header("Location:page-category.php?&required=SOUNS");
		}
			
	}
	
}
?>