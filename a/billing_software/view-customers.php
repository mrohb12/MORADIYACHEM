<!DOCTYPE html>
<?php 
include_once("include/config.php");
include("addpayment.class.php");
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
        <title>View Customer | <?php print(APP_NAME); ?></title>

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
        
         <link href="plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
		<link href="plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

        <script src="assets/js/modernizr.min.js"></script>
    </head>
<?php 
if(!isset($_SESSION['BLData']) && empty($_SESSION['BLData']))
{
	$_SESSION['error'] = 'Invalid Request';
	header('Location:index.php');
	exit;
}
$userdata = $_SESSION['BLData']; 


// create an array for package information
$qryPackageInfo = mysql_query("SELECT  * FROM packages");
$arrPackageNameListInfo = array();
if(mysql_num_rows($qryPackageInfo) > 0) {
	while ($packageInfo = mysql_fetch_array($qryPackageInfo)) {
		$arrPackageNameListInfo[$packageInfo['id']]["name"] = $packageInfo['name'];
	}
}

//Delete Different Admin and Sub users of that particular admin
if(isset($_REQUEST['doAction']) && $_REQUEST['doAction'] = "deleteCustomer"){
	$userId = $_REQUEST['userId'];
	$datetime = date('Y-m-d');

	$query = " UPDATE users SET endeffdate = '".$datetime."'  WHERE id='".$userId."'";

	if(DEBUG){
		print($query);
		die;
	}
	
	$qryDelete = mysql_query($query);
	
	if($qryDelete)
	{
		//Delete Sub users of particular admin
		$qrySubUserDel = " UPDATE users SET endeffdate = '".$datetime."'  WHERE sub_user_id='".$userId."'";

		if(DEBUG){
			print($qrySubUserDel);
			die;
		}
		
		$qrySubUserDelete = mysql_query($qrySubUserDel);
		if($qrySubUserDelete)
		{
			//Delete Modules of Admin
			$qryModulesDel = " UPDATE package_modules SET endeffdate = '".$datetime."'  WHERE user_id='".$userId."'";
			if(DEBUG){
				print($qryModulesDel);
				die;
			}
		
			$qryModulesDelete = mysql_query($qryModulesDel);
			if($qryModulesDelete)
			{
				header("Location:view-customers.php?required=DSC");
			}
			else{
				header("Location:view-customers.php?required=MNDSC");
			}
		}
		else{
			header("Location:view-customers.php?required=SNDSC");
		}
	}
	else {
		header("Location:view-customers.php?required=NDSC");
	}
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
           <!-- ========== Left Sidebar Start ========== -->
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
                                    <h4 class="page-title">View Customers</h4>
                                   <ol class="breadcrumb p-0 m-0">
                                        <li><a href="dashboard.php">Dashboard</a></li>
										<li><a href="javascript:;">User Management</a></li>
                                        <li class="active">View Customers</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

                        <div class="row">
							<div class="col-md-12">
								<div class="card-box table-responsive">
                                    <h3 class="header-title m-t-0 m-b-10"><i class="fa fa-user"></i> View Customers </h3>   
                                    <div id="datatable-responsive_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
									
									 <?php 
											if(isset($_REQUEST['required']) && !empty($_REQUEST['required'])){
												if($_REQUEST['required'] == 'DSC') {?>
													 <div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
														<i class="mdi mdi-check-all"></i>
														User deleted successfully.</div><?php 
												}
												elseif($_REQUEST['required'] == 'NDSC') {?>
													 <div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
														<i class="mdi mdi-block-helper"></i>
														User not deleted auccessfully.
													</div><?php 
												}
												elseif($_REQUEST['required'] == 'MNDSC') {?>
													 <div class="alert alert-icon  alert-warning alert-dismissible fade in" role="alert">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
														<i class="mdi mdi-block-helper"></i>
														User's Modules Not Deletd Successfully.Please check User</u></strong>.
													</div><?php 
												}
												elseif($_REQUEST['required'] == 'SNDSC') {?>
													 <div class="alert alert-icon  alert-warning alert-dismissible fade in" role="alert">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
														<i class="mdi mdi-block-helper"></i>
														User's Sub User Not Deletd Successfully.</u></strong>.
													</div><?php 
												}
												
											}
											?>
                                 		<div class="row">
											<div class="col-sm-12 p-t-10">
											     
												<div class="card-box table-responsive">
												   <table id="datatable-responsive" class="table table-striped  table-colored table-info dt-responsive nowrap" cellspacing="0" width="100%">
														<thead>
															<tr>
																<th>No</th>
																<th>Name</th>
																<th data-priority="1">Username </th>
																<th data-priority="2">Email</th>
																<th data-priority="3">Package</th>
																<th data-priority="4">Dealer Name</th>
																<th data-priority="5">Status</th>
																<th data-priority="6">Action</th>
															</tr>
														</thead>
														<tbody>
														 <?php 
															if($userdata['user_type'] == "Admin") {
																$qrySelUsers = " SELECT * FROM users WHERE (endeffdate IS NULL OR endeffdate ='NULL' OR endeffdate='0000-00-00')  ORDER BY  id DESC  ";
															}
															else{
																$qrySelUsers = " SELECT * FROM users WHERE dealer_id = '".$userdata['id']."' AND (endeffdate IS NULL OR endeffdate ='NULL' OR endeffdate='0000-00-00')  ORDER BY  id DESC  ";
															}
															
															$rsltUsers = mysql_query($qrySelUsers);
																													
															if(mysql_num_rows($rsltUsers) > 0)
															{
																$count = 1;
																while($userInfo = mysql_fetch_array($rsltUsers))
																{
																	$packageName = "";
																	if($userInfo['package_id'] == 0) {
																		$packageName = "-";
																	}
																	else {
																		$packageName = $arrPackageNameListInfo[$userInfo['package_id']]['name'];
																	}
																	?>
																<tr>
																	<td><?php echo $count;?></td>
																	<td><span><?php echo ucwords($userInfo['fname']." ".$userInfo['lname']); ?></span></td>
																	<td><?php echo $userInfo['username'];?></td>
																	<td><?php echo $userInfo['email']; ?></td>
																	<td><?php print(trim($packageName)); ?></td>
																	<td><?php 
																	$arrDealers = getDealer();
																	print($arrDealers[$userInfo['dealer_id']]); ?></td>
																	<td><?php
																		$checked = ($userInfo['status'] == 1)?"checked":"";
																		?>
																		<input type="checkbox" id="switch<?php echo $userInfo['id']; ?>" class="statusChange" switch="bool" type="checkbox" data-table="users" data-index="id" data-id="<?php echo $userInfo['id']; ?>" value="1"  <?php echo $checked ?> name="status"/>
																		<label for="switch<?php echo $userInfo['id']; ?>" data-on-label="Active" data-off-label="Deactive"></label>
																			
																	</td>
																	
																	<td class="actions">
																		<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
																		<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
																		<a href="add-customer.php?action=edit&editId=<?php echo $userInfo['id']; ?>" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
																		<a  href="javascript:;" class="on-default remove-row active" onClick="javascript: return deleteAdminFromMaster(<?php echo $userInfo['id']; ?>);"  ><i class="fa fa-trash-o"></i></a>					
																	</td>
																</tr><?php 
																$count++;
																}
															}
														?>
														</tbody>
												   </table>
												</div>
											</div>
										</div>
									</div>
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
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="plugins/switchery/switchery.min.js"></script>

        <script src="plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables/dataTables.bootstrap.js"></script>
        <script src="plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="plugins/datatables/responsive.bootstrap.min.js"></script>


        <!-- init -->
        <script src="assets/pages/jquery.datatables.init.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
		
		<script src="assets/js/custom.js"></script>  

        <script type="text/javascript">
            $(document).ready(function () {
                $('#datatable').dataTable();
                $('#datatable-responsive').DataTable();
            });
            TableManageButtons.init();

        </script>
		<script>

		function deleteAdminFromMaster(userId){
			if (window.confirm('Are you sure,You want to delete this record?'))
			{
				window.location.href = 'view-customers.php?doAction=deleteCustomer&userId= '+userId;
			}
			else
			{
				return false;
			}
}
</script>
    </body>
</html>