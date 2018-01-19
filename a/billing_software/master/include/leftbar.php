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
							$userInfo = $_SESSION['BLData']; 
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
					<ul class="list-unstyled"><?php
									<li><a href="assign-roles.php">Assign Modules</a></li><?php
					</ul>
				</li>
				<li class="has_sub">
					<a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-clipboard-account"></i><span>Customer Management</span>  <span class="menu-arrow"></span></a>
					<ul class="list-unstyled">
						<li><a href="view-customers.php">View Customers</a></li>
				</li><?php
						if($userInfo['user_type'] == "Admin"){	
							?><li><a href="outstanding-report.php">Outstanding Report</a></li><?php
						}
						else{
							?><li><a href="dealer-outstanding-report.php">Outstanding Report</a></li><?php
						}?>
						
				<li><a href="logout.php" class="waves-effect" title="Logout"><i class="mdi mdi mdi-logout"></i><span> Logout</span></a></li>
			</ul>
		</div>
		<!-- Sidebar -->
		<div class="clearfix"></div>
	</div>
</div>
<!-- Sidebar -left -->