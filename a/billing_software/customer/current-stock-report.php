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
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
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
					  <h5 class="txt-dark">Current Stock Report</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="dashboard.php">Dashboard</a></li>
						<li><a href="javascript:;"><span>Reports</span></a></li>
						<li class="active"><span>Current Stock Report</span></li>
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
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="example" class="table table-hover display  pb-30" >
												<thead>
													<tr>
														<th>Sr.No</th>
														<th>Product Name</th>
														<th>HSN Code</th>
														<th>Unit</th>
                                                        <th>Current Stock</th>
														<th>Status</th>	
														<th>Action</th>
													</tr>
												</thead>
												
												<tbody>
													<tr>
														<td>1</td>
														<td>Television</td>
														<td>HSN001</td>
														<td>Pieces</td>
                                                        <td><b>80</b></td>
														<td><div class="checkbox checkbox-success checkbox-circle">
															<input id="checkbox-10" type="checkbox" checked="" readonly>
																<label for="checkbox-10"></label>
														</div></td>
														<td>
															<button class="btn btn-info btn-icon-anim btn-square" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></button>
															
														</td>
													</tr>
													<tr>
														<td>2</td>
														<td>Washing Machine</td>
														<td>HSN002</td>
														<td>Ltr</td>
                                                        <td><b>35</b></td>                                                        
														<td><div class="checkbox checkbox-success checkbox-circle">
															<input id="checkbox-10" type="checkbox" checked="" readonly>
																<label for="checkbox-10"></label>
														</div></td>
														<td>
															<button class="btn btn-info btn-icon-anim btn-square" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></button>
														</td>
													</tr>
                                                    <tr>
														<td>3</td>
														<td>Computer</td>
														<td>HSN003</td>
														<td>Pieces</td>
                                                        <td><b>150</b></td>                                                        
														<td>
                                                        <div class="checkbox checkbox-success checkbox-circle">
															<input id="checkbox-10" type="checkbox" checked="" readonly>
																<label for="checkbox-10"></label>
														</div>
                                                        </td>
														<td>
															<button class="btn btn-info btn-icon-anim btn-square" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></button>
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
	<script src="vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="vendors/bower_components/datatables.net-buttons/js/buttons.flash.min.js"></script>
	<script src="vendors/bower_components/jszip/dist/jszip.min.js"></script>
	<script src="vendors/bower_components/pdfmake/build/pdfmake.min.js"></script>
	<script src="vendors/bower_components/pdfmake/build/vfs_fonts.js"></script>
	
	<script src="vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
	<script src="vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
	<script src="dist/js/export-table-data.js"></script>
	
	<!-- Slimscroll JavaScript -->
	<script src="dist/js/jquery.slimscroll.js"></script>

	
	<!-- Owl JavaScript -->
	<script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
	
	<!-- Switchery JavaScript -->
	<script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>
	
	
	<!-- Fancy Dropdown JS -->
	<script src="dist/js/dropdown-bootstrap-extended.js"></script>
	
	<!-- Init JavaScript -->
	<script src="dist/js/init.js"></script>
	
</body>
</html>