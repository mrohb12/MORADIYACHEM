<?php include('include/config.php'); 
$error ='';
$username = "";
$password = "";
if($_POST)
{
	$username = (isset($_POST['username']) && $_POST['username']!='' )?$_POST['username']:"";
	$password = (isset($_POST['password']) && $_POST['password']!='' )?$_POST['password']:"";
	
	$browser = addslashes($_SERVER['HTTP_USER_AGENT']);
	$ip = addslashes($_SERVER['REMOTE_ADDR']);
	
	if($password!="" &&  $username!='')
	{
		
		$country = visitor_country();	
		$query = " SELECT  * FROM users WHERE ( username =  '".$username."' OR email = '".$username."' )  AND password = '".md5($password)."' ";
		
		$result = mysql_query($query);
		
		if(mysql_num_rows($result) > 0)
		{
			$row = mysql_fetch_array($result);
				
		
		$status = 1	;		// 1 For success
		$queries=mysql_query("insert into userlog (user_id,browser,ip_address,country,status) VALUES('".$row['id']."','".$browser."','".$ip."','".$country."','".$status."')");
			
				$_SESSION['earth_india@AdminUserData'] = $row ;
				header('Location:dashboard.php');
			
		}
		else
		{
			$status = 0	;		// 0 For Login Fail

		$queries=mysql_query("insert into userlog (user_id,browser,ip_address,country,status) VALUES('".$username."','".$browser."','".$ip."','".$country."','".$status."')");
			$error ='Invalid username / password';
		}
	}else
	{
		$error =' All fields are required';
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title><?php echo $page; ?> - <?php echo APP_NAME; ?></title>
		
		<meta name="author" content="Sanskar"/>
		
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
					<a href="login.php">
						<img class="brand-img mr-10" src="dist/img/logo.png" alt="brand"/>
						<span class="brand-text txt-light"><?php echo APP_NAME; ?></span>
					</a>
				</div>
				<?php /*?><div class="form-group mb-0 pull-right">
					<span class="inline-block pr-10">Don't have an account?</span>
					<a class="inline-block btn btn-info btn-rounded btn-outline" href="signup.html">Sign Up</a>
				</div><?php */?>
				<div class="clearfix"></div>
			</header>
			
			<!-- Main Content -->
			<div class="page-wrapper pa-0 ma-0 auth-page" style="background:url(images/login-bg.jpg) center  center;background-size:cover;">
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height" >
						<div class="table-cell vertical-align-middle auth-form-wrap">
							<div class="auth-form  ml-auto mr-auto no-float" style="background:rgba(255,255,255,0.6);padding:20px;border-radius:5px;">
								<div class="row">
									<div class="col-sm-12 col-xs-12">
										<div class="mb-30">
											<h3 class="text-center txt-dark mb-10" style="font-weight:800;">Sign in to SBS</h3>
											<h6 class="text-center nonecase-font txt-dark">Enter your details below</h6>
										</div>	
                                        
                                        
                             	<?php if($error!=''){ ?>           
                            <div class="panel panel-danger card-view" >
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-light"> <?php echo $error; ?></h6>
									</div>
									<div class="clearfix"></div>
								</div>								
							</div>
							  <?php } ?>			
                                        
                                        <div class="form-wrap" >
											<form action="" method="post">
												<div class="form-group">
													<label class="control-label mb-10" for="exampleInputEmail_2">Username</label>
													<input type="text" class="form-control" required="" name="username" id="username" placeholder="Enter Username">
												</div>
												<div class="form-group">
													<label class="pull-left control-label mb-10" for="exampleInputpwd_2">Password</label>

													<div class="clearfix"></div>
													<input type="password" class="form-control" required="" id="password" name="password" placeholder="Enter Password">
												</div>
												<a class="capitalize-font txt-primary block mb-10 pull-right font-12" href="forgot-password.php">Forgot Password ?</a>
												<div class="form-group">

													<div class="clearfix"></div>
												</div>
												<div class="form-group text-center">
													<button type="submit" class="btn btn-info btn-rounded">sign in</button>
												</div>
                                           
											</form>
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
		<script>
		jQuery(document).ready(function () {
		  jQuery('#username').focus();
		});
		</script>
	</body>
</html>
