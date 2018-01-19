<!DOCTYPE html>
<?php include("include/config.php"); 
if(!isset($_SESSION['BLData']) && empty($_SESSION['BLData']))
{
	$_SESSION['error'] = 'Invalid Request';
	header('Location:index.php');
	exit;
}

$userInfo = $_SESSION['BLData'];

$arrCategories = array();
$arrCategories = $_POST['chkCatName'];

if($_POST)
{
	$datetime = date('Y-m-d H:i:s');
	if(isset($_POST['submit']) or isset($_POST['update']))
	{
		$count = 0;
			
		foreach ($arrCategories as $key =>$value){
			
			$arrName = $_POST['chkPageName'.$value];
			
			if(count($arrName) > 0){
				$string = "";
				
				for($i=0;$i<=count($arrName);$i++) {
					
					if(count($arrName) >= 1) {
						
						if($i == 0){	
						//	$string .="{";
						}
						if($i+1 < count($arrName)){
							$commaSep = ",";
						}
						else{
							$commaSep ="";
						}
						$string .= $arrName[$i].$commaSep;
						
						if($i == count($arrName)){
						//$string .="}";
						}
					}
					else{
						//$string .="{";
						$string .= $arrName[$i];
						//$string .="}";
					}
				}
				$arrCatInfo[$value] = $string;	
				$count++;
			}
		}
	}
	
	$data = json_encode($arrCatInfo);
	
	if(isset($_POST['submit']))
	{
		$insQry = "INSERT INTO package_modules(package_id,user_id,modules,datetimex) 
						VALUES('".$_POST['lsPackage']."',
						'".$userInfo['id']."',
						'".$data."',
						'".$datetime."')";	
		
		$queryInsert = mysql_query($insQry) or die(mysql_error());
		if($queryInsert) {
			header("Location:assign-roles.php?required=SU");
		}
		else{
			header("Location:assign-roles.php?required=NSU");
		}
	}
	else{
		$qrySelPackage = mysql_query("SELECT  * FROM package_modules WHERE package_id = '".$_POST['lsPackage']."'");
		
		if(mysql_num_rows($qrySelPackage) > 0) {
			$query = " UPDATE package_modules SET 
						package_id = '".$_POST['lsPackage']."',
						user_id = '".$userInfo['id']."',
						modules = '".$data."'
						WHERE package_id='".$_POST['lsPackage']."'";
		
			
			$queryUpdate = mysql_query($query) or die(mysql_error());
			if($queryUpdate) {
				header("Location:assign-roles.php?required=SU");
			}
			else{
				header("Location:assign-roles.php?required=NSU");
			}
		}
		else{
			$insQry = "INSERT INTO package_modules(package_id,user_id,modules,datetimex) 
						VALUES('".$_POST['lsPackage']."',
						 '".$userInfo['id']."',
						'".$data."',
						'".$datetime."')";	
		
			$queryInsert = mysql_query($insQry) or die(mysql_error());
			if($queryInsert) {
				header("Location:assign-roles.php?required=SU");
			}
			else{
				header("Location:assign-roles.php?required=NSU");
			}
		}
	}
}


// create an array for package information
$qryPackageInfo = mysql_query("SELECT  * FROM packages WHERE status = 1");
$arrPackageNameListInfo = array();
if(mysql_num_rows($qryPackageInfo) > 0) {
	while ($packageInfo = mysql_fetch_array($qryPackageInfo)) {
		$arrPackageNameListInfo[$packageInfo['id']] = $packageInfo['name'];
	}
}
// create an array for package information
$qryPageCategory = mysql_query("SELECT  * FROM page_categories WHERE (endeffdate IS NULL OR endeffdate ='NULL' OR endeffdate='0000-00-00') AND status = 1");
$arrPageCategoryInfo = array();
if(mysql_num_rows($qryPageCategory) > 0) {
	while ($pagecatInfo = mysql_fetch_array($qryPageCategory)) {
		$arrPageCategoryInfo[$pagecatInfo['id']] = $pagecatInfo['category_name'];
	}
}
// create an array for package information
$qryPage = mysql_query("SELECT  * FROM pages WHERE (endeffdate IS NULL OR endeffdate ='NULL' OR endeffdate='0000-00-00') AND status = 1");
$arrPageInfo = array();
if(mysql_num_rows($qryPage) > 0) {
	while ($pageInfo = mysql_fetch_array($qryPage)) {
		$arrPageInfo[$pageInfo['category_id']] = $pageInfo;
	}
	
}

