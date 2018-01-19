<?php  

if(isset($_SESSION['success']) && $_SESSION['success']!="" )
{ ?>
<div class="page-content-wrap"> <div class="row" ><div class="col-md-12">
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <?php echo $_SESSION['success']; ?>
    </div> </div>
</div></div>

<?php unset($_SESSION['success']);
}

if(isset($_SESSION['error']) && $_SESSION['error']!="" )
{ ?>
<div class="page-content-wrap"> <div class="row" ><div class="col-md-12">
	<div class="alert alert-danger" role="alert">
    	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
   		<?php echo $_SESSION['error']; ?>
	</div>    </div>
</div></div>
<?php 	unset($_SESSION['error']);
}
?>