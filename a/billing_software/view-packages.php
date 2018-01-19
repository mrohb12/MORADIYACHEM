<!DOCTYPE html>
<?php  include('include/config.php'); 
if(!isset($_SESSION['BLData']) && empty($_SESSION['BLData']))
{	$_SESSION['error'] = 'Invalid Request';
	header('Location:index.php');
	exit;
}$userdata = $_SESSION['BLData']; 
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Sarman Ranavaya">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.png">
        <!-- App title -->
        <title>View Package | <?php print(APP_NAME);?></title>
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
		<link href="plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />        <script src="assets/js/modernizr.min.js"></script>
    </head>
    <body class="fixed-left">        <!-- Loader -->
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
                                    <h4 class="page-title">View Packages</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                         <li><a href="dashboard.php">Dashboard</a></li>
										<li><a href="javascript:;">Package Master</a></li>
                                        <li class="active">View Packages</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

                        <div class="row">
							<div class="col-md-12">
								<div class="card-box table-responsive">
                                    <h3 class="header-title m-t-0 m-b-10"><i class="mdi mdi-package"></i> All Packages</h3>   
                                    <div id="datatable-responsive_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
										<div class="row">
											<div class="col-sm-12 p-t-10">
											<?php if(isset($_REQUEST['required']) && $_REQUEST['required'] == "UP"){ ?>
												<div class="alert alert-success" role="alert">
													<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
													Package Updated Succefully
												</div>
												<?php } 
												if(isset($_REQUEST['required']) && $_REQUEST['required'] == "NUP"){ ?>
													<div class="alert alert-danger" role="alert">
														<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
														Package Not Updated Succefully
													</div><?php 
												} 
												if(isset($_REQUEST['required']) && $_REQUEST['required'] == "IS"){ ?>
													<div class="alert alert-success" role="alert">
														<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
														Package Added Succefully
													</div><?php 
												} 
												if(isset($_REQUEST['required']) && $_REQUEST['required'] == "NIS"){ ?>
													<div class="alert alert-danger" role="alert">
														<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
														Package Not Added Succefully
													</div><?php 
												} ?>
												<div class="">
													<table id="datatable-responsive" class="table table-striped  table-colored table-info dt-responsive nowrap" cellspacing="0" width="100%">
														<thead>
															<tr>
																<th>No</th>
																<th>Name</th>
																<th>Validity</th>
																<th>No of Users</th>
																<th data-priority="1">Cost(&#8377;)</th><?php
																if($userdata['user_type'] == "Admin"){
																	?>
																	<th data-priority="3">Status</th>
																	<th data-priority="1">Action</th><?php
																}?>
															</tr>
														</thead>
														<tbody><?php 
															$selPackages = " SELECT * FROM packages  ORDER BY  id DESC  ";
															$rsltPackages = mysql_query($selPackages);															if(mysql_num_rows($rsltPackages) > 0)
															{
																$count = 1;
																while($packageDetails = mysql_fetch_array($rsltPackages))
																{
																
																	?><tr>
																		<td><strong><?php echo $count;  ?></strong></td>
																		<td><span><?php echo strip_tags($packageDetails['name']) ; ?></span></td>
																		<td><span><?php 
																			if($packageDetails['validity'] == "1m"){
																				print("1 Month");
																			}
																			if($packageDetails['validity'] == "1y"){
																				print("1 Year");
																			}
																																					
																			?></span></td>
																		<td><span><?php echo ($packageDetails['full_right_user']) ; ?></span></td>
																		<td>&#8377;<?php echo $packageDetails['price'] ; ?></td><?php
																		if($userdata['user_type'] == "Admin"){
																			?>
																			<td>
																			<?php
																				$checked = ($packageDetails['status'] == 1)?"checked":"";
																				?><input type="checkbox" id="switch<?php echo $packageDetails['id']; ?>" class="statusChange" switch="bool" type="checkbox" data-table="packages" data-index="id" data-id="<?php echo $packageDetails['id']; ?>" value="1"  <?php echo $checked ?> name="status"/>
																				<label for="switch<?php echo $packageDetails['id']; ?>" data-on-label="Active" data-off-label="Deactive"></label>																			</td>
																			<td class="actions">
																			<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
																			<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
																			<a href="add-package.php?action=edit&editId=<?php echo $packageDetails['id']; ?>" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
																			<a  href="javascript:;" class="deleteRecord  on-default remove-row active" data-table="packages" data-index="id" data-id="<?php echo $packageDetails['id']; ?>"  ><i class="fa fa-trash-o"></i></a>																			
																		</td><?php
																		}?>
																	</tr><?php 
																	$count++;
																}
															}?>
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
        </script>
    </body>
</html>