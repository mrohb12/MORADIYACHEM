<?php 
include('include/config.php');  
$userData = $_SESSION['earth_india@AdminUserData'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title><?php print($page); ?> | <?php print(APP_NAME); ?></title>
		
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
		
		<div class="wrapper pa-0">
			<header class="sp-header">
				<div class="sp-logo-wrap pull-left">
					<a href="index.html">
						<img class="brand-img mr-10" src="dist/img/logo.png" alt="brand"/>
						<span class="brand-text"><?php echo APP_NAME; ?></span>
					</a>
				</div>
				<div class="form-group mb-0 pull-right">
					<span class="inline-block pr-10"></span>
					<a class="inline-block btn btn-info btn-rounded btn-outline" href="dashboard.php">Countinue Login</a>
				</div>
				<div class="clearfix"></div>
			</header>
			
			<!-- Main Content -->
			<div class="page-wrapper pa-0 ma-0 auth-page">
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height">
						<div class="table-cell vertical-align-middle auth-form-wrap">
							<div class="ml-auto mr-auto no-float" style="    width: 940px;">
								<div class="row">
									<div class="col-sm-12 col-xs-12">
										<div class="mb-30">
											<h3 class="text-center txt-dark mb-10">Create Company</h3>
											<h6 class="text-center nonecase-font txt-grey">Enter your details below</h6>
										</div>	
										<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form action="#">
														<div class="form-body">
															<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Comapany Info</h6>
															<hr class="light-grey-hr"/>
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Company Name :</label>
																		<input type="text" id="firstName" class="form-control" placeholder="Enter company name.">
																		<span class="help-block" style="display:none;"> This field has error. </span> 
																	</div>
																</div>
																<!--/span-->
																<div class="col-md-6">
																	<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account-box mr-10"></i>Contact Details</h6>
																	<hr class="light-grey-hr"/>
																	<div class="form-group">
																		<label class="control-label mb-10">Telephone No. :</label>
																		<input type="text" class="form-control" placeholder="Enter telephone no.">
																	</div>
																</div>
																<!--/span-->
															</div>
															<!-- /Row -->
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Mailing Name :</label>
																		<input type="text" id="firstName" class="form-control" placeholder="Enter mailing name.">
																		<span class="help-block" style="display:none;"> This field has error. </span> 
																	</div>
																</div>
																<!--/span -->
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Mobile No. :</label>
																		<input type="text" class="form-control" placeholder="Enter mobile no.">
																	</div>
																</div>
																<!--/span-->
															</div>
															<!-- /Row -->
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Address :</label>
																		<textarea class="form-control" ></textarea>
																	</div>
																</div>
																<!--/span-->
																
																<div class="col-md-6">
																	<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account-box mr-10"></i>Financial Year Details</h6>
																	<hr class="light-grey-hr"/>
																	<div class="form-group">
																		<label class="control-label mb-10">Financial Year :</label>
																		<select class="form-control">
																			<option value="">Select Year</option>
																			<option value="">2016-17</option>
																			<option value="">2017-18</option>
																		</select>
																		<span class="help-block" style="display:none;"> This field has error. </span> 
																	</div>
																	
																</div>
																<!--/span-->
															</div>
															<!-- /Row -->
															
															<!-- /Row -->
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Country :</label>
																		<select class="form-control">
																			<option value="">Select Country</option>
																			<option value="">India</option>
																			<option value="">UK</option>
																		</select>
																		<span class="help-block" style="display:none;"> This field has error. </span> 
																	</div>
																</div>
																<!--/span-->
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">PAN No. :</label>
																		<input type="text" class="form-control" placeholder="Enter PAN No.">
																	</div>
																</div>
																<!--/span-->
															</div>
															<!-- /Row -->
															
															<!-- /Row -->
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">State :</label>
																		<select class="form-control">
																			<option value="">Select State</option>
																			<option value="">Gujarat</option>
																			<option value="">MP</option>
																		</select>
																		<span class="help-block" style="display:none;"> This field has error. </span> 
																	</div>
																</div>
																<!--/span-->
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">TIN No. :</label>
																		<input type="text" class="form-control" placeholder="Enter TIN No.">
																	</div>
																</div>
																<!--/span-->
															</div>
															<!-- /Row -->
															
															<!-- /Row -->
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">District :</label>
																		<select class="form-control">
																			<option value="">Select District</option>
																			<option value="">Junagadh</option>
																			<option value="">Jamnagar</option>
																		</select>
																		<span class="help-block" style="display:none;"> This field has error. </span> 
																	</div>
																</div>
																<!--/span-->
																<div class="col-md-6"></div>
																<!--/span-->
															</div>
															<!-- /Row -->
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">City :</label>
																		<select class="form-control">
																			<option value="">Select City</option>
																			<option value="">Junagadh</option>
																			<option value="">Jamnagar</option>
																		</select>
																		<span class="help-block" style="display:none;"> This field has error. </span> 
																	</div>
																</div>
																<!--/span-->
																<div class="col-md-6"></div>
																<!--/span-->
															</div>
															
															<!-- /Row -->
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Pincode :</label>
																		<input type="text" id="firstName" class="form-control" placeholder="Enter pincode.">
																		<span class="help-block" style="display:none;"> This field has error. </span> 
																	</div>
																</div>
																<!--/span-->
																<div class="col-md-6"></div>
																<!--/span-->
															</div>
															
															
														</div>
														<div class="form-actions mt-10">
															<button type="submit" class="btn btn-success  mr-10">Create</button>
															<button type="button" class="btn btn-default">Back</button>
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
						</div>
					</div>
					<!-- /Row -->	
				</div>
				
			</div>
			<!-- /Main Content -->
		
		</div>
		<!-- /#wrapper -->
		
		<!-- JavaScript -->
		
		<!-- jQuery -->
		<script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
		
		<!-- Slimscroll JavaScript -->
		<script src="dist/js/jquery.slimscroll.js"></script>
		
		<!-- Init JavaScript -->
		<script src="dist/js/init.js"></script>
	</body>
</html>
