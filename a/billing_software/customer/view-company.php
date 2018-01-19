<?php include('include/config.php');  
$userData = $_SESSION['earth_india@AdminUserData'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title><?php print($page); ?> | <?php print(APP_NAME); ?></title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content=""/>
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	
    <!-- Fancy-Buttons CSS -->
	<link href="dist/css/fancy-buttons.css" rel="stylesheet" type="text/css">
	
	<!-- Data table CSS -->
	<link href="vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	
	<!-- switchery CSS -->
	<link href="vendors/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" type="text/css"/>
	
	<!-- Bootstrap Switches CSS -->
	<link href="vendors/bower_components/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
		
	<!-- Custom CSS -->
	<link href="dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<!--Preloader-->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!--/Preloader-->
	
    <div class="wrapper theme-1-active pimary-color-red">
		
		<!-- Top Menu Items -->
		<?php include("include/topmenu.php"); ?>
		<!-- /Top Menu Items -->
		
		<!-- Left Sidebar Menu -->
		<?php include("include/leftsidebar.php"); ?>
		<!-- /Left Sidebar Menu -->
		
		<!-- Right Sidebar Menu -->
		<?php include("include/rightsidebar.php"); ?>
		<!-- /Right Sidebar Menu -->
		
		
		<!-- Main Content -->
		<div class="page-wrapper">
			<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Companies</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="dashboard.php">Dashboard</a></li>
						<li><a href="javascript:;"><span>Company Management</span></a></li>
						<li class="active"><span>Companies</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->
				
				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Companies</h6>
								</div>
								<div class="pull-right">
									<a href="add-company.php" class="btn btn-warning btn-anim" data-toggle="tooltip" title="Add Company".><i class="fa fa-plus"></i><span class="btn-text">Add Company</span></a>
								</div>
								
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="datable_1" class="table table-hover display  pb-30" >
												<thead>
													<tr>
														<th>Sr.No</th>
														<th>Company Name</th>
														<th>Contact No</th>
														<th>City</th>
														<th>Status</th>	
														<th>Action</th>
														
													</tr>
												</thead>
												
												<tbody>
													<tr>
														<td>1</td>
														<td>ABC</td>
														<td>9727477438</td>
														<td>Junagadh</td>
														<td><input type="checkbox" checked class="js-switch js-switch-1" data-color="#469408" /></td>
														<td>
															<button class="btn btn-default btn-icon-anim btn-square" data-toggle="tooltip" title="Edit".><i class="fa fa-pencil"></i></button>
															<button class="btn btn-info btn-icon-anim btn-square" data-toggle="tooltip" title="Delete".><i class="icon-trash"></i></button>
														</td>
													</tr>
													<tr>
														<td>2</td>
														<td>XYZ</td>
														<td>9845786545</td>
														<td>Junagadh</td>
														<td><input type="checkbox" checked class="js-switch js-switch-1" data-color="#469408"/></td>
														<td>
															<button class="btn btn-default btn-icon-anim btn-square" data-toggle="tooltip" title="Edit".><i class="fa fa-pencil"></i></button>
															<button class="btn btn-info btn-icon-anim btn-square" data-toggle="tooltip" title="Delete".><i class="icon-trash"></i></button>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>
				</div>
				<!-- /Row -->
			</div>
			
			<!-- Footer -->
			<?php include("include/footer-text.php");?>
			<!-- /Footer -->
			
		</div>
		<!-- /Main Content -->

    </div>
    <!-- /#wrapper -->
	
	<!-- JavaScript -->
	
    <!-- jQuery -->
    <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    
	<!-- Data table JavaScript -->
	<script src="vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="dist/js/dataTables-data.js"></script>
	
	<!-- Moment JavaScript -->
	<script type="text/javascript" src="vendors/bower_components/moment/min/moment-with-locales.min.js"></script>
	
	<!-- Bootstrap Colorpicker JavaScript -->
	<script src="vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
	
	<!-- Switchery JavaScript -->
	<script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>
	
	<!-- Select2 JavaScript -->
	<script src="vendors/bower_components/select2/dist/js/select2.full.min.js"></script>
	
	<!-- Bootstrap Select JavaScript -->
	<script src="vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	
	<!-- Bootstrap Tagsinput JavaScript -->
	<script src="vendors/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
	
	<!-- Bootstrap Touchspin JavaScript -->
	<script src="vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
	
	<!-- Multiselect JavaScript -->
	<script src="vendors/bower_components/multiselect/js/jquery.multi-select.js"></script>
	
	 
	<!-- Bootstrap Switch JavaScript -->
	<script src="vendors/bower_components/bootstrap-switch/dist/js/bootstrap-switch.min.js"></script>
	
	<!-- Bootstrap Datetimepicker JavaScript -->
	<script type="text/javascript" src="vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
	
	<!-- Form Advance Init JavaScript -->
	<script src="dist/js/form-advance-data.js"></script>
	
	<!-- Slimscroll JavaScript -->
	<script src="dist/js/jquery.slimscroll.js"></script>

	<!-- Fancy Dropdown JS -->
	<script src="dist/js/dropdown-bootstrap-extended.js"></script>
	
	<!-- Owl JavaScript -->
	<script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>

	<!-- Init JavaScript -->
	<script src="dist/js/init.js"></script>
	
	<?php include("include/footer-js.php");?>
	
	<script>
			navigationMenu("vendor_management");
			navigationSubMenu("view_vendor");
		</script>
	
</body>

</html>
