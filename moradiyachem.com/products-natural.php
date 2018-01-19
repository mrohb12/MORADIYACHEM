<!DOCTYPE html>

<html lang="en">
<head>
<title>MORADIYA CHEMICALS</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<!-- Bootstrap CSS  -->
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" />

<!-- css style -->
<link rel="stylesheet" href="style/stylesheet.css" type="text/css" />

<!-- js -->
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

<!-- Font Awesome CSS -->
<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css" type="text/css" />

<!-- Fancybox CSS -->
<link rel="stylesheet" href="fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />

<!-- Fancybox pack js -->
<script type="text/javascript" src="fancyBox/source/jquery.fancybox.pack.js"></script>

<!-- wow.js pack css -->
<link rel="stylesheet" href="WOW-master/css/libs/animate.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

<!-- Full Body Container -->
<div id="main_container">
  <?php include('header.php');?>
    
    <!-- Start  Logo & Naviagtion  -->
    
  <div class="container" >
    <div class="section_team" style="padding-bottom:50px;margin-top:0px;">
     
        <div class="col-md-9 col-sm-6 col-xs-12" style="padding-left:0px; margin-top:165px;">
          <h1 class="active_menu">Natural Products</h1>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-3 col-xs-12">
            <div class="price_table">
              <div class="plan_price">
                <div class="plan_name">
                  <h3> Product Name</h3>
                </div>
              </div>
              <div class="plan_list">
                <ul >
                  <li><strong>Neem oil</strong></li>
                  <li><strong>Curcumin Powder</strong></li>
                  <li><strong>Iodine</strong></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-3 col-xs-12">
            <div class="price_table">
              <div class="plan_name">
                <h3>CAS No</h3>
              </div>
              <div class="plan_list">
                <ul>
                  <li><strong>8002-65-1</strong></li>
                  <li><strong>458-37-7</strong></li>
                  <li><strong>7553-56-2</strong></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
     
  </div>
 <?php include('footer.php');?>
  </div>
</div>
<!--end contact details --> 
<script src="WOW-master/dist/wow.min.js"></script> 
<script type="text/javascript">
			var wow = new WOW(
			{
				boxClass:     'wow',      // animated element css class (default is wow)
				animateClass: 'animated', // animation css class (default is animated)
				offset:       100,          // default distance between the bottom of browser viewport and the top of hidden box.
				mobile:       true,       // trigger animations on mobile devices (default is true)
				live:         true,       // act on asynchronously loaded content (default is true)
				callback:     function(box) {},
				scrollContainer: null 			
			});
			wow.init();
			
		</script></div>
</body>
</html>