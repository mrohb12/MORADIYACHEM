<?php 
include("include/config.php"); 
$userInfo = $_SESSION['BLData'];

// create an array for package_modules information
$qryPackageModules = mysqli_query($conn,"SELECT  * FROM package_modules WHERE package_id ='".$_REQUEST['id']."'");
$arrPackageModuleInfo = array();
if(mysqli_num_rows($qryPackageModules) > 0) {
	while ($packageModuleInfo = mysqli_fetch_array($qryPackageModules)) {
		$arrPackageModuleInfo = $packageModuleInfo['modules'];
	}
}
$arrPackageModules = json_decode($arrPackageModuleInfo,true);

// create an array for package information
$qryPackageInfo = mysqli_query($conn,"SELECT  * FROM packages WHERE status = 1");
$arrPackageNameListInfo = array();
if(mysqli_num_rows($qryPackageInfo) > 0) {
	while ($packageInfo = mysqli_fetch_array($qryPackageInfo)) {
		$arrPackageNameListInfo[$packageInfo['id']] = $packageInfo['name'];
	}
}
// create an array for page_categories information
$qryPageCategory = mysqli_query($conn,"SELECT  * FROM page_categories WHERE (endeffdate IS NULL OR endeffdate ='NULL' OR endeffdate='0000-00-00') AND status = 1");
$arrPageCategoryInfo = array();
if(mysqli_num_rows($qryPageCategory) > 0) {
	while ($pagecatInfo = mysqli_fetch_array($qryPageCategory)) {
		$arrPageCategoryInfo[$pagecatInfo['id']] = $pagecatInfo['category_name'];
	}
}
// create an array for pages information
$qryPage = "SELECT  * FROM pages WHERE (endeffdate IS NULL OR endeffdate ='NULL' OR endeffdate='0000-00-00') AND status = 1";
$qryPage = mysqli_query($conn,$qryPage);
$arrPageInfo = array();
if(mysqli_num_rows($qryPage) > 0) {
	while ($pageInfo = mysqli_fetch_array($qryPage)) {
		$arrPageInfo[$pageInfo['category_id']] = $pageInfo;
	}
}

?>
<div class="col-sm-12">
	<div class="card-box table-responsive">
		<h4 class="m-t-0 header-title"><b>Assign Packages</b></h4>
		<?php 
				if(isset($_REQUEST['required']) && !empty($_REQUEST['required'])){
					if($_REQUEST['required'] == 'DSC') {?>
						 <div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
							<i class="mdi mdi-check-all"></i>
							Record Deleted Successfully.</div><?php 
					}
					elseif($_REQUEST['required'] == 'NDSC') {?>
						 <div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
							<i class="mdi mdi-block-helper"></i>
							Record Not Deleted Successfully.
						</div><?php 
					}
					elseif($_REQUEST['required'] == 'SC' ) {?>
						 <div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
							<i class="mdi mdi-check-all"></i>
							Package Rights Updated Successfully.</div><?php 
					}
					elseif($_REQUEST['required'] == 'NUSC') {?>
						 <div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
							<i class="mdi mdi-block-helper"></i>
							Package Rights Not Updated Successfully.
						</div><?php 
					}
				}
				?>
				
				<?php 
				foreach($arrPageCategoryInfo as $key => $value){
					$qryPage = mysqli_query($conn,"SELECT  * FROM pages WHERE (endeffdate IS NULL OR endeffdate ='NULL' OR endeffdate='0000-00-00') AND category_id= '".$key."' AND status = 1");
					$arrPageInfo = array();
					if(mysqli_num_rows($qryPage) > 0) {
						?><div class="col-lg-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">
										<div class="checkbox checkbox-primary"><?php 
											$checked = "";
											if (array_key_exists($key,$arrPackageModules)) {
												$checked = "checked";
											}
											?><input id="chkCatName<?php print($key);?>" class="categoryChange" type="checkbox" name="chkCatName[]" value="<?php print($key);?>" <?php print($checked);?> >
											<label for="chkCatName<?php print($key);?>">
												<?php print($value);?>
											</label>
										</div>
									</h3>
								</div>
								<div class="panel-body">
								<?php 
									$i = 0;
									while ($pageInfo = mysqli_fetch_array($qryPage)) {
										$arrPageValues = explode(",",$arrPackageModules[$key])
										?>
										 <div class="col-sm-6">
											<div class="checkbox checkbox-primary"><?php 
											$checked = "";
											if ($arrPageValues[$i] == $pageInfo['id']) {
												$checked = "checked";
											}
											?>
												<input id="chkPageName<?php print($pageInfo['id']); ?>" data-superid="<?php print($key);?>" type="checkbox" name="chkPageName<?php print($key);?>[]" class="chkPageName<?php print($key);?> subCategoryChange" value="<?php print($pageInfo['id']); ?>" <?php print($checked);?>>
												<label for="chkPageName<?php print($pageInfo['id']); ?>">
													<?php print($pageInfo['pagename']);?>
												</label>
											</div>
										</div><?php 
										$i++;
									}
									?>
								</div>
							</div>
						</div><?php 
					}
				}
				?>
		 <div class="col-sm-12 col-xs-12 col-md-12 " style="width:94%; margin-top:20px;">
			<div class="form-group row text-center m-b-0">
				<input type="submit" name="update" id="update" class="btn btn-success w-md" value="Update" title="Update">
			</div>
		</div>	
	</div>
</div>
	
