<!DOCTYPE html><!DOCTYPE html>
 <?php include("include/config.php"); 
  if(!isset($_SESSION['BLData']) && empty($_SESSION['BLData']))
{
	$_SESSION['error'] = 'Invalid Request';
	header('Location:index.php');
	exit;
}
$userInfo = $_SESSION['BLData'];
	
	$catId = "";
	$catName = "";
	$txtCatIcon = "";
	$status  = 1 ;
	$action = "Add";
	$doAction = "addPageCategory";
	$errMsg = "Added";
	if(isset($_REQUEST['doAction']) && $_REQUEST['doAction'] == 'updatePageCat'){

		$action = "Update";
		$doAction = "updatePageCategory";
		$errMsg = "Updated";
		$catId = $_REQUEST['catId'];
	
		$qrySel = mysql_query("SELECT * FROM page_categories WHERE id='".$catId."'") or die(mysql_error());
		if(DEBUG){
			print($qrySel);
		}
		
		$check = mysql_num_rows($qrySel);
		
		if($check > 0) 
		{
			$row = mysql_fetch_array($qrySel);
			
			if(DEBUG){
				print("<pre>Package Data");
				print_r($row);
				print("</pre>");
			}
			
			$catName = $row['category_name'];
			$txtCatIcon = $row['icon'];
			$catId = $row['id'];
			$status  = $row['status'];
		}
	}	
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
        <title>Add Module | SMS Master</title>

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
                                    <h4 class="page-title"><?php print($action);?> Module</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                       <li><a href="dashboarad.php">Dashboard</a></li>
										<li><a href="javascript:;">User Management</a></li>
                                        <li class="active">
                                            <?php print($action);?>  Module
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
									  <div class="col-sm-12 col-xs-12 col-md-7">
                                            <h4 class="header-title m-t-0"><?php print($action);?> Module</h4>
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
														Record <?php print($errMsg);?> Successfully.</div><?php 
												}
												elseif($_REQUEST['required'] == 'NSC' OR $_REQUEST['required'] == 'NUSC') {?>
													 <div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
														<i class="mdi mdi-block-helper"></i>
													Record Not <?php print($errMsg);?> Successfully.
													</div><?php 
												}
											}
											?>
											<div class="p-20">
												<form id="frmNewPageCategory" name="frmNewPageCategory" method="POST" onSubmit="javascript:return submitFrmPageCategory();" action="addpagecategory.class.php?doAction=<?php print($doAction);?>" >
													<div class="form-group row" id="divPckName">
														<label class="col-sm-3 form-control-label mrg9Top" for="fullname">Module Name<span class="text-danger">*</span> :</label>
														<div class="col-sm-7">
															<input type="text" class="form-control" name="txtCatName" id="txtCatName" placeholder="Enter Page Category" value="<?php print($catName);?>">
															<ul class="parsley-errors-list filled" id="errCatName" style="display:none"><li class="parsley-required">Please enter module name.</li></ul>
														</div>
													</div>
													<div class="form-group row" id="divPckName">
														<label class="col-sm-3 form-control-label mrg9Top" for="fullname">Module Icon :</label>
														<div class="col-sm-7">
															<input type="text" class="form-control" name="txtCatIcon" id="txtCatIcon" placeholder="Enter Category Icon" value="<?php print($txtCatIcon);?>">
															<p class="text-orange">Example : fa fa-male, mdi mdi-human-greeting</p>
														</div>
													</div>
													 <div class="form-group row">
														<label class="col-sm-3 form-control-label " for="message">Status :</label>
														 <div class="col-sm-7">
															<input type="checkbox" id="switch5" class="statusChange" switch="bool" <?php echo ($status == 1)?"checked":""; ?> name="status"/>
															<label for="switch5" data-on-label="Active" data-off-label="Deactive"></label>
                                                        </div>
													</div>
													
													<div class="form-group row text-center" style="margin-top:30px;">
														<input type="hidden" name="catId" value="<?php print($catId);?>" id="catId"/>
														<input type="submit" class="btn btn-success" value="<?php print($action);?> Module" title="<?php print($action);?> Module">
														<a href="page-category.php" class="btn btn-primary btn-bordered waves-effect w-md waves-light" title="Back"><i class="mdi mdi-arrow-left-bold-circle-outline"></i> <span>Back</span> </a>
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