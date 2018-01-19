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
		
		$queryInsert = mysql_query($insQry) or die(mysql_error());
		if($queryInsert) {
			header("Location:add-page.php?required=SC");
		}
		else{
			header("Location:add-page.php?required=NSC");
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
		
		$qryUpdate = mysql_query($query);
		$pageId = $arrUpdatePage['pageId'];
		
		if($qryUpdate)
		{
			header("Location:add-page.php?doAction=updatePage&pageId=".$pageId."&required=USC");
		}
		else {
			header("Location:add-page.php?doAction=updatePage&pageId=".$pageId."&required=NUSC");
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
		
		$qryDelete = mysql_query($query);
		
		if($qryDelete)
		{
			header("Location:pages.php?required=DSC");
		}
		else {
			header("Location:pages.php?required=NDSC");
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
			header("Location:pages.php?required=SOUS");
		}
		else {
			header("Location:pages.php?&required=SOUNS");
		}
			
	}

}
?>