<?php include('include/config.php');
require 'PHPMailer/PHPMailerAutoload.php';
$BASE_URL = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?');
$success='';
$error ='';
$username = "";
$msg ='';

if($_POST)
{
	$email = (isset($_POST['email']) && $_POST['email']!='' )?$_POST['email']:"";

	if($email!='')
	{
		$query = "SELECT  * FROM users WHERE  email = '".$email."' AND status = 1";				
		$result = mysql_query($query);	
			
		if(mysql_num_rows($result) > 0)
		{
			$fs = mysql_fetch_array($result);	
				// Mail Sent Start
				
				$password = generateRandomString(8);
				
				$a0 = $email ;					
				$mail = new PHPMailer;
				
				$mail->IsSMTP();                                   // Set mailer to use SMTP
			//	$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
				$mail->Host = "ssl://smtp.gmail.com"; 
	
				$mail->SMTPAuth = true;                            // Enable SMTP authentication
				
				
				$mail->Username = 'bancpatel123@gmail.com';          		// SMTP username
				$mail->Password = 'bansi123';             	 // SMTP password
				
				
				$mail->SMTPSecure = 'ssl';                         // Enable TLS encryption, `ssl` also accepted
				$mail->Port = 465; 
				
			//	$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
			//	$mail->Port = 587;                                 // TCP port to connect to  587 / 465
			//	$mail->SMTPDebug = 3;
				
				$mail->setFrom('info@sanskartechnolab.com', 'Sanskar Billing Software');
				$mail->addReplyTo('info@sanskartechnolab.com', 'Sanskar Billing Software');
				$mail->addAddress('info@sanskartechnolab.com');		
				
			/*	$mail->setFrom('sanskartechnolab@gmail.com', 'The Mobile Shop');
				$mail->addReplyTo('sanskartechnolab@gmail.com', 'The Mobile Shop');
				$mail->addAddress('sanskartechnolab@gmail.com');			*/
				
				$mail->addAddress($a0);   			// Add a recipient
				
				
				$mail->isHTML(true);  // Set email format to HTML
				
				$bodyContent = '<h1>Sanskar Billing Software</h1>';
				$bodyContent .= '<h2>Login Details</h2>';
				$bodyContent .= '<table border="1" cellpadding="10" cellspacing="0" width="90%">
				<tr>
				<td>Username</td>
				<td>'.$fs['username'].'</td>
				</tr>
				<tr>
				<td>Password </td>
				<td>'.$password.'</td>
				</tr>									
				</table><br>';
				$bodyContent .= '<a href="'.$BASE_URL.'" style="color: #0033CC; font-size:16px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none;  line-height:40px; width:100%; display:inline-block">Click to Login</a>';
				
				
				$mail->Subject = 'Shridhar - Login Details';
				$mail->Body    = $bodyContent;
				
				if(!$mail->send()) {
				echo 'Message could not be sent. ';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
				}else { 
				$query = "UPDATE users SET 
					password = '".md5($password)."'
					WHERE id = ".$fs['id'];
				mysql_query($query);
				$success = "Mail Sent successfully. Please Check your Mail."; }
				
				// Mail Sent End
		}
		else
		{
			$error = "E-mail mismatch.";
		}			
	}
	else
	{
		$error = "Enter Valid Details";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title><?php echo $page; ?> - <?php echo APP_NAME; ?></title>
		<meta name="description" content="Doodle is a Dashboard & Admin Site Responsive Template by hencework." />
		<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Doodle Admin, Doodleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
		<meta name="author" content="hencework"/>
		
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
			<!-- Main Content -->
			<div class="page-wrapper pa-0 ma-0 auth-page">
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height">
						<div class="table-cell vertical-align-middle auth-form-wrap">
							<div class="auth-form  ml-auto mr-auto no-float">
								<div class="row">
									<div class="col-sm-12 col-xs-12">
										<div class="sp-logo-wrap text-center pa-0 mb-30">
											<a href="login.php">
												<img class="brand-img mr-10" src="dist/img/logo.png" alt="brand"/>
												<span class="brand-text"><?php echo APP_NAME; ?></span>
											</a>
										</div>
										<div class="mb-30">
											<h3 class="text-center txt-dark mb-10">Forgot password?</h3>
											<h6 class="text-center txt-grey nonecase-font">Enter the email you use for Doodle, and we’ll help you create a new password.</h6>
										</div>	
                                        	<?php if($error!=''){ ?>           
                            <div class="panel panel-danger card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-light"> <?php echo $error; ?></h6>
									</div>
									<div class="clearfix"></div>
								</div>								
							</div>
							  <?php } ?>
                              
                              <?php if($success!=''){ ?>           
                            <div class="panel panel-success card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-light"> <?php echo $success; ?></h6>
									</div>
									<div class="clearfix"></div>
								</div>								
							</div>
							  <?php } ?>		
										<div class="form-wrap">
											<form action="" method="post">
												<div class="form-group">
													<label class="control-label mb-10" for="exampleInputEmail_2">Email address</label>
													<input type="email" class="form-control" required="" id="email" name="email" placeholder="Enter email">
												</div>
												<a class="capitalize-font txt-primary block mb-10 pull-right font-12" href="login.php">Login Now</a>
												<div class="form-group text-center">
													<button type="submit" class="btn btn-info btn-rounded">Reset</button>
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
	</body>
</html>
