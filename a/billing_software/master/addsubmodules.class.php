<?php
include("include/config.php");

if(isset($_GET["doAction"])&& $_GET["doAction"]=="SaveSortOrder") 
{	
	$arrSortOrder = array();
	$arrSortOrder = $_POST['sortOrder'];
	foreach($arrSortOrder as $key => $value){
		$value = mysqli_real_escape_string($conn,$value);
		$qrySortOrder = " UPDATE pages SET sortorder = '".$value."' WHERE id = '".$key."'";
		if(DEBUG){
			print($qrySortOrder);
		}
		$qrySortOrder = mysqli_query($conn,$qrySortOrder);
	}

	if (false === $qrySortOrder )
	{
		?><script>document.location="sub-modules.php?required=SOUNS";</script><?php
	}
	else {
		?><script>document.location="sub-modules.php?required=SOUS";</script><?php
	}
}

if(isset($_GET["doAction"])&& $_GET["doAction"]=="addPage")
{	
		$arrNewPage = array();
		$arrNewPage['lsPageCategory'] = $_POST["lsPageCategory"];
		$arrNewPage['txtPageName'] = mysqli_real_escape_string($conn,$_POST["txtPageName"]);
		$arrNewPage['txtFileName'] = mysqli_real_escape_string($conn,$_POST["txtFileName"]);
		if(isset($_POST["status"]) && !empty($_POST["status"])){
			$_POST["status"] = 1;
		}
		else {
			$_POST["status"] = 0;
		}

		$arrNewPage['status'] = $_POST["status"];
	 	
		$datetime = date('Y-m-d H:i:s');

		$insQry = "INSERT INTO pages(category_id,pagename,file,status,datetimex) 
					VALUES('".$arrNewPage['lsPageCategory']."',
					'".$arrNewPage['txtPageName']."',
					'".$arrNewPage['txtFileName']."',
					'".$arrNewPage['status']."',
					'".$datetime."')";	
					
		if(DEBUG){			
			print($insQry);
			die;
		}
		
		$queryInsert = mysqli_query($conn,$insQry);
		
		if(false === $queryInsert) {
			?><script>document.location="add-sub-module.php?required=NSC";</script><?php
		}
		else{
			?><script>document.location="add-sub-module.php?required=SC";</script><?php
		}

}



if(isset($_GET["doAction"])&& $_GET["doAction"]=="updatePage")
{	
		$arrUpdatePage = array();
		if(DEBUG){
			print("<pre>");
			print_r( $_POST);
			print("</pre>");
			die;
		}

		$arrUpdatePage['pageId'] = $_POST['pageId'];	
		$arrUpdatePage['lsPageCategory'] = $_POST['lsPageCategory'];
		$arrUpdatePage['txtPageName'] = mysqli_real_escape_string($conn,$_POST["txtPageName"]);
		$arrUpdatePage['txtFileName'] = mysqli_real_escape_string($conn,$_POST["txtFileName"]);
		if(isset($_POST["status"]) && !empty($_POST["status"])){
			$_POST["status"] = 1;
		}
		else {
			$_POST["status"] = 0;
		}
		$arrUpdatePage['status'] = $_POST["status"];
	 	$qryUpdate = " UPDATE pages SET 
					category_id = '".$arrUpdatePage['lsPageCategory']."',
					pagename = '".$arrUpdatePage['txtPageName']."',
					file = '".$arrUpdatePage['txtFileName']."',
					status = '".$arrUpdatePage['status']."'
					WHERE id='".$arrUpdatePage['pageId']."'";
	
		if(DEBUG){
			print($qryUpdate);
			die;
		}
		
		$qryUpdate = mysqli_query($conn,$qryUpdate);
		$pageId = $arrUpdatePage['pageId'];
		
		if (false === $qryUpdate){
			?><script>document.location="add-sub-module.php?doAction=updatePage&pageId=<?php print($pageId);?>&required=NUSC";</script><?php
		}
		else {
			?><script>document.location="add-sub-module.php?doAction=updatePage&pageId=<?php print($pageId);?>&required=USC";</script><?php
		}

}



if(isset($_GET["doAction"])&& $_GET["doAction"]=="deletePage")
{	
		$pageId = $_GET['pageId'];
	 	
		$datetime = date('Y-m-d');
		
		$qryDelete = " UPDATE pages SET endeffdate = '".$datetime."'  WHERE id='".$pageId."'";
	
		if(DEBUG){
			print($qryDelete);
			die;
		}
		
		$qryDelete = mysqli_query($conn,$qryDelete);
		
		if (false === $qryDelete)
		{
			?><script>document.location="sub-modules.php?required=NDSC";</script><?php
		}
		else {
			?><script>document.location="sub-modules?required=DSC";</script><?php
		}
} 


?>