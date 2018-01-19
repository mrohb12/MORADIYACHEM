<?php 

if($_REQUEST['action'] == "fetchProValue") {
	$returnString = "";
	if($_REQUEST['venderId'] == 1){
		$hsnCode = "HSNCODE001";
		$unit = "ltr";
		$qty = 2;
		$rate = 300;
	}
	elseif($_REQUEST['venderId'] == 2){
		$hsnCode = "HSNCODE002";
		$unit = "kl";
		$qty = 3;
		$rate = 500;
	}
	else{
		$hsnCode = "HSNCode";
		$unit = "kl";
		$qty = '';
		$rate = '';
	}	
	$returnString .= $hsnCode."@".$unit."@".$qty."@".$rate;
	print $returnString;
}

if($_REQUEST['action'] == "fetchAddress") {
	$returnString = "";
	if($_REQUEST['venderId'] == 1 || $_REQUEST['venderId'] == ""){
		$returnString .= "<address class='mb-15'>
							<span class='address-head mb-5'>Sanskar Technolab</span>
							304, V-Arcade,M.G.Road <br>
							Junagadh, GJ 362001 <br>
							<abbr title='Phone'>P:</abbr>(972) 747-7438
						</address>";
	}
	if($_REQUEST['venderId'] == 2 ){
		$returnString .= "<address class='mb-15'>
							<span class='address-head mb-5'>Sarman Ranavaya</span>
							304, Harikrishna Appt,Timbavadi Byepass <br>
							Junagadh, GJ 362001 <br>
							<abbr title='Phone'>P:</abbr>(972) 747-7438
						</address>";
	}
	
	
	print $returnString;
}

?>