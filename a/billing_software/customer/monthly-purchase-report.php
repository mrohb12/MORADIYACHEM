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
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">

	<!-- vector map CSS -->
	<link href="vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
	
		<!-- Bootstrap Datetimepicker CSS -->
	<link href="vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
	
	<!-- select2 CSS -->
	<link href="vendors/bower_components/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css"/>

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
			<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Monthly Purchase Report</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="dashboard.php">Dashboard</a></li>
						<li><a href="javascript:;"><span>Reports</span></a></li>
						<li class="active"><span>Monthly Purchase Report</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->
				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label col-md-3">From Date:</label>
												<div class="col-md-9">
													<div class='input-group date' id='datetimepicker1'>
														<input type='text' class="form-control" />
														<span class="input-group-addon">
															<span class="fa fa-calendar"></span>
														</span>
													</div>
												</div>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label col-md-3">To Date:</label>
												<div class="col-md-9">
													<div class='input-group date' id='datetimepicker2'>
														<input type='text' class="form-control" />
														<span class="input-group-addon">
															<span class="fa fa-calendar"></span>
														</span>
													</div>
												</div>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label col-md-3">Product Name:</label>
												<div class="col-md-9">
													<select class="form-control" >
														<option value="">Select Product</option>
														<option value="1">Product 1</option>
														<option value="2">Product 2</option>
													</select>
												</div>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-2">
											<div class="form-group">
												<button type="submit" class="btn btn-success  mr-10">Submit</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Row -->
				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="example" class="table table-hover display  pb-30" >
												<thead>
													<tr>
														<th>Sr.No</th>
														<th>Product Name</th>
														<th>HSN Code</th>
														<th>Unit</th>
														<th>Total Purchase</th>
														<th>Action</th>
														
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>1</td>
														<td>Product 1</td>
														<td>PRN001</td>
														<td>KG</td>
														<td>150</td>
														<td><button class="btn btn-info btn-icon-anim btn-square" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></button></td>
													</tr>
													<tr>
														<td>2</td>
														<td>Product 2</td>
														<td>PRN002</td>
														<td>KG</td>
														<td>450</td>
														<td><button class="btn btn-info btn-icon-anim btn-square" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></button></td>
													</tr>
													<tr>
														<td>3</td>
														<td>Product 3</td>
														<td>PRN003</td>
														<td>LTR</td>
														<td>50</td>
														<td><button class="btn btn-info btn-icon-anim btn-square" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></button></td>
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

    <!-- jQuery -->
	<script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>

	<!-- Moment JavaScript -->
	<script type="text/javascript" src="vendors/bower_components/moment/min/moment-with-locales.min.js"></script>
		
	<!-- Form Picker Init JavaScript -->
	<script src="dist/js/form-picker-data.js"></script>
	 
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
		
		<!-- Data table JavaScript -->
	<script src="vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="vendors/bower_components/datatables.net-buttons/js/buttons.flash.min.js"></script>
	<script src="vendors/bower_components/jszip/dist/jszip.min.js"></script>
	<script src="vendors/bower_components/pdfmake/build/pdfmake.min.js"></script>
	<script src="vendors/bower_components/pdfmake/build/vfs_fonts.js"></script>
	
	<script src="vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
	<script src="vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
	<script src="dist/js/export-table-data.js"></script>
	
	<!-- Init JavaScript -->
	<script src="dist/js/init.js"></script>
	<?php include("include/footer-js.php");?>
	<script>
		navigationMenu("reports");
		navigationSubMenu("monthly_purchase");
	</script>
	
</body>

</html>
