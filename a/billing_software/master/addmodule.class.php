<?php
include("include/config.php");

if(isset($_GET["doAction"])&& $_GET["doAction"]=="SaveSortOrder") 
{	
	$arrSortOrder = array();
	$arrSortOrder = $_POST['sortOrder'];
	
	foreach($arrSortOrder as $key => $value){
		$value = mysqli_real_escape_string($conn,$value);
		$qrySortOrder = " UPDATE page_categories SET sortorder = '".$value."' WHERE id = '".$key."'";
		if(DEBUG){
			print($qrySortOrder);
		}
		$qrySortOrder = mysqli_query($conn,$qrySortOrder);
	}
	
	if (false===$qrySortOrder ) {
		?><script>document.location="modules.php?required=SOUNS";</script><?php
	}
	else{
		
		?><script>document.location="modules.php?required=SOUS";</script><?php
	}
	
}
if(isset($_GET["doAction"])&& $_GET["doAction"]=="addPageCategory")
{	
		$arrPageCat = array();
		$arrPageCat['txtCatName'] = mysqli_real_escape_string($conn,$_POST["txtCatName"]);
		$arrPageCat['txtCatIcon'] = mysqli_real_escape_string($conn,$_POST["txtCatIcon"]);

		if(isset($_POST["status"]) && !empty($_POST["status"])){
			$_POST["status"] = 1;
		}
		else {
			$_POST["status"] = 0;
		}
		
		$arrPageCat['status'] = $_POST["status"];
		
		$datetime = date('Y-m-d H:i:s');
			
		$insQry = "INSERT INTO `page_categories` (category_name,icon,status,datetimex) 
					VALUES('".$arrPageCat['txtCatName']."',
					'".$arrPageCat['txtCatIcon']."',
					'".$arrPageCat['status']."',
					'".$datetime."')";
		
		if(DEBUG){
			print($insQry);
			die;
		}
	
		$queryInsert = mysqli_query($conn,$insQry);
		
		if (false===$queryInsert ) {
			?><script>document.location="add-module.php?required=NSC";</script><?php
		}
		else{
			
			?><script>document.location="add-module.php?required=SC";</script><?php
		}
		

}

if(isset($_GET["doAction"])&& $_GET["doAction"]=="updatePageCategory")
{	
		$arrUpdatePageCat = array();

		if(DEBUG){
			print("<pre>");
			print_r( $_POST);
			print("</pre>");
		}

		$arrUpdatePageCat['catId'] = $_POST['catId'];
		$arrUpdatePageCat['name'] = mysqli_real_escape_string($conn,$_POST["txtCatName"]);
		$arrUpdatePageCat['txtCatIcon'] =mysqli_real_escape_string($conn, $_POST["txtCatIcon"]);

		if(isset($_POST["status"]) && !empty($_POST["status"])){
			$_POST["status"] = 1;
		}
		else {
			$_POST["status"] = 0;
		}
		$arrUpdatePageCat['status'] = $_POST["status"];
		
		$query = " UPDATE page_categories SET 
					category_name = '".$arrUpdatePageCat['name']."',
					icon = '".$arrUpdatePageCat['txtCatIcon']."',
					status = '".$arrUpdatePageCat['status']."'
					WHERE id='".$arrUpdatePageCat['catId']."'";
	
		if(DEBUG){
			print($query);
			die;
		}
		
		$catId = $arrUpdatePageCat['catId'];
		
		$qryUpdate = mysqli_query($conn,$query);
		
		if (false === $qryUpdate ) {
			?><script>document.location="add-module.php?doAction=updatePageCat&catId=<?php print($catId); ?>&required=NUSC";</script><?php
		}
		else {
			?><script>document.location="add-module.php?doAction=updatePageCat&catId=<?php print($catId); ?>&required=USC";</script><?php
		}

}


if(isset($_GET["doAction"])&& $_GET["doAction"]=="deletePageCategory")
{	
		$catId = $_GET['catId'];
		
		$datetime = date('Y-m-d');
		
		$query = "UPDATE page_categories SET endeffdate = '".$datetime."'  WHERE id='".$catId."'";
	
		if(DEBUG){
			print($query);
			die;
		}
		
		$qryDelete = mysqli_query($conn,$query);

		if($qryDelete == 1)
		{
			$qryUpdate = "SELECT * FROM pages WHERE category_id = '".$catId."' AND (endeffdate IS NULL OR endeffdate ='NULL' OR endeffdate='0000-00-00')";	
		
			if(DEBUG){
				print($qryUpdate);	
				die;
			}
			
			$qryUpdatePages = mysqli_query($conn,$qryUpdate);
		
			$totalPages = mysqli_num_rows($qryUpdatePages);
			
			if($totalPages > 0) {
				$qryUpPages = " UPDATE pages SET endeffdate = '".$datetime."'  WHERE category_id ='".$catId."'";
				
				$qryUpPages = mysqli_query($conn,$qryUpPages);
		
				if($qryUpPages)
				{
					?><script>document.location="modules.php?required=DSC";</script><?php
				}
				else{
					?><script>document.location="modules.php?required=NDSPC";</script><?php
				}
				
			}
			else{
				?><script>document.location="modules.php?required=PCDSC";</script><?php
			}
		}
		else {
			?><script>document.location="modules.php?required=NDSC";</script><?php
		}
}

?>