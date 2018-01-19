<?php 
include("addpayment.class.php"); 
if(!isset($_SESSION['BLData']) && empty($_SESSION['BLData']))
{
	$_SESSION['error'] = 'Invalid Request';
	header("Location:index.php");
}

$userInfo = $_SESSION['BLData'];
$paymentId = '';
$dealerId = '';
$txtAmount = '';
$dtPaymentDate = date('m/d/Y');
$txtPaymentMode = '';
$taRemark = '';

$status = 1;
$action = "Add";
$doAction = "addPayment";
$errMsg = "Added";

if(isset($_REQUEST['doAction']) && $_REQUEST['doAction'] == 'editPayment'){
	$action = "Update";
	$doAction = "updatePayment";
	$errMsg = "Updated";
	
	$paymentId = $_REQUEST['paymentId'];
	$qrySel = mysqli_query($conn,"SELECT * FROM payment WHERE id='".$paymentId."'");
	if(DEBUG){
		print($qrySel);
	}
	$check = mysqli_num_rows($qrySel);
	if($check > 0) 
	{
		$row = mysqli_fetch_array($qrySel);
		if(DEBUG){
			print("<pre>Page Data");
			print_r($row);
			print("</pre>");
		}
		$paymentId = $row['id'];
		$dealerId = $row['dealer_id'];
		$txtAmount = $row['amount'];
		$dtPaymentDate = date('m/d/Y',strtotime($row['date']));
		
		$txtPaymentMode = $row['mode'];
		$taRemark = $row['remark'];
	}
}	

$qrySel = mysqli_query($conn,"SELECT id,name FROM dealer WHERE (endeffdate IS NULL OR endeffdate ='NULL' OR endeffdate='0000-00-00')");

if(DEBUG){
	print($qrySel);
}

$arrDealers = array();
$check = mysqli_num_rows($qrySel);
if($check > 0) {
	while ($row = mysqli_fetch_array($qrySel))  
	{
		$arrDealers[$row['id']] = $row['name'];	
	}
}
	
?>
<!DOCTYPE html>
<html>

       <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Sarman Ranavaya">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.png">

        <!-- App title -->
        <title><?php print($action);?> Payment | <?php print(APP_NAME);?></title>

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

       	<link href="plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
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
                                    <h4 class="page-title"><?php print($action);?> Payment</h4>
                                    <ol class="breadcrumb p-0 m-0">
										<li><a href="dashboarad.php">Dashboard</a></li>
										 <li><a href="javascript:;">Dealer Payment</a></li>
                                        <li class="active">
                                            <?php print($action);?> Payment
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
                                            <h4 class="header-title m-t-0"><?php print($action);?> Payment</h4>
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
														Record <?php print($errMsg);?> successfully.</div><?php 

												}

												elseif($_REQUEST['required'] == 'NSC' OR $_REQUEST['required'] == 'NUSC') {?>
													 <div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
														<i class="mdi mdi-block-helper"></i>
														Record Not <?php print($errMsg);?> successfully.
													</div><?php 
												}
											}
											?>
											<div class="p-20">
												<form id="frmPayment" name="frmPayment" method="POST" onSubmit="javascript:return submitFrmPayment(this.form);" action="addpayment.class.php?doAction=<?php print($doAction);?>" >
													<div class="form-group row" id="divlsDealer">
														<label class="col-sm-3 form-control-label mrg9Top" for="fullname">Select Dealer Name<span class="text-danger">*</span> :</label>
														<div class="col-sm-7">
															 <select id="lsDealer" class="form-control select2" name="lsDealer">
																 <option value="">Select Dealer</option><?php 
																 	foreach($arrDealers as $key => $value){
																	?><option value="<?php print($key);?>" 
																	<?php if($dealerId ==  $key ){
																		?> selected="selected" <?php 
																	}?>>
																	<?php print($value);?></option><?php
																}
																?>
															</select>
															<ul class="parsley-errors-list filled" id="errDealerName" style="display:none"><li class="parsley-required">Please select dealer name.</li></ul>
														</div>
													</div>
													<div class="form-group row" id="divAmount">
														<label class="col-sm-3 form-control-label mrg9Top" for="fullname">Amount (&#8377;)<span class="text-danger">*</span> :</label>
														<div class="col-sm-7">
															<input type="text" class="form-control" name="txtAmount" id="txtAmount" placeholder="Enter Amount" value="<?php print($txtAmount);?>">
															<ul class="parsley-errors-list filled" id="errAmount" style="display:none"><li class="parsley-required">Please enter amount.</li></ul>
														</div>
													</div>
													<div class="form-group row" id="divPancard">
														<label class="col-sm-3 form-control-label mrg9Top" for="fullname">Date <span class="text-danger">*</span> :</label>
														 <div class="col-sm-7">
															<div class="input-group">
																<input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose1" name="dtPaymentDate" required="" value="<?php print($dtPaymentDate); ?>">
																<span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
															</div><!-- input-group -->
														</div>	
													</div>
													<div class="form-group row" id="divPaymenMode">
														<label class="col-sm-3 form-control-label mrg9Top" for="fullname">Payment Mode<span class="text-danger">*</span> :</label>
														<div class="col-sm-7">
															<input type="text" class="form-control" name="txtPaymentMode" id="txtPaymentMode" onchange="" placeholder="Enter Paymen Mode" value="<?php print($txtPaymentMode);?>">
															<ul class="parsley-errors-list filled" id="errPaymenMode" style="display:none"><li class="parsley-required">Please enter payment mode.</li></ul>
														</div>
													</div>
													<div class="form-group row" id="divRemark">
														<label class="col-sm-3 form-control-label mrg9Top" for="fullname">Remark :</label>
														<div class="col-sm-7">
															<textarea class="form-control" name="taRemark" id="taRemark" placeholder="Enter Remark" ><?php print($taRemark);?></textarea>
														</div>
													</div>
																										
													<div class="form-group row text-center" style="margin-top:30px;">
														<input type="hidden" name="paymentId" value="<?php print($paymentId);?>" id="paymentId"/>
														<input type="submit" class="btn btn-success" value="<?php print($action);?> Payment" title="<?php print($action);?> Payment">
														<a href="payment.php" class="btn btn-primary btn-bordered waves-effect w-md waves-light" title="Back"><i class="mdi mdi-arrow-left-bold-circle-outline"></i> <span>Back</span> </a>
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
        <script src="plugins/datatables/responsive.bootstrap.min.js"></script>
		<script src="assets/js/fieldvalidation.js"></script>			
		<script src="plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
     	<script src="plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script>
     	<script src="plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
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
			
			function phonenumber(inputtxt)  
			{  
				var phoneno = /^\d{10}$/;  
				if((inputtxt.value.match(phoneno)))  
				{  
				  return true;  
				}  
				else  
				{  
					alert("Invalid Mobile no.");  
					return false;  
				}  
			}  
			
			//Joining Date Date-Control
			jQuery('#datepicker-autoclose1').datepicker({
					autoclose: true,
					todayHighlight: true
			});
        </script>
        <!-- jQuery  -->
    </body>
</html>