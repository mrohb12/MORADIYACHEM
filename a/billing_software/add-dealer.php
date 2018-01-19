<!DOCTYPE html>
 <?php include("include/config.php"); 
include("adddealer.class.php"); 
if(!isset($_SESSION['BLData']) && empty($_SESSION['BLData']))
{
	$_SESSION['error'] = 'Invalid Request';
	header('Location:index.php');
	exit;
}
$userInfo = $_SESSION['BLData'];$delaerId = '';$txtDealerName = '';$txtUsername = '';$txtPassword = '';$txtDealerEmail = '';$txtMobileNo = '';$taAddress = '';$txtCity = '';$txtPincode = '';$lsCommission ='';$status = 1;$action = "Add";$doAction = "addDealer";$errMsg = "Added";
if(isset($_REQUEST['doAction']) && $_REQUEST['doAction'] == 'editDealer'){	$action = "Update";	$doAction = "updateDealer";	$errMsg = "Updated";		$dealerId = $_REQUEST['dealerId'];	$qrySel = mysql_query("SELECT * FROM dealer WHERE id='".$dealerId."'") or die(mysql_error());	if(DEBUG){		print($qrySel);	}	$check = mysql_num_rows($qrySel);	if($check > 0) 	{		$row = mysql_fetch_array($qrySel);		if(DEBUG){			print("<pre>Page Data");			print_r($row);			print("</pre>");		}		$dealerId = $row['id'];		$txtDealerName = $row['name'];		$txtDealerEmail =  $row['email'];		$txtUsername =  $row['username'];		$txtPassword =  $row['password'];		$txtMobileNo = $row['mobileno'];		$taAddress = $row['address'];		$txtCity = $row['city'];		$txtPincode = $row['pincode'];		$lsCommission =$row['commission'];		$status = $row['status'];	}}	?>
<html>
       <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Sarman Ranavaya">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.png">
        <!-- App title -->
        <title><?php print($action);?> Dealer | <?php print(APP_NAME);?></title>
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
             <!-- Sidebar -left -->
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
                                    <h4 class="page-title"><?php print($action);?> Dealer</h4>
                                    <ol class="breadcrumb p-0 m-0">
										<li><a href="dashboarad.php">Dashboard</a></li>
										 <li><a href="javascript:;">Dealer Management</a></li>
                                        <li class="active">
                                            <?php print($action);?> Dealer
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                     <div class="row">
									  <div class="col-sm-12 col-xs-12 col-md-12">
                                            <h4 class="header-title m-t-0"><?php print($action);?> Dealer</h4>
									  </div>
									  <div class="col-sm-12 col-xs-12 col-md-12">
										<div class="col-sm-12 col-xs-12 col-md-2">&nbsp;</div>
										 <div class="col-sm-12 col-xs-12 col-md-7">
                                           <?php 
											if(isset($_REQUEST['required']) && !empty($_REQUEST['required'])){
												if($_REQUEST['required'] == 'SC' OR $_REQUEST['required'] == 'USC') {?>
													 <div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
														<i class="mdi mdi-check-all"></i>
														<strong>Well done!</strong> Record <?php print($errMsg);?> Successfully.</div><?php 
												}
												elseif($_REQUEST['required'] == 'NSC' OR $_REQUEST['required'] == 'NUSC') {?>
													 <div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
														<i class="mdi mdi-block-helper"></i>
														<strong>Oh snap!</strong> Record Not <?php print($errMsg);?> Successfully.
													</div><?php 
												}
											}
											?>
											<div class="p-20">
												<form id="frmDealer" name="frmDealer" method="POST" onSubmit="javascript:return submitFrmDealer(this.form);" action="adddealer.class.php?doAction=<?php print($doAction);?>" >
													<div class="form-group row" id="divDealerName">
														<label class="col-sm-3 form-control-label mrg9Top" for="fullname">Dealer Name<span class="text-danger">*</span> :</label>
														<div class="col-sm-7">
															<input type="text" class="form-control" name="txtDealerName" id="txtDealerName" placeholder="Enter Dealer Name" value="<?php print($txtDealerName);?>">
															<ul class="parsley-errors-list filled" id="errDealerName" style="display:none"><li class="parsley-required">Please enter dealer name.</li></ul>
														</div>
													</div>													<div class="form-group row" id="divEmail">														<label class="col-sm-3 form-control-label mrg9Top" for="fullname">Email<span class="text-danger">*</span> :</label>														<div class="col-sm-7">															<input type="email" class="form-control" name="txtDealerEmail" id="txtDealerEmail" placeholder="Enter Email Address" value="<?php print($txtDealerEmail);?>">															<ul class="parsley-errors-list filled" id="errDealerEmail" style="display:none"><li class="parsley-required">Please enter email.</li></ul>														</div>													</div>													<div class="form-group row" id="divUsername">														<label class="col-sm-3 form-control-label mrg9Top" for="fullname">Username<span class="text-danger">*</span> :</label>														<div class="col-sm-7">															<input type="text" class="form-control" name="txtUsername" id="txtUsername" placeholder="Enter username" value="<?php print($txtUsername);?>">															<ul class="parsley-errors-list filled" id="errUsername" style="display:none"><li class="parsley-required">Please enter Username.</li></ul>														</div>													</div>													<div class="form-group row" id="divPassword">														<label class="col-sm-3 form-control-label mrg9Top" for="fullname">Password<span class="text-danger">*</span> :</label>														<div class="col-sm-7">															<input type="password" class="form-control" name="txtPassword" id="txtPassword" placeholder="Enter Password" value="<?php print($txtPassword);?>">															<ul class="parsley-errors-list filled" id="errPassword" style="display:none"><li class="parsley-required">Please enter Password.</li></ul>														</div>													</div>													<div class="form-group row" id="divMobileNo">														<label class="col-sm-3 form-control-label mrg9Top" for="fullname">Mobile No<span class="text-danger">*</span> :</label>														<div class="col-sm-7">															<input type="text" class="form-control" style="width: 55%;"name="txtMobileNo" id="txtMobileNo" onchange="" placeholder="Enter Mobile No" value="<?php print($txtMobileNo);?>">															<ul class="parsley-errors-list filled" id="errMobileNo" style="display:none"><li class="parsley-required">Please enter mobile no.</li></ul>														</div>													</div>													<div class="form-group row" id="divAddress">														<label class="col-sm-3 form-control-label mrg9Top" for="fullname">Address :</label>														<div class="col-sm-7">															<textarea class="form-control" name="taAddress" id="taAddress" placeholder="Enter Address" ><?php print($txtMobileNo);?></textarea>														</div>													</div>
													 <div class="form-group row">
														<label class="col-sm-3 form-control-label " for="message">City :</label>
														 <div class="col-sm-7">
															<input type="text" class="form-control" style="width: 60%;"  name="txtCity" id="txtCity" placeholder="Enter city." value="<?php print($txtCity);?>">
														</div>
													</div>													<div class="form-group row">														<label class="col-sm-3 form-control-label " for="message">Pincode :</label>														 <div class="col-sm-7">															<input type="text" class="form-control" style="width: 32%;" name="txtPincode" id="txtPincode" placeholder="Enter Pincode." value="<?php print($txtPincode);?>">														</div>													</div>													<div class="form-group row" id="divCommision">														<label class="col-sm-3 form-control-label " for="message">Commission(%) <span class="text-danger">*</span>:</label>														 <div class="col-sm-7">															<select style="max-width: 50%;" id="lsCommission" class="form-control select2" name="lsCommission">																 <option value="">Select Commission</option><?php 																	$arrComissions = arrComissions();																	foreach($arrComissions as $key => $value){																	?><option value="<?php print($key);?>" 																	<?php if($lsCommission ==  $key ){																		?> selected="selected" <?php 																	}?>>																	<?php print($value);?></option><?php																}																?>															</select>															<ul class="parsley-errors-list filled" id="errCommission" style="display:none"><li class="parsley-required">Please select commision.</li></ul>														</div>													</div>
													 <div class="form-group row">
														<label class="col-sm-3 form-control-label " for="message">Status :</label>
														  <div class="col-sm-7">
															<input type="checkbox" id="switch5" class="statusChange" switch="bool" <?php echo ($status == 1)?"checked":""; ?> name="status"/>
															<label for="switch5" data-on-label="Active" data-off-label="Deactive"></label>
                                                        </div>
													</div>
													<div class="form-group row text-center" style="margin-top:30px;">
														<input type="hidden" name="dealerId" value="<?php print($dealerId);?>" id="dealerId"/>														<input type="hidden" name="dealerId" value="<?php print($dealerId);?>" id="dealerId"/>
														<input type="submit" class="btn btn-success" value="<?php print($action);?> Dealer" title="<?php print($action);?> Dealer">
														<a href="dealers.php" class="btn btn-primary btn-bordered waves-effect w-md waves-light" title="Back"><i class="mdi mdi-arrow-left-bold-circle-outline"></i> <span>Back</span> </a>
													</div>
												</form>
											</div>
                                        </div>
										<div class="col-sm-12 col-xs-12 col-md-2">&nbsp;</div>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        <script src="plugins/datatables/responsive.bootstrap.min.js"></script>		<script src="assets/js/fieldvalidation.js"></script>					
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
            });						function phonenumber(inputtxt)  			{  				var phoneno = /^\d{10}$/;  				if((inputtxt.value.match(phoneno)))  				{  				  return true;  				}  				else  				{  					alert("Invalid Mobile no.");  					return false;  				}  			}  
        </script>
        <!-- jQuery  -->
    </body>
</html>