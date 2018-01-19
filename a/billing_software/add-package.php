<!DOCTYPE html><?php include('include/config.php');?>
<html><?php $pageAction = "Add";if(isset($_GET['editId'])){		$pageAction = "Edit";}?>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.png">
        <!-- App title -->
        <title><?php print($pageAction);?> Package | <?php print(APP_NAME);?></title>
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
<?php 
$BASE_URL = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?');
if(!isset($_SESSION['BLData']) && empty($_SESSION['BLData']))
{
	$_SESSION['error'] = 'Invalid Request';
	header('Location:index.php');
	exit;
}
$error ='';
$success = '';
$msg ='';
$userdata = $_SESSION['BLData']; 
$txtPackageName = '';
$txtPackageCost  = '';
$lsPackageValidity = '';$lsFullRightsUser = '';$lsViewOnlyUser = '';
$status  = 1 ;
$array = array();

if(isset($_GET['editId']))
{
	$query = "select * from packages where id='".$_GET['editId']."'";
	$result = mysql_query($query);
	if(mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);	
		$txtPackageName  = $row['name'];	
		$txtPackageCost  = $row['price'];			
		$lsPackageValidity = $row['validity'];				$lsFullRightsUser = $row['full_right_user'];						$lsViewOnlyUser = $row['view_only_user'];
		$status  = $row['status'];		
	}
	else
	{
		$error = 'Not Found.';
		header('location:view-packages.php');
	}
} 	
if(isset($_POST['submit']))
{
	$app = (isset($_POST['app']) && !empty($_POST['app']))?$_POST['app']:array();
	$app = array_filter($app);
	$ap = json_encode($app);
	$app_cnt = count($app);
	$txtPackageName  = (isset($_POST['txtPackageName']) && $_POST['txtPackageName']!='' )?test_input($_POST['txtPackageName']):"";
	$txtPackageCost  = (isset($_POST['txtPackageCost']) && $_POST['txtPackageCost']!='' )?test_input($_POST['txtPackageCost']):"";	$lsPackageValidity  = (isset($_POST['lsPackageValidity']) && $_POST['lsPackageValidity']!='' )?test_input($_POST['lsPackageValidity']):"";	$lsFullRightsUser  = (isset($_POST['lsFullRightsUser']) && $_POST['lsFullRightsUser']!='' )?test_input($_POST['lsFullRightsUser']):"";	$lsViewOnlyUser  = (isset($_POST['lsViewOnlyUser']) && $_POST['lsViewOnlyUser']!='' )?test_input($_POST['lsViewOnlyUser']):"";
	$status = (isset($_POST['status']))?1:0;	
	$date = date('Y-m-d H:i:s');	
	if(isset($_POST['action']) && $_POST['action']=='edit')
	{
		if($txtPackageName !="" && $lsPackageValidity !="" )
		{
			if($error =='')
			{
				$query = "UPDATE packages SET
							name= '".$txtPackageName."',	 
							price= '".$txtPackageCost."',
							validity = '".$lsPackageValidity."',							full_right_user = '".$lsFullRightsUser."',							view_only_user = '".$lsViewOnlyUser."',
							status= ".$status."						
							where id='".$_POST['id']."'";			 
				$result = mysql_query($query);
				if($result) 
				{
					header("location:view-packages.php?required=UP");
					exit;
				}
				else {
					header("location:view-packages.php?required=NUP");
					exit;
				}
			}
		}
		else {
			$error = ' All fields are required';
		}
	}
	else {	
		if($txtPackageName != "" && $txtPackageCost != ""  )
		{	
			if($error == '')
			{
				 $query="INSERT INTO packages SET
							name = '".$txtPackageName."',	 
							price = '".$txtPackageCost."',
							validity = '".$lsPackageValidity."',							full_right_user = '".$lsFullRightsUser."',							view_only_user = '".$lsViewOnlyUser."',
							status = ".$status.",
							created_at = '".$date."'";				
				$result = mysql_query($query);
				if($result)
				{
					header('location:view-packages.php?required=IS');
					exit;
				}
				else {
					header('location:view-packages.php?required=NIS');
					exit;
				}
			}
		}
		else {
			$error =' All fields are required';
		}	
	}	
}
function test_input($data) {
	$data = trim($data);
	$data = addslashes($data);
	return $data;
}
?>
   <body class="fixed-left">
        <!-- Loader -->
        <?php include("include/loader.php");?>
        <!-- Begin page -->
        <div id="wrapper">
           		   <!-- Top Bar Start -->
            <?php include("include/topbar.php");?>
            <!-- Top Bar End -->
            <!-- ========== Left Sidebar Start ========== -->			 <!-- Sidebar -left -->
           <?php include("include/leftbar.php");?>
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
                                    <h4 class="page-title">Add Packages</h4>
                                     <ol class="breadcrumb p-0 m-0">
                                         <li><a href="dashboard.php">Dashboard</a></li>
										<li><a href="javascript:;">Package Master</a></li>
                                        <li class="active">Add Packages</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-md-12">
								<div class="card-box table-responsive">
									<h3 class="header-title m-t-0 m-b-10"><i class="mdi mdi-package"></i> Add Packages</h3>                                
									<form id="frmPackageDetail" onSubmit="javascript:return submitFrmPck();" name="frmPackageDetail" class="form-horizontal" enctype="multipart/form-data" method="post">  										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label class="col-md-2 control-label">Name<span class="text-danger">*</span></label>
													<div class="col-md-10">
														<input type="text" value="<?php print($txtPackageName);?>" id="txtPackageName" name="txtPackageName" class="form-control" placeholder="Enter Package Name">
														<ul class="parsley-errors-list filled" id="pckName" style="display:none;"><li class="parsley-required">Please enter package name.</li></ul>
													</div>
												</div>
											</div>  
											<div class="col-md-4">
												<div class="form-group">
													<label class="col-md-2 control-label" >Cost<span class="text-danger">*</span></label>
													<div class="col-md-10">
													<input type="text" value="<?php print($txtPackageCost);?>" id="txtPackageCost" name="txtPackageCost" class="form-control" placeholder="Enter Package Cost">
													<ul class="parsley-errors-list filled" id="pckCostName" style="display:none;"><li class="parsley-required">Please enter package cost.</li></ul>
													</div>
												</div>
											</div>											<div class="col-md-4">												<div class="form-group">													<label class="col-md-2 control-label" >Validity<span class="text-danger">*</span></label>													<div class="col-md-10">													<select id="lsPackageValidity" class="form-control select2" name="lsPackageValidity">														 <option value="">Select validity</option>														 <option value="1m" <?php if($lsPackageValidity == '1m'){															 ?>selected<?php														 }?>>1 Month</option>														 <option value="1y" <?php if($lsPackageValidity == '1y'){															 ?>selected<?php														 }?>>1 Year</option>													</select>													<ul class="parsley-errors-list filled" id="pckCostName" style="display:none;"><li class="parsley-required">Please select validity.</li></ul>													</div>												</div>											</div>
										</div>
										
										<div class="row">   																						<div class="col-md-4">												<label class="col-md-2 control-label" >Full Rights Users: </label>												<div class="col-md-10">													<select id="lsFullRightsUser" class="form-control select2" name="lsFullRightsUser">														 <option value="">Select full rights users</option>														 <option value="1" <?php if($lsFullRightsUser == 1){															 ?>selected<?php														 }?>>1</option>														 <option value="99" <?php if($lsFullRightsUser == 99){?>															selected <?php 														 }?>>99</option>													</select>												</div>											</div>											<div class="col-md-4">												<label class="col-md-2 control-label" >View Only Users: </label>												<div class="col-md-10">													<select id="lsViewOnlyUser" class="form-control select2" name="lsViewOnlyUser">														 <option value="">Select full rights user</option>														<option value="1"<?php if($lsViewOnlyUser == 1){															 ?>selected<?php														 }?>>1</option>														 <option value="99"<?php if($lsViewOnlyUser == 99){															 ?>selected<?php														 }?>>99</option>													</select>												</div>											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label class="col-md-2 control-label text-right" >Status</label>
													<div class="col-md-10" style="margin-top: 8px;">
														<input type="checkbox" id="switch5" class="statusChange" switch="bool" <?php echo ($status == 1)?"checked":""; ?> name="status"/>
														<label for="switch5" data-on-label="Active" data-off-label="Deactive"></label>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="col-md-6 text-left">
												<a href="view-packages.php"  class="btn btn-primary btn-rounded w-md waves-effect waves-light">Back</a>
											</div>
											<div class="col-md-6 text-right">
												  <?php
													if(isset($_GET['editId'])) { ?>
														<input type="hidden" name="id" value="<?php echo $_GET['editId'];?>" />
														<input type="hidden" name="action" value="<?php echo $_GET['action'];?>" />                   
												   <?php } ?>       
												<button type="submit" title="<?php if(isset($_GET['editId'])) { echo "Update "; } else { echo "Add "; } ?> Package" name="submit" id="submit" class="btn btn-info btn-rounded w-md waves-effect waves-light"><?php if(isset($_GET['editId'])) { echo "Update "; } else { echo "Add "; } ?> Package</button>
											</div>
										</div>
									</form>     
                                </div>
                                <!-- END SIMPLE DATATABLE -->
                            </div>
                        </div>
                        <!-- end row -->
                    </div> <!-- container -->
                </div> <!-- content -->
                 <?php include("include/footer-text.php");?>
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
	    <script src="assets/js/fieldvalidation.js"></script>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="plugins/switchery/switchery.min.js"></script>
        <script src="plugins/datatables/responsive.bootstrap.min.js"></script>
        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
    </body>
</html>