/*
*
*	Filename : fieldvalidation.js
*	Created By : Sarman Ranavaya
*   Date : 10-07-2017
*	Use of this file : This file is used to validate form for the different files 
*
*/
/*
* This function is used in  file to validate the login page fields
*/
function submitFrmLogin(){
	var flReturn = true;
	var objForm = document.getElementById("frmLogin");
	var txtUsername = document.getElementById("txtUsername");
	var txtPassword = document.getElementById("txtPassword");
	if(txtUsername.value == ""){
		document.getElementById("errUsername").style.display = "";
		flReturn = false;
	}
	else{
		document.getElementById("errUsername").style.display = "none";
	}
	if(txtPassword.value == ""){
		document.getElementById("errPassword").style.display = "";
		flReturn = false;
	}
	else{
		document.getElementById("errPassword").style.display = "none";
	}
	if(!flReturn) {
		return flReturn;
	}
	else {
		objForm.submit();
	}
}

/*
* This function is used in  file to validate the field
*/
function submitFrmPck(){
	var flReturn = true;
	var objForm = document.getElementById("frmPackageDetail");
	var txtPackageName = document.getElementById("txtPackageName");
	var txtPackageCost = document.getElementById("txtPackageCost");
	if(txtPackageName.value == ""){
		document.getElementById("pckName").style.display = "";
		flReturn = false;
	}
	else{
		document.getElementById("pckName").style.display = "none";
	}
	if(txtPackageCost.value == ""){
		document.getElementById("pckCostName").style.display = "";
		flReturn = false;
	}
	else{
		document.getElementById("pckCostName").style.display = "none";
	}
	
	var app = document.getElementsByName('app[]');
	var count = 0;
	for (var i = 0; i < app.length; i++){
		if (app[i].checked){
			document.getElementById("pckApp").style.display = "none";
			flReturn = true;
			count++;
		}
		else {
			if(count < 1) {
				document.getElementById("pckApp").style.display = "";
				flReturn = false;
			}
		}
	}
	if(!flReturn) {
		return flReturn;
	}
	else {
		objForm.submit();
	}
}
/*
* This function is used in user.php file to validate the field
*/
function submitAdminNewUser(){	
	var flReturn = true;
	var objForm = document.getElementById("frmUser");
	var txtFirstName = document.getElementById("txtFirstName");
	var txtLastName = document.getElementById("txtLastName");
	var txtUsername = document.getElementById("txtUsername");
	var txtEmail = document.getElementById("txtEmail");
	var txtMobileNo = document.getElementById("txtMobileNo");
	var txtPassword = document.getElementById("txtPassword");
	var txtCity = document.getElementById("txtCity");
	var lstPackageType = document.getElementById("lstPackageType");
	//Firstname
	if(txtFirstName.value == ""){
		document.getElementById("firstName").style.display = "";
		flReturn = false;
	}
	else{
		document.getElementById("firstName").style.display = "none";
	}
	
	//Lastname
	if(txtLastName.value == ""){
		document.getElementById("lastName").style.display = "";
		flReturn = false;
	}
	else{
		document.getElementById("lastName").style.display = "none";
	}

	//Username
	if(txtUsername.value == ""){
		document.getElementById("userName").style.display = "";
		flReturn = false;
	}
	else{
		document.getElementById("userName").style.display = "none";
	}
	//Email
	if(txtEmail.value == ""){
		document.getElementById("Email").style.display = "";
		flReturn = false;
	}
	else{
		 var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        if (reg.test(txtEmail.value) == false) 
        {
			document.getElementById("IVEmail").style.display = "none";
            flReturn = false;
        }
		document.getElementById("Email").style.display = "none";
	}
	
	
	//MobileNo
	if(txtMobileNo.value == ""){
		document.getElementById("mobileNo").style.display = "";
		flReturn = false;
	}
	else{
			var mob = /^[1-9]{1}[0-9]{9}$/;
			if (mob.test(txtMobileNo.value) == false) {
				document.getElementById("IVMobileNo").style.display = "";
				document.getElementById("mobileNo").style.display = "none";
				flReturn = false;
			}
			else {
				document.getElementById("mobileNo").style.display = "none";
				document.getElementById("IVMobileNo").style.display = "none";
			}
		
	}
	
	//Password
	if(txtPassword.value == ""){
		document.getElementById("password").style.display = "";
		flReturn = false;
	}
	else{
		document.getElementById("password").style.display = "none";
		
	}
	
	//City
	/* if(txtCity.value == ""){
		document.getElementById("city").style.display = "";
		flReturn = false;
	}
	else {
		document.getElementById("city").style.display = "none";
		
	} */
	
	//Package
	if(lstPackageType.value == ""){
		document.getElementById("selPackage").style.display = "";
		flReturn = false;
	}
	else {
		document.getElementById("selPackage").style.display = "none";
		
	}
	
	
	if(!flReturn) {
		return flReturn;
	}
	else {
		objForm.submit();
	}
}
function submitFrmDealer(){

	var flReturn = true;

	var objForm = document.getElementById("frmDealer");
	var txtDealerName = document.getElementById("txtDealerName");
	var txtDealerEmail = document.getElementById("txtDealerEmail");
	var txtMobileNo = document.getElementById("txtMobileNo");
	var txtCommission  = document.getElementById("txtCommission");
	
	if(txtDealerName.value == ""){
		document.getElementById("divDealerName").className = "form-group row has-error";
		document.getElementById("errDealerName").style.display = "";
		flReturn = false;
	}
	else{
		document.getElementById("divDealerName").className = "form-group row";
		document.getElementById("errDealerName").style.display = "none";
	}


	if(txtDealerEmail.value == ""){
		document.getElementById("divEmail").className = "form-group row has-error";
		document.getElementById("errDealerEmail").style.display = "";
		flReturn = false;
	}
	else{
		document.getElementById("divEmail").className = "form-group row";
		document.getElementById("errDealerEmail").style.display = "none";
	}

	if(txtMobileNo.value == ""){
		document.getElementById("divMobileNo").className = "form-group row has-error";
		document.getElementById("errMobileNo").style.display = "";
		flReturn = false;
	}
	else{
		document.getElementById("divMobileNo").className = "form-group row";
		document.getElementById("errMobileNo").style.display = "none";
	}
	
	if(txtCommission.value == ""){
		document.getElementById("divCommision").className = "form-group row has-error";
		document.getElementById("errCommission").style.display = "";
		flReturn = false;
	}
	else{
		document.getElementById("divCommision").className = "form-group row";
		document.getElementById("errCommission").style.display = "none";
	}
	
	if(!flReturn) {
		return flReturn;
	}
	else {
		objForm.submit();
	}
}

