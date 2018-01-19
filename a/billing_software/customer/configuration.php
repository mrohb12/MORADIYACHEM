<?php include('include/config.php');  
$userData = $_SESSION['earth_india@AdminUserData'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title><?php print($page); ?> | <?php print(APP_NAME); ?></title>
	<meta name="author" content="hencework"/>
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	
	<!-- Morris Charts CSS -->
    <link href="vendors/bower_components/morris.js/morris.css" rel="stylesheet" type="text/css"/>
	
	<!-- vector map CSS -->
	<link href="vendors/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" type="text/css"/>
	
	<!-- Calendar CSS -->
	<link href="vendors/bower_components/fullcalendar/dist/fullcalendar.css" rel="stylesheet" type="text/css"/>
	
	<!-- bootstrap-select CSS -->
	<link href="vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>	
	
	<!-- switchery CSS -->
	<link href="vendors/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" type="text/css"/>
		
	<!-- Data table CSS -->
	<link href="vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	
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
			<div class="container-fluid pt-25">
						
				<div class="row">
					<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-red">
										<div class="container-fluid">
											<div class="row">
												<a href="view-company.php" title="View Company">
													<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
														<span class="txt-light block counter">Company Management</span>
													</div>
												</a>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="zmdi zmdi-male-female txt-light data-right-rep-icon"></i>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-yellow">
										<div class="container-fluid">
											<div class="row">
												<a href="view-financial-year.php" title="Financial Year Management">
													<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
														<span class="txt-light block counter">Financial Year Management</span>
													</div>
												</a>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="pe-7s-cash txt-light data-right-rep-icon"></i>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-green">
										<div class="container-fluid">
											<div class="row">
												<a href="view-tax-product.php" title="Tax Product Master">
													<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
														<span class="txt-light block counter">Tax Product Master</span>
													</div>
												</a>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="fa fa-product-hunt txt-light data-right-rep-icon"></i>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-blue">
										<div class="container-fluid">
											<div class="row">
												<a href="view-tax-service.php" title="Tax Service Master">
													<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
														<span class="txt-light block counter">Tax Service Master</span>
												
													</div>
												</a>
												<div class="col-xs-6 text-center  pl-0 pr-0 pt-25  data-wrap-right">
													<i class="fa fa-inr txt-light data-right-rep-icon"></i>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-blue">
										<div class="container-fluid">
											<div class="row">
												<a href="view-vendor.php">
													<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
														<span class="txt-light block counter">Vendor Management</span>
													</div>
												</a>
												<div class="col-xs-6 text-center  pl-0 pr-0 pt-25  data-wrap-right">
													<i class="glyphicon glyphicon-king txt-light data-right-rep-icon"></i>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-blue">
										<div class="container-fluid">
											<div class="row">
												<a href="view-customer.php">
													<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
														<span class="txt-light block counter">Customer Management</span>
													</div>
												</a>
												<div class="col-xs-6 text-center  pl-0 pr-0 pt-25  data-wrap-right">
													<i class="glyphicon glyphicon-user txt-light data-right-rep-icon"></i>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
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
    
	<!-- Vector Maps JavaScript -->
    <script src="vendors/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="vendors/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="dist/js/vectormap-data.js"></script>
	
	<!-- Calender JavaScripts -->
	<script src="vendors/bower_components/moment/min/moment.min.js"></script>
	<script src="vendors/jquery-ui.min.js"></script>
	<script src="vendors/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
	<script src="dist/js/fullcalendar-data.js"></script>
	
	<!-- Progressbar Animation JavaScript -->
	<script src="vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="vendors/bower_components/jquery.counterup/jquery.counterup.min.js"></script>
	
	<!-- Data table JavaScript -->
	<script src="vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	
	<!-- Slimscroll JavaScript -->
	<script src="dist/js/jquery.slimscroll.js"></script>
	
	<!-- ChartJS JavaScript -->
	<script src="vendors/chart.js/Chart.min.js"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="dist/js/dropdown-bootstrap-extended.js"></script>
	
	<!-- Sparkline JavaScript -->
	<script src="vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>
	
	<script src="vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
	
	<!-- Morris Charts JavaScript -->
    <script src="vendors/bower_components/raphael/raphael.min.js"></script>
    <script src="vendors/bower_components/morris.js/morris.min.js"></script>
    <script src="dist/js/morris-data.js"></script>
	
	<!-- Owl JavaScript -->
	<script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
	
	<!-- Bootstrap Select JavaScript -->
	<script src="vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

	<!-- Switchery JavaScript -->
	<script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>
	
	<!-- Init JavaScript -->
	<script src="dist/js/init.js"></script>
	<script src="dist/js/widgets-data.js"></script>
	<?php include("include/footer-js.php");?>
	
	<script>
		navigationMenu("vendor_management");
		navigationSubMenu("view_vendor");
	</script>
	
</body>

</html>
