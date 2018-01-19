<!DOCTYPE html>
<?php 
include('include/config.php'); 
$BASE_URL = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?');
if(!isset($_SESSION['BLData']) && empty($_SESSION['BLData']))
{
	$_SESSION['error'] = 'Invalid Request';
	header('Location:index.php');
	exit;
} ?>
<html>
 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Sarman Ranavaya">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.png">

        <!-- App title -->
        <title>Dashboard | <?php print(APP_NAME);?></title>

         <!--Morris Chart CSS -->
		<link rel="stylesheet" href="plugins/morris/morris.css">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="plugins/switchery/switchery.min.css">
		
       	 <!-- Tablesaw css -->
        <link href="plugins/tablesaw/css/tablesaw.css" rel="stylesheet" type="text/css" />

		

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

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
            <div class="left side-menu">
				<div class="sidebar-inner slimscrollleft">
                    <!--- Sidemenu -->
                    <?php include("include/sidemenu.php");?>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>
                </div>
			</div>
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
                                    <h4 class="page-title">Dashboard</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li class="active">Dashboard</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->
						
                        <div class="row text-center">
                            
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="card-box widget-box-one">
                                    <div class="wigdet-one-content">
                                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow">Total Administrator</p>
                                        <h2 class="text-dark"><span data-plugin="counterup">12</span> </h2>
                                        <!-- <p class="text-muted m-0"><b>Last:</b> 1250</p> -->
                                    </div>
                                </div>
                            </div><!-- end col -->
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

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
				
		<!-- Tablesaw js -->
        <script src="plugins/tablesaw/js/tablesaw.js"></script>
        <script src="plugins/tablesaw/js/tablesaw-init.js"></script>
		
		<script type="text/javascript">
            $(document).ready(function () {
                $('#datatable').dataTable();
                $('#datatable-responsive').DataTable();
               
            });
            TableManageButtons.init();

        </script>
    </body>

</html>