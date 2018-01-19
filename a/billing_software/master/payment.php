<?php 
include("addpayment.class.php"); 
if(!isset($_SESSION['BLData']) && empty($_SESSION['BLData']))
{
	$_SESSION['error'] = 'Invalid Request';
	header("location:index.php");
	exit;
}

$userInfo = $_SESSION['BLData'];


$arrPaymenInfo =array();
$qrySel = mysqli_query($conn,"SELECT * FROM payment WHERE (endeffdate IS NULL OR endeffdate ='NULL' OR endeffdate='0000-00-00')");

if(DEBUG){
	print($qrySel);
}

$check = mysqli_num_rows($qrySel);
if($check > 0) {
	while ($row = mysqli_fetch_array($qrySel))  
	{
		$arrPaymenInfo[] = $row;	
	}
} 

$qrySel = mysqli_query($conn,"SELECT id,name FROM dealer WHERE (endeffdate IS NULL OR endeffdate ='NULL' OR endeffdate='0000-00-00')");

if(DEBUG){
	print($qrySel);
}

$arrDealer = array();
$check = mysqli_num_rows($qrySel);
if($check > 0) {
	while ($row = mysqli_fetch_array($qrySel))  
	{
		$arrDealer[$row['id']] = $row['name'];	
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
        <title>Payment | <?php print(APP_NAME);?></title>

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
            <!-- ========== Left Sidebar End ========== -->
     
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">View Payment</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li><a href="dashboarad.php">Dashboard</a></li>
										 <li><a href="javascript:;">Dealer Payment</a></li>
                                        <li class="active">View Payment</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>

                        <!-- end row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>View Payment</b></h4>
									<?php 
											if(isset($_REQUEST['required']) && !empty($_REQUEST['required'])){
												if($_REQUEST['required'] == 'DSC') {?>
													 <div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
														<i class="mdi mdi-check-all"></i>
														Record deleted successfully.</div><?php 
												}
												elseif($_REQUEST['required'] == 'SOUS') {?>
													 <div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
														<i class="mdi mdi-check-all"></i>
														Sortorder updated successfully.</div><?php 
												}
											}

											?>

										<table id="datatable-responsive" class="table table-striped  table-colored table-info dt-responsive nowrap" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th>ID</th>
													<th>Dealer Name</th>
													<th>Amount(<i class='fa fa-inr'></i>)</th>
													<th>Paymen Date</th>
													<th>Paymen Mode</th>
													<th>Action</th>
												</tr>
											</thead>

                                        <tbody><?php 

											if(count($arrPaymenInfo)> 0){
												$count = 1;
												foreach($arrPaymenInfo as $key => $value){
													?>
													<tr>
														<td><?php print($count);?></td>
														<td><?php print($arrDealer[$value['dealer_id']]);?></td>
														<td><i class='fa fa-inr'></i><?php print($value['amount']);?></td>
														<td><?php print(date('d-m-Y',strtotime($value['date'])));?></td>
														<td><?php print($value['mode']);?></td>
													   <td class="actions">
															<a href="add-payment.php?doAction=editPayment&paymentId=<?php print($value['id']);?>" class="on-default edit-row" title="Edit"> <i class="fa fa-pencil"></i> </a>
															<a href="javascript:;" onClick="javascript:deleteRecord(<?php print($value['id']);?>);" class="on-default remove-row active" title="Delete"> <i class="fa fa-trash-o"></i> </a>
														</td>
													</tr><?php 
													$count++;
												}
											}?>
                                        </tbody>
                                    </table>
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
        </script>
        <!-- jQuery  -->
    </body>
</html>
<script>


function deleteRecord(paymentId){

	if (window.confirm('Are you sure,You want to delete this record?'))
	{
		window.location.href = 'addpayment.class.php?doAction=deletePayment&paymentId= '+paymentId;
	}
	else
	{
		return false;
	}
}

</script>