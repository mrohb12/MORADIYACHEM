<?php 
include_once("include/config.php");
if(!isset($_SESSION['BLData']) && empty($_SESSION['BLData']))
{
	$_SESSION['error'] = 'Invalid Request';
	header("location:index.php");
	exit;
}
$userdata = $_SESSION['BLData']; 

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Sarman Ranavaya">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.png">
        <!-- App title -->
        <title>Financial Outstanding Report | <?php print(APP_NAME); ?></title>

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
                                    <h4 class="page-title">Financial Report</h4>
                                   <ol class="breadcrumb p-0 m-0">
                                        <li><a href="dashboard.php">Dashboard</a></li>
										<li><a href="javascript:;">Dealer Management</a></li>
                                        <li class="active">Financial Outstanding Report</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        
						<div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
									<div class="row">
									  <div class="col-sm-12 col-xs-12 col-md-12">
                                    <h4 class="m-t-0 header-title"><b>Outstanding Report</b></h4>
									 <table id="datatable-responsive" class="table table-striped  table-colored table-info dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th >Dealer Name</th>
                                                <th style="text-align:right;">Total Amount(&#8377;)</th>
												<th style="text-align:right;" >Paid Amount(&#8377;)</th>
												<th style="text-align:right;" >Outstanding Amount(&#8377;)</th>
                                            </tr>
                                        </thead>
                                        <tbody> <?php 
											$query = 'SELECT * FROM dealer';
											$dealer_result = mysqli_query($conn,$query);
											$totalRecords = mysqli_num_rows($dealer_result);
											$count = 1;
											$total_project_amount = "";
											$total_paid_amount = "";
											if(mysqli_num_rows($dealer_result) > 0)
											{	
												while($row = mysqli_fetch_array($dealer_result))
												{
													$query_sub = 'SELECT users.*,packages.price as amount,dealer.commission FROM users 
															JOIN dealer ON dealer.id = users.dealer_id
															JOIN packages ON packages.id  = users.package_id
															WHERE  users.dealer_id = "'.$row['id'].'"';
													$dresult_sub = mysqli_query($conn,$query_sub);
													
													$total =0;
													
													if(mysqli_num_rows($dresult_sub) > 0)
													{	
														
														while($rows = mysqli_fetch_array($dresult_sub))
														{  
															$total +=  ($rows['amount'] * $rows['commission'] )/100 ; 
														}
													}
													
													//$val->paid =  Payment::where('dealer_id',$val->id)->sum('amount');
													$qry_pay = 'SELECT SUM(amount) as total FROM payment WHERE dealer_id = "'.$row['id'].'"';
													$result_pay = mysqli_query($conn,$qry_pay);
													
													$paid = 0;
													if(mysqli_num_rows($result_pay) > 0)
													{	
														while($row_p = mysqli_fetch_array($result_pay))
														{  
															$paid = ($row_p['total'] !='')?$row_p['total']:0;
														}
													}
													$out  =  $total -$paid;
													if($out!=0)
													{ 
														$total_project_amount += $total;
														$total_paid_amount += $paid ;
														?>
														<tr>
															<td><strong><?php echo $row['name']; ?> </strong>  </td>
															<td style="text-align: right;">&#8377; <?php echo number_format($total,'2','.',',') ; ?></td>
															<td style="text-align: right;">&#8377; <?php echo number_format($paid,'2','.',',') ; ?></td>
															<td style="text-align: right;">&#8377; <?php echo number_format($out,'2','.',',') ; ?></td>
														</tr><?php 
													}
													$count++;
												}
											}
											?>
											<tfoot>
                                            <tr>
												<td></td>
												<td style="text-align: right;">&#8377; <strong><?php echo number_format($total_project_amount,'2','.',','); ?></strong></td>
												<td style="text-align: right;">&#8377;. <strong><?php echo number_format($total_paid_amount,'2','.',','); ?></strong></td>
												<td style="text-align: right;">&#8377; <strong><?php echo number_format($total_project_amount-$total_paid_amount,'2','.',','); ?></strong></td>
											</tr>
											</tfoot>
                                        </tbody>
                                    </table>
                                </div>
								</div>
                            </div>
                        </div>
                        <!-- end row -->

                        
                        <!-- end row -->
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
			TableManageButtons.init();
        </script>
		<script>
		function deleteAdminFromMaster(dealerId){
			if (window.confirm('Are you sure,You want to delete this record?'))
			{
				window.location.href = 'adddealer.class.php?doAction=deleteDealer&dealerId= '+dealerId;
			}
			else
			{
				return false;
			}
		}
		</script>
    </body>
</html>