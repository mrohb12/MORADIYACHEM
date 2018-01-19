<?php 
include_once("addmodule.class.php");
if(!isset($_SESSION['BLData']) && empty($_SESSION['BLData']))
{
	$_SESSION['error'] = 'Invalid Request';
	header("location:index.php");
	exit;
}

$userInfo = $_SESSION['BLData'];

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
        <title>Modules | <?php print(APP_NAME);?></title>

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
                                    <h4 class="page-title">View Modules</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li><a href="dashboarad.php">Dashboard</a></li>
										 <li><a href="javascript:;">User Management</a></li>
                                        <li class="active">View Modules</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>

                        <!-- end row -->

                        <div class="row">
							<form name="frmSaveSortOrder" id="frmSaveSortOrder" method="POST" action="addmodule.class.php?doAction=SaveSortOrder"> 
							<div class="col-lg-12">
                                <div class="text-right" style=" margin-bottom: 18px;">
                                    <input type="submit" class="btn btn-primary" value="Save Sort Order" title="Save Sort Order"/>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>View Modules</b></h4>
									<?php 
											if(isset($_REQUEST['required']) && !empty($_REQUEST['required'])){
												if($_REQUEST['required'] == 'DSC') {?>
													 <div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
														<i class="mdi mdi-check-all"></i>
														Module deleted successfully.</div><?php 
												}
												elseif($_REQUEST['required'] == 'SOUS') {?>
													 <div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
														<i class="mdi mdi-check-all"></i>
														Sortorder updated successfully.</div><?php 
												}
												elseif($_REQUEST['required'] == 'SOUNS') {?>
													 <div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
														<i class="mdi mdi-block-helper"></i>
														Sortorder not updated successfully.
													</div><?php 
												}
												elseif($_REQUEST['required'] == 'NDSC') {?>
													 <div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
														<i class="mdi mdi-block-helper"></i>
														Module not deleted successfully.
													</div><?php 
												}
												elseif($_REQUEST['required'] == 'NDSPC') {?>
													 <div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
														<i class="mdi mdi-block-helper"></i>
														Sub module of this module not deleted successfully.
													</div><?php 

												}
												elseif($_REQUEST['required'] == 'PCDSC') {?>
													 <div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
														<i class="mdi mdi-check-all"></i>
														Module deleted successfully.
													</div><?php 

												}

											}

											?>

										<table id="datatable-responsive" class="table table-striped  table-colored table-info dt-responsive nowrap" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th>ID</th>
													<th>Module Name</th>
													<th>Status</th>
													<th style="width:15%;">Sort Order</th>
													<th>Action</th>
												</tr>
											</thead>

                                        <tbody><?php 
                                       
											$query = "SELECT * FROM page_categories WHERE (endeffdate IS NULL OR endeffdate ='NULL' OR endeffdate='0000-00-00')";

											$qrySel = mysqli_query($conn,$query);
											$totalRecords = mysqli_num_rows($qrySel);
											
											if($totalRecords > 0) {
												$count = 1;
												while ($row = mysqli_fetch_array($qrySel))  
												{
													?>
													<tr>
														<td><?php print($row['id']);?></td>

														<td><?php print($row['category_name']);?></td>

														<td><?php
															$checked = ($row['status'] == 1)?"checked":"";
															?>
															<input type="checkbox" id="switch<?php echo $row['id']; ?>" class="statusChange" switch="bool" type="checkbox" data-table="page_categories" data-index="id" data-id="<?php echo $row['id']; ?>" value="1"  <?php echo $checked ?> name="status"/>
															<label for="switch<?php echo $row['id']; ?>" data-on-label="Active" data-off-label="Deactive"></label>
														</td>
														<td>
															<input type="textbox" id="sortOrder" class="form-control"  value="<?php print($row['sortorder']);?>"  style="width: 25%;" name="sortOrder[<?php echo $row['id']; ?>]"/>
														</td>
													   <td class="actions">
															<a href="add-module.php?doAction=updatePageCat&catId=<?php print($row['id']);?>" class="on-default edit-row" title="Edit"> <i class="fa fa-pencil"></i> </a>
															<a href="javascript:;" onClick="javascript:deleteRecord(<?php print($row['id']);?>);" class="on-default remove-row active" title="Delete"> <i class="fa fa-trash-o"></i> </a>
														</td>
													</tr><?php 
													$count++;
												}
											}?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
							</form>
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



function deleteRecord(catId){

	if (window.confirm('Are you sure,You want to delete this record?'))

	{

		window.location.href = 'addmodule.class.php?doAction=deletePageCategory&catId= '+catId;

	}

	else

	{

		return false;

	}

}

</script>