<!DOCTYPE html>
<?php 
include_once("include/config.php");
include("addpayment.class.php");
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Sarman Ranavaya">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.png">
        <!-- App title -->
        <title>Financial Report | <?php print(APP_NAME); ?></title>

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
<?php 
if(!isset($_SESSION['BLData']) && empty($_SESSION['BLData']))
{
	$_SESSION['error'] = 'Invalid Request';
	header('Location:index.php');
	exit;
}
$userdata = $_SESSION['BLData']; 

?>


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
                                        <li class="active">Financial Report</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->
						<?php
						if($userdata['user_type'] == "Admin"){
							?><form id="frmDealer" name="frmDealer" method="POST" action="" >
								<div class="row">
									<div class="col-sm-12">
									<div class="card-box">
										<div class="row">
											<div class="col-sm-5">
												 <select id="lsDealer" class="form-control select2" name="lsDealer">
													  <option value="">Select Dealer</option><?php 
															$arrDealers = getDealer();
															foreach($arrDealers as $key => $value){
															?><option value="<?php print($key);?>" 
															<?php if($_POST['lsDealer'] ==  $key ){
																?> selected="selected" <?php 
															}?>>
															<?php print($value);?></option><?php
														}
														?>
												</select>
											</div>	
											<div class="col-sm-5">
												<input type="submit" class="btn btn-success" value="Submit" title="Submit">
											</div>	
											</div>
										</div>
									</div>
								</div>
							</form><?php
						}?>
						<?php
						if($userdata['user_type'] == "Admin"){
							?><form id="frmDateFilter" name="frmDateFilter" method="POST" action="" >
								<div class="row">
									<div class="col-sm-12">
									<div class="card-box">
										<div class="row">
											<div class="col-sm-4">
												<div class="form-group row" id="divPancard">
													<label class="col-sm-3 form-control-label mrg9Top" for="fullname">From :</label>
													 <div class="col-sm-7">
														<div class="input-group">
															<input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose1" name="dtFromDate"  id="dtFromDate" value="<?php print($_POST['dtFromDate']); ?>">
															<span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
														</div><!-- input-group -->
													</div>	
												</div>
											</div>	
											<div class="col-sm-4">
												<div class="form-group row" id="divPancard">
													<label class="col-sm-3 form-control-label mrg9Top" for="fullname">To :</label>
													 <div class="col-sm-7">
														<div class="input-group">
															<input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose2" name="dtToDate" id="dtToDate"  value="<?php print($_POST['dtToDate']); ?>">
															<span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
														</div><!-- input-group -->
													</div>	
												</div>
											</div>
											<div class="col-sm-2">
												<input type="hidden" name="lsDealer" id="lsDealer" value="<?php print($_POST['lsDealer']);?>">
												<input type="submit" class="btn btn-success" value="Submit" title="Submit">
											</div>	
											</div>
										</div>
									</div>
								</div>
							</form><?php
						}?>
						<div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
									<div class="row">
									  <div class="col-sm-12 col-xs-12 col-md-12">
                                    <h4 class="m-t-0 header-title"><b>Financial Report : <?php 
									if($userdata['user_type'] == "Admin"){
										$lsDealer = (isset($_POST['lsDealer']) && $_POST['lsDealer']!='')?$_POST['lsDealer']:'0';
									}
									else{
										$lsDealer = $userdata['id'];
									}
									
									$dealerName = getDealerName($lsDealer);
									
									$dealer_name = '';
									if($dealerName && !empty($dealerName))
									{
										$dealer_name = $dealerName;
									}
									
									echo "<td>".$dealer_name."</td>";
									?> </b></h4>
									 <table id="datatable-responsive" class="table table-striped  table-colored table-info dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Detail</th>
                                                <th scope="col" >Date</th>
												<th style="text-align:right;" >Package Amount(&#8377;)</th>
												<th style="text-align:right;" >Commision Amount(&#8377;)</th>
												<th style="text-align:right;" >Amount(&#8377;)</th>
												<th style="text-align:right;" >Paid Amount(&#8377;)</th>
												<th style="text-align:right;" >Outstanding Amount(&#8377;)</th>
                                            </tr>
                                        </thead>
                                        <tbody> <?php 
		  
										$total_project_amount = 0;
										$total_paid_amount = 0;	
										$grand_total = 0;
										
										$data_query = " SELECT * FROM payment  WHERE 1=1";
										$prod_query = 'SELECT users.*,packages.price as amount,dealer.commission FROM users 
															JOIN dealer ON dealer.id = users.dealer_id
															JOIN packages ON packages.id  = users.package_id
															WHERE  1=1 ';
										
										$dealer_id = '';
										if($userdata['user_type'] == "Admin"){
											if( isset($_POST['lsDealer']) && $_POST['lsDealer']!='')
											{
												$dealer_id = $_POST['lsDealer'];
											}
										}
										else{
											$dealer_id = $userdata['id'];
										}
										
										if(isset($_POST['dtToDate']) && !empty($_POST['dtToDate']) && isset($_POST['dtFromDate']) && !empty($_POST['dtFromDate'])){
											$dtToDate = date('Y-m-d',strtotime($_POST['dtToDate']));
											$dtFromDate = date('Y-m-d',strtotime($_POST['dtFromDate']));
											$data_query .= " AND (date BETWEEN '".$dtFromDate."' AND '".$dtToDate."') ";
											$prod_query .= "  AND (users.startdate BETWEEN '".$dtFromDate."' AND '".$dtToDate."') ";
										}
										
										//(date_field BETWEEN '2010-01-30 14:15:55' AND '2010-09-29 10:15:55')
										$data_query .= " AND dealer_id = '".$dealer_id."' AND (endeffdate IS NULL OR endeffdate ='NULL' OR endeffdate='0000-00-00')";
										$prod_query .= " AND users.dealer_id = '".$dealer_id."' AND (users.endeffdate IS NULL OR users.endeffdate ='NULL' OR users.endeffdate='0000-00-00')";
										
										$data_query .= " ORDER BY  date DESC  " ;
										
										$prod_query .= " ORDER BY  users.id DESC  " ; 
											$prod_result = mysql_query($prod_query);
											if(mysql_num_rows($prod_result) > 0)
											{	
												while($prod_row = mysql_fetch_array($prod_result))
												{
													?><tr>
														<td><strong> <?php echo print($prod_row['fname']." ".$prod_row['lname']); ?> </strong>  </td>
														<td><?php echo date('d-m-Y' , strtotime($prod_row['created_at'])); ?></td>
														<td style="text-align: right;"><i class="fa fa-inr"></i> <?php echo $prod_row['amount']; ?></td>
														<td style="text-align: right;"><?php 
															$commissionAmount =  ($prod_row['amount'] * $prod_row['commission'] )/100 ; 
															echo "&#8377;".$commissionAmount; 
														?></td>
														<td style="text-align: right;"><?php 
															$afterCommisionValue = $prod_row['amount'] - $commissionAmount;
															echo "&#8377;".$afterCommisionValue; 
															$total_project_amount += $afterCommisionValue;
														?></td>
														<td style="text-align: right;">-</td>
														<td style="text-align: right;">-</td>
														<td></td>
													</tr><?php
												}
											}
										
											$result = mysql_query($data_query);
											if(mysql_num_rows($result) > 0)
											{	
												while($row = mysql_fetch_array($result))
												{
													?><tr>
														<td>Payment mode: <strong> <?php echo $row['mode']; ?></strong> </td>
														<td><?php echo date('d-m-Y' , strtotime($row['date'])); ?></td>
														<td style="text-align: right;">-</td>
														<td style="text-align: right;">-</td>
														<td style="text-align: right;">-</td>
														<td style="text-align: right;"><i class='fa fa-inr'></i><?php print(number_format($row['amount'],'2','.',','));?></td>
														<td style="text-align: right;"><?php 
															 $amount = $row['amount']; 
															 $total_paid_amount += $amount;
															 echo  "<i class='fa fa-inr'></i>".number_format($amount,'2','.',',');?> 
														</td>
														<td></td>
													</tr>
												<?php
												}
											}
										?>
										<tr>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td style="text-align: right;">&#8377; <strong><?php echo number_format($total_project_amount,'2','.',','); ?></strong></td>
											<td style="text-align: right;">&#8377; <strong><?php echo number_format($total_paid_amount,'2','.',','); ?></strong></td>
											<td style="text-align: right;">&#8377; <strong><?php echo number_format($total_project_amount-$total_paid_amount,'2','.',','); ?></strong></td>
										</tr>
             
                                        </tbody>
                                    </table>
                                </div></div>
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
		//From Date-Control
		jQuery('#datepicker-autoclose1').datepicker({
				autoclose: true,
				todayHighlight: true
		});
		//To Date-Control
		jQuery('#datepicker-autoclose2').datepicker({
				autoclose: true,
				todayHighlight: true
		});
		</script>
    </body>
</html>