?>
<html>
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Sarman Ranavaya">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.png">
        <!-- App title -->
        <title>Assign Modules | <?php print(APP_NAME);?></title>

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="plugins/morris/morris.css">
        
         <!-- Table Responsive css -->
        <link href="plugins/responsive-table/css/rwd-table.min.css" rel="stylesheet" type="text/css" media="screen">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="plugins/switchery/switchery.min.css">

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        
		<link href="plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
        <link href="plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
        <link href="plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

        <script src="assets/js/modernizr.min.js"></script>
    </head>
    <body class="fixed-left">
        <!-- Loader -->
       <?php include("include/loader.php");?>
        <!-- Begin page -->
        <div id="wrapper">
            <!-- Top Bar Start -->
       
              <?php include("include/topbar.php");?>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
             <?php include("include/leftbar.php");?>
             <!-- Sidebar -left -->
        
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Assign Modules</h4>
                                    <ol class="breadcrumb p-0 m-0">
										<li><a href="dashboard.php">Dashboard</a></li>
                                        <li><a href="javascript:;">Package Master</a></li>
                                        <li class="active">Assign Modules</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->
						
						<form class="form-horizontal" role="form" method ="POST" name="frmAssignPackage" id="frmAssignPackage" action="assign-roles.php">
                        <div class="row">
							<div class="col-sm-12">
                                <div class="card-box table-responsive">
								<div class="form-group row" id="divlsState">
										<label class="col-sm-2 form-control-label mrg9Top" for="heard">Select Package :</label>
										 <div class="col-md-3 col-xs-12">
										<select id="lsPackage" class="form-control select2" name="lsPackage" onChange="javascript:getPage(this.value);">
											 <option value="">Select Package</option>
											<?php
											foreach($arrPackageNameListInfo as $key => $value){
												?><option value="<?php print($key);?>">
												<?php print($value);?></option><?php
											}
											?>
										</select>
										</div>
									</div>
								</div>
							</div>
							<div id = "ajaxPage">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>Assign Packages</b></h4>
									<?php 
											if(isset($_REQUEST['required']) && !empty($_REQUEST['required'])){
												if($_REQUEST['required'] == 'SU' ) {?>
													 <div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">�</span>
														</button>
														<i class="mdi mdi-check-all"></i>Package Rights Updated Successfully.</div><?php 
												}
												if($_REQUEST['required'] == 'NSU') {?>
													 <div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">�</span>
														</button>
														<i class="mdi mdi-block-helper"></i>Package Rights Not Updated Successfully.
													</div><?php 
												}
											}
											?>
											
											<?php 
											foreach($arrPageCategoryInfo as $key => $value){
												$qryPage = mysql_query("SELECT  * FROM pages WHERE category_id= '".$key."' AND (endeffdate IS NULL OR endeffdate ='NULL' OR endeffdate='0000-00-00') AND status = 1");
												$arrPageInfo = array();
												if(mysql_num_rows($qryPage) > 0) {
													?><div class="col-lg-6">
														<div class="panel panel-default">
															<div class="panel-heading">
																<h3 class="panel-title">
																	<div class="checkbox checkbox-primary">
																		<input id="chkCatName<?php print($key);?>" class="categoryChange"  type="checkbox" name="chkCatName[]" value="<?php print($key);?>"  >
																		<label for="chkCatName<?php print($key);?>">
																			<?php print($value);?>
																		</label>
																	</div>
																</h3>
															</div>
															<div class="panel-body">
															<?php 
																while ($pageInfo = mysql_fetch_array($qryPage)) {
																	?>
																	 <div class="col-sm-6">
																		<div class="checkbox checkbox-primary">
																			<input id="chkPageName<?php print($pageInfo['id']); ?>" data-superid="<?php print($key);?>" type="checkbox" name="chkPageName<?php print($key);?>[]" class="chkPageName<?php print($key);?> subCategoryChange" value="<?php print($pageInfo['id']); ?>">
																			<label for="chkPageName<?php print($pageInfo['id']); ?>">
																				<?php print($pageInfo['pagename']);?>
																			</label>
																		</div>
																	</div><?php 
																}
																?>
															</div>
														</div>
													</div><?php 
												}
											}
											?>
										 <div class="col-sm-12 col-xs-12 col-md-12 " style="width:94%; margin-top:20px;">
											<div class="form-group row text-center m-b-0">
												<input type="submit" name="submit" id="submit" class="btn btn-success w-md" value="Assign" title="Assign">
											</div>
										</div>	
									</div>
								</div>
							</div>
						</form>
                    </div>  </div><!-- container -->
                </div> <!-- content -->
				<?php include("footer-text.php");?>
            </div>
			
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
			 <!-- Right Sidebar -->
            <?php include("include/right-sidebar.php");?>
            <!-- /Right-bar -->
        </div>
        <!-- END wrapper -->

		 <script>
            var resizefunc = [];
        </script>

       <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="plugins/switchery/switchery.min.js"></script>

       <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        <!-- jQuery  -->
    </body>
</html>
<script>
$(document).ready(function() {
		$(document).on( 'change',".categoryChange",function(){
			var cat_id = $(this).val();
			if($(this).is(':checked'))
			{
				$('.chkPageName'+cat_id).prop('checked', true);
			}
			else
			{
				$('.chkPageName'+cat_id).prop('checked', false);
			}
		});
		
		$(document).on( 'change',".subCategoryChange",function(){
			var cat_id = $(this).val();
			var superid = $(this).data('superid');
			$('#chkCatName'+superid).prop('checked', true);
			
			
		});
});
function deleteRecord(userId){
	if (window.confirm('Are you sure,You want to delete this record?'))
	{
		window.location.href = 'newuser.class.php?doAction=deleteUser&userID= '+userId;
	}
	else
	{
		return false;
	}
}

function getPage(id) {
	$('#ajaxPage').html('<div style="margin-left:470px;"><img src="loading.gif" /></div>');
	jQuery.ajax({
		url: "get-ajax-pages.php",
		data:'id='+id,
		type: "POST",
		success:function(data){
			$('#ajaxPage').html(data);
		}
		
	});
}

</script>