<?php include('include/config.php');  
$userData = $_SESSION['earth_india@AdminUserData'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title><?php print($page); ?> | <?php print(APP_NAME); ?></title>
	<meta name="author" content=""/>
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	
	<!-- Bootstrap Colorpicker CSS -->
	<link href="vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css"/>
	
	<!-- select2 CSS -->
	<link href="vendors/bower_components/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css"/>
	
	<!-- switchery CSS -->
	<link href="vendors/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" type="text/css"/>
	
	<!-- bootstrap-select CSS -->
	<link href="vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>
	
	<!-- bootstrap-tagsinput CSS -->
	<link href="vendors/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" type="text/css"/>
	
	<!-- bootstrap-touchspin CSS -->
	<link href="vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css"/>
	
	<!-- multi-select CSS -->
	<link href="vendors/bower_components/multiselect/css/multi-select.css" rel="stylesheet" type="text/css"/>
	
	<!-- Bootstrap Switches CSS -->
	<link href="vendors/bower_components/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
	
	<!-- Bootstrap Datetimepicker CSS -->
	<link href="vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
	 
		
	<!-- Custom CSS -->
	<link href="dist/css/style.css" rel="stylesheet" type="text/css">
	
</head>

<body>
	<!--Preloader-->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!--/Preloader-->
    <div class="wrapper theme-1-active pimary-color-red">

		<!-- Top Menu Items -->
		<?php include("include/topmenu.php"); ?>
		<!-- /Top Menu Items -->
		
		<!-- Left Sidebar Menu -->
		<?php include("include/leftsidebar.php"); ?>
		<!-- /Left Sidebar Menu -->
		
		<!-- Right Sidebar Menu -->
		<?php include("include/rightsidebar.php"); ?>
		<!-- /Right Sidebar Menu -->

		<!-- Main Content -->
		<div class="page-wrapper">
			<div class="container-fluid">
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Billing Management</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="dashboard.php">Dashboard</a></li>
						<li><a href="javascript:;"><span>Purchase Management</span></a></li>
						<li class="active"><span>Billing Management</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default card-view">
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="row">
										<div class="col-md-12">
											<div class="form-wrap">
												<form class="form-horizontal" role="form">
													<div class="form-body">
														<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Billing Management
														<span class="pull-right text-success">
															Company Name : Sanskar Technolab
														</span>		
														</h6>
														
														<hr class="light-grey-hr"/>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label class="control-label col-md-4">Customer Name:</label>
																	<div class="col-md-6">
																		<select class="form-control select2">
																			<option>Select Customer</option>
																			<option value="CT">Connecticut</option>
																			<option value="DE">Delaware</option>
																			<option value="FL">Florida</option>
																			<option value="GA">Georgia</option>
																			<option value="IN">Indiana</option>
																			<option value="ME">Maine</option>
																			<option value="MD">Maryland</option>
																			<option value="MA">Massachusetts</option>
																			<option value="MI">Michigan</option>
																			<option value="NH">New Hampshire</option>
																			<option value="NJ">New Jersey</option>
																			<option value="NY">New York</option>
																			<option value="NC">North Carolina</option>
																			<option value="OH">Ohio</option>
																			<option value="PA">Pennsylvania</option>
																			<option value="RI">Rhode Island</option>
																			<option value="SC">South Carolina</option>
																			<option value="VT">Vermont</option>
																			<option value="VA">Virginia</option>
																			<option value="WV">West Virginia</option>
																		</select>
																	</div>
																</div>
															</div>
															<!--/span-->
															<div class="col-md-6">
																<div class="form-group">
																	<label class="control-label col-md-3">Invoice Date :</label>
																	<div class="col-md-6">
																		<div class='input-group date' id='datetimepicker1'>
																				<input type='text' class="form-control" />
																				<span class="input-group-addon">
																					<span class="fa fa-calendar"></span>
																				</span>
																			</div>
																	</div>
																</div>
															</div>
														</div>
													</div>	
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default card-view">
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="row">
										<div class="form-group">
											<label class="control-label col-md-3">Invoice Type :</label>
											<div class="col-md-9">
												<div class="radio-list">
													<div class="radio-inline pl-0">
														<span class="radio radio-info">																					
															<input type="radio" name="radio7" id="radio_9" value="option1" checked>
															<label for="radio_9">Product Type Invoice</label>
														</span>
													</div>
													<div class="radio-inline pl-0">
														<span class="radio radio-info">																				
															<input type="radio" name="radio7" id="radio_10" value="option2">
															<label for="radio_10">Service Type Invoice</label>
														</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>
				</div>
				<div class="row">
					<!-- Basic Table -->
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table class="table mb-0">
												<thead>
												  <tr>
													<th>#</th>
													<th>Goods/Service</th>
													<th>HSN Code</th>
													<th>Unit</th>
													<th>Quantity</th>
													<th>Rate</th>
													<th>Total Value</th>
													<th>Action</th>
												  </tr>
												</thead>
												<tbody id="tBody">
												  <tr id="tr1">
													<td>1</td>
													<td>
														<select class="form-control" name="lsVender1" id="lsVender1" onChange ="return getProValue(this.value);">
															<option value="">Select Product</option>
															<option value="1">Product 1</option>
															<option value="2">Product 2</option>
														</select>				
													</td>
													<td id="tdHSNCode1">HSN Code</td>
													<td id="tdUnit1">Unit</td>
													<td>
														<input type="text" class="form-control" style="width:auto;display:inline-block" id="txtQuantity1" name="txtQuantity1" placeholder="Quantity">
													</td>
													<td>
														<input type="text" class="form-control" style="width:auto;display:inline-block" id="txtRate1" id="txtRate1" placeholder="Rate">
													</td>
													<td>
														<input type="text" class="form-control" style="width:auto;display:inline-block" id="txtTotalValue1"  id="txtTotalValue1"placeholder="Total Value">
													</td>
													<td><a href="javascript:;" onclick="javascript:addNewRow();" data-toggle="tooltip" data-original-title="Add More"> <i class="fa fa-plus fa-2x text-success"></i> </a></td>
												  </tr>
												  <input name="count" id="count" class="form-control" value="1" type="hidden">
												</tbody>
											</table>
										</div>
									</div>
									<hr class="light-grey-hr">
									<div class="col-md-12">
										<div class="col-md-3">
											
										</div>
										<div class="col-md-3">
											
										</div>
										<div class="col-md-3">
											<div class="pull-right txt-dark"><h6>Total :</h6></div>
										</div>
										<!--/span-->
										<div class="col-md-3">
											<div class="pull-left txt-dark"><i class="fa fa-inr"></i>10000</div>
										</div>
									</div><br/><br/>
									<div class="col-md-12">
										<div class="col-md-3"></div>
										<div class="col-md-3"></div>
										<div class="col-md-3">
											<div class="pull-right txt-dark"><h6>Less : Discount</h6></div>
										</div>
										<!--/span-->
										<div class="col-md-3">
											<div class="pull-left txt-dark"><input type="text" class="form-control" style="width:auto;display:inline-block" id="txtPackingChanges" name="txtPackingChanges"></div>
										</div>
									</div>
									<br/><br/><br/>
									<div class="col-md-12">
										<div class="col-md-3"></div>
										<div class="col-md-3"></div>
										<div class="col-md-3">
											<div class="pull-right txt-dark"><h6>TAXABLE VALUE OF GOODS/SERVICES</h6></div>
										</div>
										<div class="col-md-3">
											<div class="pull-left txt-dark"><input type="text" class="form-control" style="width:auto;display:inline-block" id="txtPackingChanges" name="txtPackingChanges"></div>
										</div>
									</div>
									<br/><br/><br/>
									
									<div class="col-md-12">
										<div class="col-md-9">
											<div class="txt-dark"><h6>Total</h6></div>
										</div>
										<!--/span-->
										<div class="col-md-3">
											<div class="pull-left txt-dark"><input type="text" class="form-control" style="width:auto;display:inline-block" id="txtPackingChanges" name="txtPackingChanges"></div>
										</div>
									</div>
									<br/><br/><br/>
									<div class="col-md-12">
										<div class="col-md-6">
											<div class="txt-dark"><h5>Total Amount in Word</h5></div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div class="pull-left txt-dark"><h5>Onw Thousand Two Hundred Twenty One</h5></div>
										</div>
									</div>
									<br/><br/><br/><br/>
									<div class="form-actions mt-10 pull-right">
										<button type="submit" class="btn btn-success  mr-10">Submit</button>
										<a href="view-tax-billing.php" class="btn btn-default" title="Back">Back</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Basic Table -->
				</div>	
			</div>
			
			<!-- Footer -->
			<?php include("include/footer-text.php");?>
			<!-- /Footer -->
			
		</div>
		<!-- /Main Content -->

    </div>
    <!-- /#wrapper -->
	
	<!-- JavaScript -->
	
    <!-- jQuery -->
	<script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
	
	<!-- Bootstrap Core JavaScript -->
	<script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	
	<!-- Moment JavaScript -->
	<script type="text/javascript" src="vendors/bower_components/moment/min/moment-with-locales.min.js"></script>
	
	<!-- Bootstrap Colorpicker JavaScript -->
	<script src="vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
	
	<!-- Switchery JavaScript -->
	<script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>
	
	<!-- Select2 JavaScript -->
	<script src="vendors/bower_components/select2/dist/js/select2.full.min.js"></script>
	
	<!-- Bootstrap Select JavaScript -->
	<script src="vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	
	<!-- Bootstrap Tagsinput JavaScript -->
	<script src="vendors/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
	
	<!-- Bootstrap Touchspin JavaScript -->
	<script src="vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
	
	<!-- Multiselect JavaScript -->
	<script src="vendors/bower_components/multiselect/js/jquery.multi-select.js"></script>
	
	 
	<!-- Bootstrap Switch JavaScript -->
	<script src="vendors/bower_components/bootstrap-switch/dist/js/bootstrap-switch.min.js"></script>
	
	<!-- Bootstrap Datetimepicker JavaScript -->
	<script type="text/javascript" src="vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
	
	<!-- Bootstrap Daterangepicker JavaScript -->
	<script src="vendors/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<!-- Form Picker Init JavaScript -->
	<script src="dist/js/form-picker-data.js"></script>
		
	<!-- Form Advance Init JavaScript -->
	<script src="dist/js/form-advance-data.js"></script>
	
	<!-- Slimscroll JavaScript -->
	<script src="dist/js/jquery.slimscroll.js"></script>

	<!-- Fancy Dropdown JS -->
	<script src="dist/js/dropdown-bootstrap-extended.js"></script>
	
	<!-- Owl JavaScript -->
	<script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
	
	
	<!-- Init JavaScript -->
	<script src="dist/js/init.js"></script>
	<script>
function addNewRow() {
	//Default hiiden variable set as 1
	var count = document.getElementById("count").value;
	
	//Increment by 1 to count hidden variable
	count = parseInt(count)+1;
	
	//Create div of "form-group"
	var newRow = document.getElementById("tBody");
	
	var newTR = document.createElement("tr"); 
	newTR.setAttribute("id", "TR"+count);
	
	//Create a TD for Sr NO
	var tdSrNO = document.createElement("td");
	tdSrNO.innerHTML = count;
	newTR.appendChild(tdSrNO);
	
	
	//Create a TD for Goods and service name
	var tdGoodandService = document.createElement("td");
	
	//Create Select Box of Goods and Service
	var lsGoodAndService = document.createElement("SELECT");
    lsGoodAndService.setAttribute("id", "lsVender"+count);
	lsGoodAndService.setAttribute("name", "lsVender"+count);
	lsGoodAndService.setAttribute("class", "form-control");
   //Create OPTION of SELECTBOX
    var optGoodAndService = document.createElement("option");
    optGoodAndService.setAttribute("value", "1");
    var text = document.createTextNode("Product 1");
    optGoodAndService.appendChild(text);
	
	var optGoodAndService1 = document.createElement("option");
    optGoodAndService1.setAttribute("value", "2");
    var text1 = document.createTextNode("Product 2");
    optGoodAndService1.appendChild(text1);
	//Append OPTION to SELECT BOX
	lsGoodAndService.appendChild(optGoodAndService);
	//Append OPTION1 to SELECT BOX
	lsGoodAndService.appendChild(optGoodAndService1);
	//Append Select Box to TD
	tdGoodandService.appendChild(lsGoodAndService);
	//append good and service TD to TR
	newTR.appendChild(tdGoodandService);
	
	//Create a TD for HSN CODE
	var tdHSNCode = document.createElement("td");
	tdHSNCode.innerHTML = "Tshirt";
	newTR.appendChild(tdHSNCode);
	
	//Create a TD for UNIT
	var tdUnit = document.createElement("td");
	tdUnit.innerHTML = "KL";
	newTR.appendChild(tdUnit);
	
	//Create a TD for Quantity
	var tdQuantity = document.createElement("td");
	//Create Textbox of Quantity
	var txtQuantity = document.createElement("input");
    txtQuantity.setAttribute("id", "txtQuantity"+count);
	txtQuantity.setAttribute("name", "txtQuantity"+count);
	txtQuantity.setAttribute("style", "width:auto;display:inline-block");
	txtQuantity.setAttribute("class", "form-control");
	txtQuantity.setAttribute("placeholder", "Quantity");
	//Append Quantity Textbox to TD
	tdQuantity.appendChild(txtQuantity);
	//Append TD to TR
	newTR.appendChild(tdQuantity);
	
	//Create a TD for Rate
	var tdRate = document.createElement("td");
	//Create Textbox of Rate
	var txtRate = document.createElement("input");
    txtRate.setAttribute("id", "txtRate"+count);
	txtRate.setAttribute("name", "txtRate"+count);
	txtRate.setAttribute("style", "width:auto;display:inline-block");
	txtRate.setAttribute("class", "form-control");
	txtRate.setAttribute("placeholder", "Rate");
	//Append Rate Textbox to TD
	tdRate.appendChild(txtRate);
	//Append TD to TR
	newTR.appendChild(tdRate);
	
	//Create a TD for Total Value
	var tdTotalValue = document.createElement("td");
	//Create Textbox of TotalValue
	var txtTotalValue = document.createElement("input");
    txtTotalValue.setAttribute("id", "txtTotalValue"+count);
	txtTotalValue.setAttribute("name", "txtTotalValue"+count);
	txtTotalValue.setAttribute("style", "width:auto;display:inline-block");
	txtTotalValue.setAttribute("class", "form-control");
	txtTotalValue.setAttribute("placeholder", "Total Value");
	//Append Total Value  Textbox to TD
	tdTotalValue.appendChild(txtTotalValue);
	//Append TD to TR
	newTR.appendChild(tdTotalValue);
	
	//Create a TD for Action
	var tdAction = document.createElement("td");
	var aTag = document.createElement('a');
	aTag.setAttribute('href',"javascript:;");
	aTag.setAttribute('onClick',"javascript:removeRow('TR"+count+"');");
	aTag.setAttribute('data-toggle',"tooltip");
	aTag.setAttribute('data-original-title',"Delete");
	aTag.innerHTML = "<i class='fa fa-close fa-2x text-danger'></i>";
	
	tdAction.appendChild(aTag);
	newTR.appendChild(tdAction);	
	
	//Append  row 
	newRow.appendChild(newTR);
	
	//Assign a new incremented value to count hidden variable
	document.getElementById("count").value = count;
}
function removeRow(trId) {
	jQuery("#"+trId).remove();
}
</script>
	<?php include("include/footer-js.php");?>
	<script>
		navigationMenu("vendor_management");
		navigationSubMenu("add_vendor");
	</script>
	
	<script>
	// This i global veriable for xmlHttp object
	var xmlHttp;

	// This function is been used to create xmlHttp object for ajax request
	function GetXmlHttpObject() {
		try	{
			// Firefox, Opera 8.0+, Safari
			xmlHttp = new XMLHttpRequest();
		}
		catch(e) {
			// Internet Explorer
			try	{
				xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
			}
			catch(e) {
				try {
					xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				catch(e) {
					alert("Your browser does not support AJAX!");
					return false;
				}
			}
		}
	}
	
	
	function getProValue(id) {
		GetXmlHttpObject();
		var url = 'getajax.php?action=fetchProValue&venderId='+id;
		xmlHttp.onreadystatechange = getProductValue;
		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);
	}

	function getProductValue() {
		if(xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
			strResponseText	 = xmlHttp.responseText;
			var arrProValue = strResponseText.split("@");
			document.getElementById("tdHSNCode1").innerHTML = arrProValue[0];
			document.getElementById("tdUnit1").innerHTML = arrProValue[1];
			var qty = parseInt(arrProValue[2]);
			var rate = parseInt(arrProValue[3]);
			var total =  rate * qty;
			document.getElementById("txtQuantity1").value = qty;
			document.getElementById("txtRate1").value = rate;
			document.getElementById("txtTotalValue1").value = total;
			
		}
	}
	
	function getVenderAddress(id) {
		GetXmlHttpObject();
		var url = 'getajax.php?action=fetchAddress&venderId='+id;
		xmlHttp.onreadystatechange = getAddress;
		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);
	}

	function getAddress() {
		if(xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
			strResponseText	 = xmlHttp.responseText;
			document.getElementById("venderAddress").innerHTML = strResponseText;
		}
	}
	</script>
</body>

</html>
