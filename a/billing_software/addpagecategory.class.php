<?php
require_once "class/pagecategory.class.php";
$objPageCategory = new PAGECATEGORY();
if(isset($_GET["doAction"])&& $_GET["doAction"]=="SaveSortOrder") {		$arrSortOrder = array();	$arrSortOrder = $_POST['sortOrder'];	$objPageCategory->saveSortOrder($arrSortOrder);	}
if(isset($_GET["doAction"])&& $_GET["doAction"]=="addPageCategory")
{	
		$arrPageCat = array();
		$arrPageCat['txtCatName'] = $_POST["txtCatName"];
		$arrPageCat['txtCatIcon'] = $_POST["txtCatIcon"];
		
		if(isset($_POST["status"]) && !empty($_POST["status"])){
			$_POST["status"] = 1;
		}
		else {
			$_POST["status"] = 0;
		}
		$arrPageCat['status'] = $_POST["status"];

	 	$objPageCategory->addPageCategory($arrPageCat);

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
		$arrUpdatePageCat['name'] = $_POST["txtCatName"];
		$arrUpdatePageCat['txtCatIcon'] = $_POST["txtCatIcon"];
		if(isset($_POST["status"]) && !empty($_POST["status"])){
			$_POST["status"] = 1;
		}
		else {
			$_POST["status"] = 0;
		}
		$arrUpdatePageCat['status'] = $_POST["status"];
		
	 	$objPageCategory->updatePageCategory($arrUpdatePageCat);

}

if(isset($_GET["doAction"])&& $_GET["doAction"]=="deletePageCategory")
{	
		$catId = $_GET['catId'];
	 	$objPageCategory->deletePageCategory($catId);

}

function allPageCategory(){
	
	$qrySel = mysql_query("SELECT * FROM page_categories WHERE (endeffdate IS NULL OR endeffdate ='NULL' OR endeffdate='0000-00-00')") or die(mysql_error());
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

?>