function submitFrmPayment(){

	var flReturn = true;

	var objForm = document.getElementById("frmPayment");
	var lsDealer = document.getElementById("lsDealer");
	var txtAmount = document.getElementById("txtAmount");
	var txtPaymentMode = document.getElementById("txtPaymentMode");
	var txtCommission  = document.getElementById("txtCommission");
	
	if(lsDealer.value == ""){
		document.getElementById("divlsDealer").className = "form-group row has-error";
		document.getElementById("errDealerName").style.display = "";
		flReturn = false;
	}
	else{
		document.getElementById("divlsDealer").className = "form-group row";
		document.getElementById("errDealerName").style.display = "none";
	}


	if(txtAmount.value == ""){
		document.getElementById("divAmount").className = "form-group row has-error";
		document.getElementById("errAmount").style.display = "";
		flReturn = false;
	}
	else{
		document.getElementById("divAmount").className = "form-group row";
		document.getElementById("errAmount").style.display = "none";
	}

	if(txtPaymentMode.value == ""){
		document.getElementById("divPaymenMode").className = "form-group row has-error";
		document.getElementById("errPaymenMode").style.display = "";
		flReturn = false;
	}
	else{
		document.getElementById("divPaymenMode").className = "form-group row";
		document.getElementById("errPaymenMode").style.display = "none";
	}
	
	if(!flReturn) {
		return flReturn;
	}
	else {
		objForm.submit();
	}
}


