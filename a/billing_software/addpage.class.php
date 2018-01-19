<?php
require_once "class/page.class.php";
$objPage = new PAGES();if(isset($_GET["doAction"])&& $_GET["doAction"]=="SaveSortOrder") {		$arrSortOrder = array();	$arrSortOrder = $_POST['sortOrder'];	$objPage->saveSortOrder($arrSortOrder);	}
if(isset($_GET["doAction"])&& $_GET["doAction"]=="addPage")
{	
		$arrNewPage = array();
		$arrNewPage['lsPageCategory'] = $_POST["lsPageCategory"];
		$arrNewPage['txtPageName'] = $_POST["txtPageName"];
		$arrNewPage['txtFileName'] = $_POST["txtFileName"];
		if(isset($_POST["status"]) && !empty($_POST["status"])){
			$_POST["status"] = 1;
		}
		else {
			$_POST["status"] = 0;
		}
		$arrNewPage['status'] = $_POST["status"];
	 	$objPage->addPage($arrNewPage);
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
		$arrUpdatePage['txtPageName'] = $_POST["txtPageName"];
		$arrUpdatePage['txtFileName'] = $_POST["txtFileName"];
		if(isset($_POST["status"]) && !empty($_POST["status"])){
			$_POST["status"] = 1;
		}
		else {
			$_POST["status"] = 0;
		}
		$arrUpdatePage['status'] = $_POST["status"];
	 	$objPage->updatePage($arrUpdatePage);
}

if(isset($_GET["doAction"])&& $_GET["doAction"]=="deletePage")
{	
		$pageId = $_GET['pageId'];
	 	$objPage->deletePage($pageId);
} 

function allPages(){
	$qrySel = mysql_query("SELECT * FROM pages WHERE (endeffdate IS NULL OR endeffdate ='NULL' OR endeffdate='0000-00-00')") or die(mysql_error());
	if(DEBUG){
		print($qrySel);
	}
	$arrReturn = array();
	$check = mysql_num_rows($qrySel);
	if($check > 0) {
		while ($row = mysql_fetch_array($qrySel))  
		{
			$arrReturn[] = $row;	
		}
	} 
	return $arrReturn;
}
function allCategories(){
	$qrySel = mysql_query("SELECT * FROM page_categories WHERE (endeffdate IS NULL OR endeffdate ='NULL' OR endeffdate='0000-00-00')") or die(mysql_error());
	if(DEBUG){
		print($qrySel);
	}
	$arrReturn = array();
	$check = mysql_num_rows($qrySel);
	if($check > 0) {
		while ($row = mysql_fetch_array($qrySel))  
		{
			$arrReturn[$row['id']] = $row['category_name'];	
		}
	} 
	return $arrReturn;
}
?>