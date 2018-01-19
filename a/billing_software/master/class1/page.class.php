<?php 
include_once("include/config.php");

class PAGES
{		
	// THis function is used to add a new Client 
	function addPage($arrPageInfo)
	{	
		if(DEBUG){
			print("<pre>arrPageInfo: ");

			print_r($arrPageInfo);

			print("</pre>");
			die;
		}
		
		$datetime = date('Y-m-d H:i:s');

		$insQry = "INSERT INTO pages(category_id,pagename,file,status,datetimex) 
					VALUES('".$arrPageInfo['lsPageCategory']."',
					'".$arrPageInfo['txtPageName']."',
					'".$arrPageInfo['txtFileName']."',
					'".$arrPageInfo['status']."',
					'".$datetime."')";	
					
		if(DEBUG){			
			print($insQry);
			die;
		}
		
		$queryInsert = mysqli_query($conn,$insQry);
		if($queryInsert) {
			//header("Location:add-page.php?required=SC");
			?><script>document.location="add-page.php?required=SC";</script><?php
		}
		else{
			//header("Location:add-page.php?required=NSC");
			?><script>document.location="add-page.php?required=NSC";</script><?php
		}
		
	}
	
	// THis function is used to update the particular user based on user id 
	function updatePage($arrUpdatePage)
	{
		if(DEBUG){
			print("<pre>arrUpdatePage: ");
			print_r($arrUpdatePage);
			print("</pre>");
			die;
		}
		
		$query = " UPDATE pages SET 
					category_id = '".$arrUpdatePage['lsPageCategory']."',
					pagename = '".$arrUpdatePage['txtPageName']."',
					file = '".$arrUpdatePage['txtFileName']."',
					status = '".$arrUpdatePage['status']."'
					WHERE id='".$arrUpdatePage['pageId']."'";
	
		if(DEBUG){
			print($query);
			die;
		}
		
		$qryUpdate = mysqli_query($conn,$query);
		$pageId = $arrUpdatePage['pageId'];
		
		if($qryUpdate)
		{
			//header("Location:add-page.php?doAction=updatePage&pageId=".$pageId."&required=USC");
			?><script>document.location="add-page.php?doAction=updatePage&pageId=<?php print($pageId);?>&required=USC";</script><?php
		}
		else {
			//header("Location:add-page.php?doAction=updatePage&pageId=".$pageId."&required=NUSC");
			?><script>document.location="add-page.php?doAction=updatePage&pageId=<?php print($pageId);?>&required=NUSC";</script><?php
		}
			
	}	
	
	
	// THis function is used to delete the particular user based on user id 
	function deletePage($pageId)
	{
		if(DEBUG){
			print("<pre>pageId: ");
			print_r($pageId);
			print("</pre>");
			die;
		}
		$datetime = date('Y-m-d');
		$query = " UPDATE pages SET endeffdate = '".$datetime."'  WHERE id='".$pageId."'";
	
		if(DEBUG){
			print($query);
			die;
		}
		
		$qryDelete = mysqli_query($conn,$query);
		
		if($qryDelete)
		{
			//header("Location:pages.php?required=DSC");
			?><script>document.location="pages.php?required=DSC";</script><?php
		}
		else {
//			header("Location:pages.php?required=NDSC");
			?><script>document.location="pages.php?required=NDSC";</script><?php
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
			//header("Location:pages.php?required=SOUS");
			?><script>document.location="pages.php?required=SOUS";</script><?php

		}
		else {
			//header("Location:pages.php?&required=SOUNS");
			?><script>document.location="pages.php?required=SOUNS";</script><?php
		}
			
	}

}
?>