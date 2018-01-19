<?php include('include/config.php');  
$userData = $_SESSION['earth_india@AdminUserData'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title><?php print($page); ?> | <?php print(APP_NAME); ?></title>
		
		<meta name="author" content=""/>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		
		<!-- Bootstrap Colorpicker CSS -->
		<link href="vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css"/>
		
		<!-- select2 CSS -->
		<link href="vendors/bower_components/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css"/>
		
		<!-- switchery CSS -->
		<link href="vendors/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" type="text/css"/>
		
		<!-- bootstrap-select CSS -->
		<link href="vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>
		
		<!-- bootstrap-tagsinput CSS -->
		<link href="vendors/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" type="text/css"/>
		
		<!-- bootstrap-touchspin CSS -->
		<link href="vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css"/>
		
		<!-- multi-select CSS -->
		<link href="vendors/bower_components/multiselect/css/multi-select.css" rel="stylesheet" type="text/css"/>
		
		<!-- Bootstrap Switches CSS -->
		<link href="vendors/bower_components/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
		
		<!-- Bootstrap Datetimepicker CSS -->
		<link href="vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
		 
		
		
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
							<h5 class="txt-dark">User Subscription</h5>
						</div>
					
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="dashboard,php">Dashboard</a></li>
								<li class="active"><span>User Subscription</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->
					
					</div>
					<!-- /Title -->
					
					<!-- Row -->
					<div class="row">
						<div class="col-md-6">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<h6 class="txt-dark capitalize-font text-success"><i class="fa fa-reorder mr-10"></i>Package 1</h6>
									<hr class="light-grey-hr" style="margin-bottom:10px;"/>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
									<p class="text-muted"><code>Package Includes</code></p>
										<div class="form-wrap">
											<form>
												<div class="row">
												
													<div class="col-sm-12">
														<div class="checkbox checkbox-success checkbox-circle">
															<input id="checkbox-10" type="checkbox" checked="" disabled >
															<label for="checkbox-10"> User Management </label>
														</div>
														<div class="checkbox checkbox-success checkbox-circle">
															<input id="checkbox-10" type="checkbox" checked="" disabled >
															<label for="checkbox-10"> Company Management </label>
														</div>
														<div class="checkbox checkbox-success checkbox-circle">
															<input id="checkbox-10" type="checkbox" checked="" disabled >
															<label for="checkbox-10"> Vender Management </label>
														</div>
														<div class="checkbox checkbox-success checkbox-circle">
															<input id="checkbox-10" type="checkbox" checked="" disabled >
															<label for="checkbox-10"> Financial Management </label>
														</div>
														<div class="checkbox checkbox-success checkbox-circle">
															<input id="checkbox-10" type="checkbox" checked="" disabled >
															<label for="checkbox-10"> Customer Management </label>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<h6 class="txt-dark capitalize-font text-success"><i class="fa fa-briefcase mr-10"></i>Package Information</h6>
									<hr class="light-grey-hr" style="margin-bottom:10px;"/>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
											<form>
												<div class="col-md-3">
													<div class="form-group">
														<label class="control-label mb-10">Start Date</label>
														<p class="form-control-static">10/07/2017</p>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label class="control-label mb-10">End Date</label>
														<p class="form-control-static">10/10/2017</p>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label class="control-label mb-10">Remaining Days</label>
														<p class="form-control-static">80 Days</p>
													</div>
												</div>
											</form>	
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
		
		<!-- JavaScripts -->
		
		<!-- jQuery -->
		<script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		
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
		
	</body>
</html>