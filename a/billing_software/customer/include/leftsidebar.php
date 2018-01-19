<div class="fixed-sidebar-left">
	<ul class="nav navbar-nav side-nav nicescroll-bar">
		<li class="navigation-header">
			<span>Main</span> 
			<i class="zmdi zmdi-more"></i>
		</li>
		<li><a href="dashboard.php" title="Dashboard" data-toggle="collapse" data-target="#dashboard_dr"><div class="pull-left"><i class="fa fa-dashboard mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="pull-right"></div><div class="clearfix"></div></a></li>
		<li><a href="configuration.php" title="Configuration" data-toggle="collapse" data-target="#dashboard_dr"><div class="pull-left"><i class="fa fa-cog mr-20"></i><span class="right-nav-text">Configuration</span></div><div class="pull-right"></div><div class="clearfix"></div></a></li>
		<li class="user_management"><a href="javascript:void(0);" data-toggle="collapse" data-target="#user"><div class="pull-left"><i class="fa fa-user mr-20"></i><span class="right-nav-text">User Management</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
			<ul id="user" class="collapse collapse-level-1">
				<li class="add_user"><a href="add-user.php">Add User</a></li>						
				<li class="view_user"><a href="view-users.php">View User</a></li>						
			</ul>
		</li>
		<li class="purchase_management"><a href="javascript:void(0);" data-toggle="collapse" data-target="#purchase"><div class="pull-left"><i class="fa fa-truck mr-20"></i><span class="right-nav-text">Purchase Management</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
			<ul id="purchase" class="collapse collapse-level-1">
				<li class="tax_purchase"><a href="view-tax-purchase.php">Tax Purchase</a></li>						
				<li class="bill_of_supply"><a href="javascript:;">Bill of Supply</a></li>						
			</ul>
		</li>
		<li class="billing_management"><a href="javascript:void(0);" data-toggle="collapse" data-target="#billing"><div class="pull-left"><i class="fa fa-pencil-square mr-20"></i><span class="right-nav-text">Billing Management</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
			<ul id="billing" class="collapse collapse-level-1">
				<li class="tax_billing"><a href="view-tax-billing.php">Tax Billing</a></li>						
				<li class="bill_of_supply_billing"><a href="javascript:;">Bill of Supply</a></li>						
			</ul>
		</li>
		<li class="reports"><a href="javascript:void(0);" data-toggle="collapse" data-target="#reports"><div class="pull-left"><i class="fa fa-file mr-20"></i><span class="right-nav-text">Reports</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
			<ul id="reports" class="collapse collapse-level-1">
				<li class="monthly_purchase"><a href="monthly-purchase-report.php">Monthly Purchase</a></li>						
				<li class="monthly_sell"><a href="monthly-sales-report.php">Monthly Sell</a></li>	
				<li class="month_end_stock_report"><a href="monthly-end-stock-report.php">Month End Stock Report</a></li>
				<li class="current_stock_report"><a href="current-stock-report.php">Current Stock Report</a></li>
			</ul>
		</li>                    
		<li><a href="javascript:;" title="Logout" data-toggle="collapse" data-target="#dashboard_dr"><div class="pull-left"><i class="fa  fa-list-alt mr-20"></i><span class="right-nav-text">Backup</span></div><div class="pull-right"></div><div class="clearfix"></div></a></li>
		<li><a href="logout.php" title="Logout" data-toggle="collapse" data-target="#dashboard_dr"><div class="pull-left"><i class="fa  fa-power-off mr-20"></i><span class="right-nav-text">Logout</span></div><div class="pull-right"></div><div class="clearfix"></div></a></li>
		
	</ul>
</div>