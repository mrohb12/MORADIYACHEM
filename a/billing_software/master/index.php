<?php include('include/config.php'); 

$BASE_URL = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?');
$error ='';
$txtUsername = "";
$txtPassword = "";
$msg ='';

if($_POST)
{

	$txtUsername = (isset($_POST['txtUsername']) && $_POST['txtUsername']!='' )?$_POST['txtUsername']:"";
	$txtPassword = (isset($_POST['txtPassword']) && $_POST['txtPassword']!='' )?$_POST['txtPassword']:"";

	if($txtUsername!="" &&  $txtPassword!='')
	{
		$query = " SELECT * FROM dealer WHERE ( username =  '".$txtUsername."' OR email = '".$txtUsername."' )  AND password = '".md5($txtPassword)."' ";
				
		$result = mysqli_query($conn,$query);
		
		if(mysqli_num_rows($result) > 0)
		{
			
			$row = mysqli_fetch_array($result);
			
			if($row['status']==0)
			{
				$error ='Account Has Been Deactivated By Admin.';
			}
			else {
				
				$_SESSION['BLData'] = $row ;

				echo "<script>document.location='dashboard.php';</script>";
			}
		}
		else {
			$error ='Invalid Username or Password';
		}
	}
	else {
		$error =' All fields are required';
	}
}




//Verify Code Start
if(isset($_GET['email']) && isset($_GET['key']))
{
	$email = trim(mysqli_escape_string($_GET['email']));
	$key = trim(mysqli_escape_string($_GET['key']));		

	$query_verify_email = "SELECT * FROM users  WHERE email ='$email' and isactive = 1";
	$result_verify_email = mysqli_query($conn,$query_verify_email);

	if (mysqli_num_rows($result_verify_email) == 1)
	{
		$msg =  '<div class="success">Your Account already exists. Please <a href="'.$BASE_URL.'">Login Here</a></div>';
	}
	else {
		if (isset($email) && isset($key))
		{
			mysqli_query($conn,"UPDATE users SET isactive=1 WHERE email ='".$email."' AND hash='".$key."' ") or die(mysql_error());
			if (mysqli_affected_rows() == 1)
			{
				$msg =  '<div class="success">Your Account has been activated. Please <a href="'.$BASE_URL.'">Login Here</a></div>';		
			} 
			else {
				$msg = '<div class="error">Account couldnot be activated.</div>';		
			}
		}
	} 
}

?>

<!DOCTYPE html>

<html>
   <?php include("include/head.php"); ?>
     <body>
        <!-- Loader -->
        <?php include("include/loader.php");?>
        <!-- HOME -->
        <section>
            <div class="container-alt">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="wrapper-page">
                            <div class="m-t-40 account-pages">
                                <div class="text-center account-logo-box">
                                    <h2 class="text-uppercase">
                                        <a href="index.php" class="text-success">
                                            <span><img src="assets/images/logo.png" alt="" height="36"></span>
										</a>                                    
									</h2>
                                </div>
                                <div class="account-content">
                                    <form class="form-horizontal" name="frmLogin" id="frmLogin" onSubmit="javascript:return submitFrmLogin();" action="index.php" method="POST">
                                        <div class="form-group ">
                                            <div class="col-xs-12">
                                                <input class="form-control" name="txtUsername" id="txtUsername" type="text"  placeholder="Username">
												<ul class="parsley-errors-list filled" id="errUsername" style="display:none;"><li class="parsley-required">Please enter username.</li></ul>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <div class="col-xs-12">

                                                <input class="form-control" type="password" name="txtPassword" id="txtPassword" placeholder="Password">

												<ul class="parsley-errors-list filled" id="errPassword" style="display:none;"><li class="parsley-required">Please enter password.</li></ul>

                                            </div>

                                        </div>



                                        <div class="form-group ">

                                            <div class="col-xs-12">

                                                <div class="checkbox checkbox-success">

                                                    <input id="checkbox-signup" type="checkbox" checked>

                                                    <label for="checkbox-signup">Remember me</label>

                                                </div>

                                            </div>

                                        </div>



                                        <div class="form-group text-center m-t-30">

                                            <div class="col-sm-12">

                                                <a href="javascript:;" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>                                            </div>

                                        </div>



                                        <div class="form-group account-btn text-center m-t-10">

                                            <div class="col-xs-12">

                                                <button class="btn btn-primary waves-effect w-md waves-light" type="submit"  name="submit">Log In</button>

                                            </div>

                                        </div>

                                    </form>



                                    <div class="clearfix"></div>

                                </div>

                            </div>

                            <!-- end card-box-->

                        </div>

                        <!-- end wrapper -->

                    </div>

                </div>

            </div>

          </section>

          <!-- END HOME -->





         <script>

            var resizefunc = [];

        </script>



       <!-- jQuery  -->

	    <script src="assets/js/fieldvalidation.js"></script>

        <script src="assets/js/jquery.min.js"></script>

        <script src="assets/js/bootstrap.min.js"></script>

        <script src="assets/js/detect.js"></script>

        <script src="assets/js/fastclick.js"></script>

        <script src="assets/js/jquery.blockUI.js"></script>

        <script src="assets/js/waves.js"></script>

        <script src="assets/js/jquery.slimscroll.js"></script>

        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <script src="plugins/switchery/switchery.min.js"></script>



        <!-- init -->

        <script src="assets/pages/jquery.datatables.init.js"></script>



        <!-- App js -->

        <script src="assets/js/jquery.core.js"></script>

        <script src="assets/js/jquery.app.js"></script>



    </body>

</html>