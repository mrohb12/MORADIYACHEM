<?php include('include/config.php');  
$userData = $_SESSION['earth_india@AdminUserData'];
?>


<?php
$qty_type='';
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
		
		<!-- vector map CSS -->
		<link href="vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
		
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
							<h5 class="txt-dark">Add Product</h5>
						</div>
					
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="dashboard.php">Dashboard</a></li>
								<li><a href="javascript:;"><span>Tax Product Management</span></a></li>
								<li class="active"><span>Add Product</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->
					
					</div>
					<!-- /Title -->
					
					<!-- Row -->
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default card-view">
								<!--<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">with two columns horizontal form</h6>
									</div>
									<div class="clearfix"></div>
								</div> -->
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-md-12">
												<div class="form-wrap">
													<form action="#" class="form-horizontal">
														<div class="form-body">
															<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Product Info</h6>
															<hr class="light-grey-hr"/>
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label col-md-3">Product Name :</label>
																		<div class="col-md-9">
																			<input type="text" class="form-control" placeholder="">
																		</div>
																	</div>
																</div>
																<!--/span-->
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label col-md-3">SGST :</label>
																		<div class="col-md-9">
																			<input type="text" class="form-control" placeholder="">
																		</div>
																	</div>
																</div>
																<!--/span-->
																
															</div>
															<!-- /Row -->
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label col-md-3">HSN Code :</label>
																		<div class="col-md-9">
																			<input type="text" class="form-control" placeholder="">
																		</div>
																	</div>
																</div>
																<!--/span-->
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label col-md-3">CGST :</label>
																		<div class="col-md-9">
																			<input type="text" class="form-control" placeholder="">
																		</div>
																	</div>
																</div>
																<!--/span-->
															</div>
															<!-- /Row -->
															
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label col-md-3">Unit :</label>
																		<div class="col-md-9">
																			
                                                        <select name="qty_type" required class="form-control" >
                                                        <option value="" >-----Select Unit-----</option>
                                                        <?php foreach($product_material_qty_type_array as $key => $val){?>
                                                        <option <?php echo ($key==$qty_type)?"selected":""; ?> value="<?php echo $key; ?>" ><?php echo  $val ?> </option>
                                                        <?php } ?>    
                                                        </select>  
                                                                            
																		</div>
																	</div>
																</div>
																<!--/span-->
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label col-md-3">IGST :</label>
																		<div class="col-md-9">
																			<input type="text" class="form-control" placeholder="">
																		</div>
																	</div>
																</div>
																<!--/span-->
															</div>
															<!-- /Row -->
															
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label col-md-3">Status :</label>
																		<div class="col-md-9">
																			<input type="checkbox" checked class="js-switch js-switch-1" data-color="#469408"/>
																		</div>
																	</div>
																</div>
																<!--/span-->
															</div>
															<!-- /Row -->
															
														</div>
														<div class="form-actions mt-10 pull-right">
															<div class="row">
																<div class="col-md-12">
																	<div class="row">
																		<div class="col-md-12">
																			<button type="submit" class="btn btn-success  mr-10" title="Add Product">Add Product</button>
																			<a href="view-tax-product.php" class="btn btn-default" title="Back">Back</a>
																		</div>
																	</div>
																</div>
																
															</div>
														</div>
													</form>
												</div>
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
			navigationSubMenu("add_vendor");
		</script>
	</body>
</html>
