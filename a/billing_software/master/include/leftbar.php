<div class="left side-menu">
	<div class="sidebar-inner slimscrollleft">
		<!--- Sidemenu -->
		<div id="sidebar-menu">
			<div class="user-details">
				<div class="overlay"></div>
				<div class="text-center">
					<img src="assets/images/photo.jpg" alt="" class="thumb-md img-circle">                            
				</div>
				<div class="user-info">
					<div class="text-center" >
						<a href="#setting-dropdown" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> 
						<?php 
							$userInfo = $_SESSION['BLData']; 							print($userInfo['name'])
						 ?> 
						<span class="mdi mdi-menu-down"></span></a>                                
					</div>
				</div>
			</div>
			<div class="dropdown" id="setting-dropdown">
				<ul class="dropdown-menu" style="">
					<!--<li><a href="add-dealer.php?action=edit&editId=<?php print($_SESSION['BLData']['id']);?>&from=prf"><i class="mdi mdi-face-profile m-r-5"></i> Profile</a></li>-->
					<li><a href="logout.php" title=" Logout"><i class="mdi mdi-logout m-r-5"></i> Logout</a></li>
				</ul>
			</div>
			<ul>
				<li class="menu-title">Navigation</li>
				<li class="has_sub">
					<a href="dashboard.php" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span> </a>
				</li>
				<li class="has_sub">
					<a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-package"></i> <span>Package Master</span> <span class="menu-arrow"></span></a>
					<ul class="list-unstyled"><?php							if($userInfo['user_type'] == "Admin"){									?><li><a href="add-package.php" title="Add Package">Add Package</a></li><?php							}?>							<li><a href="view-packages.php" title="View Package">View Package</a></li><?php							if($userInfo['user_type'] == "Admin"){									?>									<li><a href="add-module.php" title="Add Module">Add Module</a></li>									<li><a href="modules.php" title="View Modules">View Modules</a></li>									<li><a href="add-sub-module.php" title="Add Sub Module">Add Sub Module</a></li>									<li><a href="sub-modules.php" title="View Sub Modules">View Sub Modules</a></li>
									<li><a href="assign-roles.php">Assign Modules</a></li><?php							}?>
					</ul>
				</li>
				<li class="has_sub">
					<a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-clipboard-account"></i><span>Customer Management</span>  <span class="menu-arrow"></span></a>
					<ul class="list-unstyled">						<li><a href="add-customer.php">Add Customer</a></li>
						<li><a href="view-customers.php">View Customers</a></li>					</ul>
				</li><?php				if($userInfo['user_type'] == "Admin"){						?>					<li class="has_sub">						<a href="javascript:void(0);" class="waves-effect"><i class="fa  fa-male"></i><span>Dealer Management</span>  <span class="menu-arrow"></span></a>						<ul class="list-unstyled">							<li><a href="add-dealer.php">Add Dealer</a></li>							<li><a href="dealers.php">View Dealer</a></li>						</ul>					</li><?php				}?>				<li class="has_sub">					<a href="javascript:void(0);" class="waves-effect"><i class="fa fa-rupee"></i><span>Dealer Payment</span>  <span class="menu-arrow"></span></a>					<ul class="list-unstyled"><?php						if($userInfo['user_type'] == "Admin"){								?><li><a href="add-payment.php">Add Payment</a></li>							<li><a href="payment.php">View Payment</a></li><?php						}?>						<li><a href="financial-report.php">Financial Report</a></li><?php
						if($userInfo['user_type'] == "Admin"){	
							?><li><a href="outstanding-report.php">Outstanding Report</a></li><?php
						}
						else{
							?><li><a href="dealer-outstanding-report.php">Outstanding Report</a></li><?php
						}?>
											</ul>				</li>
				<li><a href="logout.php" class="waves-effect" title="Logout"><i class="mdi mdi mdi-logout"></i><span> Logout</span></a></li>
			</ul>
		</div>
		<!-- Sidebar -->
		<div class="clearfix"></div>
	</div>
</div>
<!-- Sidebar -left -->
