<?php include('include/config.php');  
//	echo $_SESSION['earth_india@AdminUserData']['id'] ; exit;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title><?php echo $page; ?> - <?php echo APP_NAME; ?></title>
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	
	<!-- Morris Charts CSS -->
    <link href="vendors/bower_components/morris.js/morris.css" rel="stylesheet" type="text/css"/>
    
    <!-- bootstrap-select CSS -->
		<link href="vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>
        
	<!-- Data table CSS -->
	<link href="vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	
	<link href="vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
	
	<!-- select2 CSS -->
	<link href="vendors/bower_components/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css"/>
		
	<!-- Custom CSS -->
	<link href="dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>



	<!-- Preloader -->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!-- /Preloader -->
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
				
				<!-- Row -->
				<div class="row">
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                       <div class="panel panel-default card-view panel-refresh">
							<div class="refresh-container">
								<div class="la-anim-1"></div>
							</div>
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Visit by Traffic Types</h6>
								</div>
								<div class="pull-right">
									<a href="#" class="pull-left inline-block refresh mr-15">
										<i class="zmdi zmdi-replay"></i>
									</a>
									<div class="pull-left inline-block dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="zmdi zmdi-more-vert"></i></a>
										<ul class="dropdown-menu bullet dropdown-menu-right"  role="menu">
											<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-reply" aria-hidden="true"></i>Devices</a></li>
											<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-share" aria-hidden="true"></i>General</a></li>
											<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-trash" aria-hidden="true"></i>Referral</a></li>
										</ul>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div>
										<canvas id="chart_6" height="191"></canvas>
									</div>	
									<hr class="light-grey-hr row mt-10 mb-15"/>
									<div class="label-chatrs">
										<div class="">
											<span class="clabels clabels-lg inline-block bg-blue mr-10 pull-left"></span>
											<span class="clabels-text font-12 inline-block txt-dark capitalize-font pull-left"><span class="block font-15 weight-500 mb-5">44.46% organic</span><span class="block txt-grey">356 visits</span></span>
											<div id="sparkline_1" class="pull-right" style="width: 100px; overflow: hidden; margin: 0px auto;"></div>
											<div class="clearfix"></div>
										</div>
									</div>
									<hr class="light-grey-hr row mt-10 mb-15"/>
									<div class="label-chatrs">
										<div class="">
											<span class="clabels clabels-lg inline-block bg-green mr-10 pull-left"></span>
											<span class="clabels-text font-12 inline-block txt-dark capitalize-font pull-left"><span class="block font-15 weight-500 mb-5">5.54% Refrral</span><span class="block txt-grey">36 visits</span></span>
											<div id="sparkline_2" class="pull-right" style="width: 100px; overflow: hidden; margin: 0px auto;"></div>
											<div class="clearfix"></div>
										</div>
									</div>
									<hr class="light-grey-hr row mt-10 mb-15"/>
									<div class="label-chatrs">
										<div class="">
											<span class="clabels clabels-lg inline-block bg-yellow mr-10 pull-left"></span>
											<span class="clabels-text font-12 inline-block txt-dark capitalize-font pull-left"><span class="block font-15 weight-500 mb-5">50% Other</span><span class="block txt-grey">245 visits</span></span>
											<div id="sparkline_3" class="pull-right" style="width: 100px; overflow: hidden; margin: 0px auto;"></div>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>	
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view">
							<div class="panel-wrapper collapse in">
                                <div class="panel-body sm-data-box-1">
									<span class="uppercase-font weight-500 font-14 block text-center txt-dark">customer satisfaction</span>	
									<div class="cus-sat-stat weight-500 txt-success text-center mt-5">
										<span class="counter-anim">93.13</span><span>%</span>
									</div>
									<div class="progress-anim mt-20">
										<div class="progress">
											<div class="progress-bar progress-bar-success wow animated progress-animated" role="progressbar" aria-valuenow="93.12" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
									<ul class="flex-stat mt-5">
										<li>
											<span class="block">Previous</span>
											<span class="block txt-dark weight-500 font-15">79.82</span>
										</li>
										<li>
											<span class="block">% Change</span>
											<span class="block txt-dark weight-500 font-15">+14.29</span>
										</li>
										<li>
											<span class="block">Trend</span>
											<span class="block">
												<i class="zmdi zmdi-trending-up txt-success font-20"></i>
											</span>
										</li>
									</ul>
								</div>
                            </div>
                        </div>
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">browser stats</h6>
								</div>
								<div class="pull-right">
									<a href="#" class="pull-left inline-block mr-15">
										<i class="zmdi zmdi-download"></i>
									</a>
									<a href="#" class="pull-left inline-block close-panel" data-effect="fadeOut">
										<i class="zmdi zmdi-close"></i>
									</a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div>
										<span class="pull-left inline-block capitalize-font txt-dark">
											google chrome
										</span>
										<span class="label label-warning pull-right">50%</span>
										<div class="clearfix"></div>
										<hr class="light-grey-hr row mt-10 mb-10"/>
										<span class="pull-left inline-block capitalize-font txt-dark">
											mozila firefox
										</span>
										<span class="label label-danger pull-right">10%</span>
										<div class="clearfix"></div>
										<hr class="light-grey-hr row mt-10 mb-10"/>
										<span class="pull-left inline-block capitalize-font txt-dark">
											Internet explorer
										</span>
										<span class="label label-success pull-right">30%</span>
										<div class="clearfix"></div>
										<hr class="light-grey-hr row mt-10 mb-10"/>
										<span class="pull-left inline-block capitalize-font txt-dark">
											safari
										</span>
										<span class="label label-primary pull-right">10%</span>
										<div class="clearfix"></div>
									</div>
								</div>	
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">user statistics</h6>
								</div>
								<div class="pull-right">
									<span class="no-margin-switcher">
										<input type="checkbox" id="morris_switch"  class="js-switch" data-color="#ea6c41" data-secondary-color="#177ec1" data-size="small"/>	
									</span>	
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
                                <div class="panel-body">
									<div id="morris_extra_line_chart" class="morris-chart" style="height:293px;"></div>
									<ul class="flex-stat mt-40">
										<li>
											<span class="block">Weekly Users</span>
											<span class="block txt-dark weight-500 font-18"><span class="counter-anim">3,24,777</span></span>
										</li>
										<li>
											<span class="block">Monthly Users</span>
											<span class="block txt-dark weight-500 font-18"><span class="counter-anim">1,23,432</span></span>
										</li>
										<li>
											<span class="block">Trend</span>
											<span class="block">
												<i class="zmdi zmdi-trending-up txt-success font-24"></i>
											</span>
										</li>
									</ul>
								</div>
							</div>
                        </div>
                    </div>
				</div>
				<!-- /Row -->
				
				<!-- Row -->
				<div class="row">
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-red">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-light block counter"><span class="counter-anim">914,001</span></span>
													<span class="weight-500 uppercase-font txt-light block font-13">visits</span>
												</div>
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
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-yellow">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-light block counter"><span class="counter-anim">46.41</span>%</span>
													<span class="weight-500 uppercase-font txt-light block">bounce rate</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="zmdi zmdi-redo txt-light data-right-rep-icon"></i>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-green">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-light block counter"><span class="counter-anim">4,054,876</span></span>
													<span class="weight-500 uppercase-font txt-light block">pageviews</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="zmdi zmdi-file txt-light data-right-rep-icon"></i>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-blue">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">

													<span class="txt-light block counter"><span class="counter-anim">46.43</span>%</span>
													<span class="weight-500 uppercase-font txt-light block">growth rate</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 pt-25  data-wrap-right">
													<div id="sparkline_4" style="width: 100px; overflow: hidden; margin: 0px auto;"></div>
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
				
				<!-- Row -->
				<div class="row">
					<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">
						<div class="panel panel-default card-view panel-refresh">
							<div class="refresh-container">
								<div class="la-anim-1"></div>
							</div>
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">social campaigns</h6>
								</div>
								<div class="pull-right">
									<a href="#" class="pull-left inline-block refresh mr-15">
										<i class="zmdi zmdi-replay"></i>
									</a>
									<a href="#" class="pull-left inline-block full-screen mr-15">
										<i class="zmdi zmdi-fullscreen"></i>
									</a>
									<div class="pull-left inline-block dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="zmdi zmdi-more-vert"></i></a>
										<ul class="dropdown-menu bullet dropdown-menu-right"  role="menu">
											<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-reply" aria-hidden="true"></i>Edit</a></li>
											<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-share" aria-hidden="true"></i>Delete</a></li>
											<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-trash" aria-hidden="true"></i>New</a></li>
										</ul>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body row pa-0">
									<div class="table-wrap">
										<div class="table-responsive">
											<table class="table table-hover mb-0">
												<thead>
													<tr>
														<th>Campaign</th>
														<th>Client</th>
														<th>Changes</th>
														<th>Budget</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><span class="txt-dark weight-500">Facebook</span></td>
														<td>Beavis</td>
														<td><span class="txt-success"><i class="zmdi zmdi-caret-up mr-10 font-20"></i><span>2.43%</span></span></td>
														<td>
															<span class="txt-dark weight-500">$1478</span>
														</td>
														<td>
															<span class="label label-primary">Active</span>
														</td>
													</tr>
													<tr>
														<td><span class="txt-dark weight-500">Youtube</span></td>
														<td>Felix</td>
														<td><span class="txt-success"><i class="zmdi zmdi-caret-up mr-10 font-20"></i><span>1.43%</span></span></td>
														<td>
															<span class="txt-dark weight-500">$951</span>
														</td>
														<td>
															<span class="label label-danger">Closed</span>
														</td>
													</tr>
													<tr>
														<td><span class="txt-dark weight-500">Twitter</span></td>
														<td>Cannibus</td>
														<td><span class="txt-danger"><i class="zmdi zmdi-caret-down mr-10 font-20"></i><span>-8.43%</span></span></td>
														<td>
															<span class="txt-dark weight-500">$632</span>
														</td>
														<td>
															<span class="label label-default">Hold</span>
														</td>
													</tr>
													<tr>
														<td><span class="txt-dark weight-500">Spotify</span></td>
														<td>Neosoft</td>
														<td><span class="txt-success"><i class="zmdi zmdi-caret-up mr-10 font-20"></i><span>7.43%</span></span></td>
														<td>
															<span class="txt-dark weight-500">$325</span>
														</td>
														<td>
															<span class="label label-default">Hold</span>
														</td>
													</tr>
													<tr>
														<td><span class="txt-dark weight-500">Instagram</span></td>
														<td>Hencework</td>
														<td><span class="txt-success"><i class="zmdi zmdi-caret-up mr-10 font-20"></i><span>9.43%</span></span></td>
														<td>
															<span class="txt-dark weight-500">$258</span>
														</td>
														<td>
															<span class="label label-primary">Active</span>
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
					<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12">
						<div class="panel panel-default card-view panel-refresh">
							<div class="refresh-container">
								<div class="la-anim-1"></div>
							</div>
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Advertising & Promotions</h6>
								</div>
								<div class="pull-right">
									<a href="#" class="pull-left inline-block refresh mr-15">
										<i class="zmdi zmdi-replay"></i>
									</a>
									<div class="pull-left inline-block dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="zmdi zmdi-more-vert"></i></a>
										<ul class="dropdown-menu bullet dropdown-menu-right"  role="menu">
											<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-reply" aria-hidden="true"></i>option 1</a></li>
											<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-share" aria-hidden="true"></i>option 2</a></li>
											<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-trash" aria-hidden="true"></i>option 3</a></li>
										</ul>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div>
										<canvas id="chart_2" height="253"></canvas>
									</div>	
									<div class="label-chatrs mt-30">
										<div class="inline-block mr-15">
											<span class="clabels inline-block bg-yellow mr-5"></span>
											<span class="clabels-text font-12 inline-block txt-dark capitalize-font">Active</span>
										</div>
										<div class="inline-block mr-15">
											<span class="clabels inline-block bg-red mr-5"></span>
											<span class="clabels-text font-12 inline-block txt-dark capitalize-font">Closed</span>
										</div>	
										<div class="inline-block">
											<span class="clabels inline-block bg-green mr-5"></span>
											<span class="clabels-text font-12 inline-block txt-dark capitalize-font">Hold</span>
										</div>											
									</div>
								</div>
							</div>	
						</div>	
					</div>	
				</div>	
				<!-- Row -->
			</div>
			
			<!-- Footer -->
			<?php include("include/footer-text.php");?>
			<!-- /Footer -->
            
			<div id="panel-modal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;" >
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header" style="background-color: #ea6c41;">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color:#FFFFFF">×</button>
							<h5 class="modal-title" id="myLargeModalLabel" style="color:#FFFFFF;">Create Company</h5>
						</div>
						<div class="modal-body">
							<h5 class="mb-15" id="txtLabel">Select Company</h5>
							<div class="form-wrap mt-40">
								<form>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group" id="lsCompanyDiv" style="">
												<select class="selectpicker" name="lsCompany" id="lsCompany" data-style="form-control btn-default btn-outline" required>
													<option value="">Select Company</option>
													<option value="">Company Name 1</option>
													<option value="">Company Name 2</option>																
												</select>
												<label class="control-label mb-10"></label>
											</div>
											<div class="form-group" id="txtCompanyDiv" style="display:none;">
												<input type="text" class="form-control" name="txtCompany" id="txtCompany" data-style="form-control btn-default btn-outline" placeholder="Enter Company Name." required>
												<label class="control-label mb-10"></label>
											</div>												
										</div>
											
										
									</div>
								</form>
							</div>
						</div>
						<div class="modal-footer">
							<a href="javascript:;" onClick="javascript: createNewCompany();" class="btn btn-primary text-left pull-left">Create Company</a>
							<button type="button" class="btn btn-danger text-left" data-dismiss="modal">Submit</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
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
    
	<!-- Data table JavaScript -->
	<script src="vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	
	<!-- Slimscroll JavaScript -->
	<script src="dist/js/jquery.slimscroll.js"></script>
	
	<!-- simpleWeather JavaScript -->
	<script src="vendors/bower_components/moment/min/moment.min.js"></script>
	<script src="vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js"></script>
	<script src="dist/js/simpleweather-data.js"></script>
	<!-- Progressbar Animation JavaScript -->
	<script src="vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="vendors/bower_components/jquery.counterup/jquery.counterup.min.js"></script>

	<!-- Fancy Dropdown JS -->
	<script src="dist/js/dropdown-bootstrap-extended.js"></script>
	
	<!-- Sparkline JavaScript -->
	<script src="vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>
	
	<!-- Owl JavaScript -->
	<script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
	
	<!-- ChartJS JavaScript -->
	<script src="vendors/chart.js/Chart.min.js"></script>
	
	<!-- Morris Charts JavaScript -->
    <script src="vendors/bower_components/raphael/raphael.min.js"></script>
    <script src="vendors/bower_components/morris.js/morris.min.js"></script>
    <script src="vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
	
	<!-- Switchery JavaScript -->
	<script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>
	
    <!-- Select2 JavaScript -->
		<script src="vendors/bower_components/select2/dist/js/select2.full.min.js"></script>
		
    <!-- Bootstrap Select JavaScript -->
		<script src="vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	
	<!-- Init JavaScript -->
	<script src="dist/js/init.js"></script>
	<script src="dist/js/dashboard-data.js"></script>
    
	<script>
	<?php
	if(isset($_SESSION['earth_india@AdminUserData']['id'])){
		//$totalSchool = getTotalNoOfSchoolOfCurrentUser($userInfo['id']);
		$totalSchool = 10;
		if($totalSchool > 1){
			if(isset($_SESSION['earth_india@AdminUserData']['id'])){
				?>jQuery( document ).ready(function() {
					jQuery("#selectSchool").trigger('click');
				});<?php
			}
		}
		
	}
	?>
	</script>
	<script>
	function createNewCompany(){
		if(document.getElementById("txtCompanyDiv").style.display == "none"){
			document.getElementById("txtCompanyDiv").style.display = "";	
			document.getElementById("lsCompanyDiv").style.display = "none";	
			document.getElementById("txtLabel").innerHTML = "Enter Company Name";
		}
		else{
			document.getElementById("txtCompanyDiv").style.display = "none";	
			document.getElementById("lsCompanyDiv").style.display = "";	
			document.getElementById("txtLabel").innerHTML = "Select Company";
		}
	}
	</script>
	<?php include("include/footer-js.php");?>
</body>

</html>
