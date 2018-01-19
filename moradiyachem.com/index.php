<!DOCTYPE html>

<html lang="en">

<head>
	<title>MORADIYA CHEMICALS</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

	<!-- Bootstrap CSS  -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css"/>

	<!-- css style -->
	<link rel="stylesheet" href="style/stylesheet.css" type="text/css"/>
	<script src="WOW-master/dist/wow.min.js"></script>
	<script type="text/javascript">
		var wow = new WOW( {
			boxClass: 'wow', // animated element css class (default is wow)
			animateClass: 'animated', // animation css class (default is animated)
			offset: 100, // default distance between the bottom of browser viewport and the top of hidden box.
			mobile: true, // trigger animations on mobile devices (default is true)
			live: true, // act on asynchronously loaded content (default is true)
			callback: function ( box ) {},
			scrollContainer: null
		} );
		wow.init();
	</script>
	<script>
		( function ( i, s, o, g, r, a, m ) {
			i[ 'GoogleAnalyticsObject' ] = r;
			i[ r ] = i[ r ] || function () {
				( i[ r ].q = i[ r ].q || [] ).push( arguments )
			}, i[ r ].l = 1 * new Date();
			a = s.createElement( o ),
				m = s.getElementsByTagName( o )[ 0 ];
			a.async = 1;
			a.src = g;
			m.parentNode.insertBefore( a, m )
		} )( window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga' );

		ga( 'create', 'UA-98199147-1', 'auto' );
		ga( 'send', 'pageview' );
	</script>
	<!-- js -->
	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/SmoothScroll.js"></script>
	<!-- Font Awesome CSS -->
	<!-- Font Awesome CSS -->
	<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css" type="text/css"/>

	<!-- Fancybox CSS -->
	<link rel="stylesheet" href="fancybox/source/jquery.fancybox.css" type="text/css" media="screen"/>

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

		<div class="carousel slide" id="mycarousel" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#mycarousel" data-side-to="0" class="active"></li>
				<li data-target="#mycarousel" data-side-to="1"></li>
			</ol>
			<div class="carousel-inner" role="listbox" style="margin-top:165px!important;">

				<div class="item active"> <img src="images/chemical2.jpg" alt="image"> </div>
				<div class="item"> <img src="images/chemical1.jpg" alt="image"> </div>
				<div class="item"> <img src="images/chemical3.jpg" alt="image"> </div>
			</div>
			<a class="left carousel-control" href="#mycarousel" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#mycarousel" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>

		<div class="container">
			<div class="section_team" style="padding-bottom:50px;margin-top:0px;">
				<div class="title_pricing">
					<h3 class="wow fadeInDown ht3" data-wow-duration="2s">MORADIYA CHEMICALS</h3>
					<p align="center" data-wow-duration="2s">Manufacturing Chemicals Since 2010</p>
				</div>
				<div class="b-hr-stars__group"> <i class="fa fa-industry"></i> <i class="fa fa-industry"></i> <i class="fa fa-industry"></i>
					<div class="rsow">
						<div class="col-md-12">

							<h4 class="ht4"> ABOUT MORADIYA CHEMICALS</h4>
							<hr>
						</div>
						<div class="col-md-12"> We take pleasure in introducing MORADIYA CHEMICALS as leading “Indenting Agents” (Established. -2010), engaged in manufacturing and distributing of pharmaceuticals Chemicals and Intermediates. For benefiting the humanity suffering from various diseases, we aim to provide our pharmaceutical drugs and formulations in all the parts of the world at affordable prices. These products are formulated using quality tested ingredients that are sourced from authentic vendors of the market. The offered range is certified from Good Manufacturing Practices(GMP) and WHO-GMP by the food and drug administration. Our ISO 9001-2008 certification is the prove of optimum quality products. Moreover, we have all the licenses that are required for processing drugs and chemicals. Our organization is facilitated with a sound infrastructure, quality inspecting and innovative R & D unit for smooth & systematic working of our business process. We are committed to the environment and carry out our various activities in an environmentally friendly manner. Moreover, we have been able to provide the right product at the right place due to our well-developed transportation network.
							<hr>
						</div>
						<div class="content_info"> </div>
					</div>
				</div>
			</div>
			<p id="products">&nbsp;</p>
		</div>


		<?php include('products.php');?>
		<div class="section_partner" style="padding-bottom: 1px;">
			<div class="partner_img wow fadeInUp" data-wow-duration="1s">
				<center>
					<div class="partner_img wow fadeInUp" data-wow-duration="1s">
						<h3 class="wow fadeInDown" data-wow-duration="2s">&nbsp;</h3>
						<p data-wow-duration="2s">&nbsp;</p>
						<h3 class="wow fadeInDown ht3" data-wow-duration="2s">Our Sister Company</h3>
						<h4 class="wow fadeInDown ht4" data-wow-duration="2s">Partners We Work With</h4>
						<h5 class="wow fadeInDown ht5" data-wow-duration="3s">Our sister company concern trending company in out of India this is name of as </h5>
						<br>
						<img src="images/hplogo.png" alt="image" width=100 height=101> <br>
						<br>
						<h4 class="wow fadeInUp ht4" data-wow-duration="1s" style="margin-top:0px;">HP Chemicals, LLC</h4>
					</div>
				</center>
			</div>
		</div>
		<?php include('footer.php');?>
	</div>


	
</body>

</html>