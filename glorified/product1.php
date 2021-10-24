<?php
    $con = mysqli_connect("localhost","root","","login_db");	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Products</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <link href="pagination/css/pagination.css" rel="stylesheet" type="text/css" />
    <link href="pagination/css/A_green.css" rel="stylesheet" type="text/css" />
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="rowa">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a style="font-size: 40px;" href="product1.php">YourStore</a>
						</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="rowa">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1>Myntra</h1>
									<h2>EPIC FASHION SALE</h2>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="photos/myof7.webp" class="girl img-responsive" alt="" />
									<!--<img src="images/home/pricing.png"  class="pricing" alt="" />-->
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1>Myntra</h1>
									<h2>EPIC FASHION SALE</h2>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="photos/myof4.png" class="girl img-responsive" alt="" />
									<!--<img src="images/home/pricing.png"  class="pricing" alt="" />-->
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1>Amazone</h1>
									<h2>Free Delivery</h2>
									<p>OnePlus 9 5G (Arctic Sky, 8GB RAM, 128GB Storage) I Additional upto INR7000 off on Exchange </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="photos/amof2.jfif"  class="girl img-responsive" alt=""/>
									<!--<img src="images/home/pricing.png" class="pricing" alt="" />-->
								</div>
							</div>
							
						</div>

						

						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="rowa">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="product1.php">ALL</a></h4>
								</div>
							</div>	
							<?php

								$q1 = mysqli_query($con,"select p_id,p_catagory from product_table group by p_catagory");
									
								while($rowm=mysqli_fetch_array($q1)){
							?>	
									<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title"><a href="product1.php?cata_id=<?php echo $rowm["p_catagory"]; ?>"><?php echo $rowm["p_catagory"]; ?></a></h4>
											</div>
									</div>
							<?php
									}
							?>


						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="product1.php"> <span class="pull-right"></span>ALL</a></li>
									<?php
										$q1 = mysqli_query($con,"select p_id,p_brand from product_table group by p_brand");	
										while($rowm=mysqli_fetch_array($q1)){
									?>
									<li><a href="product1.php?brand_id=<?php echo $rowm["p_brand"]; ?>"> <span class="pull-right"></span><?php echo $rowm["p_brand"]; ?></a></li>
									<?php
										}
									?>

								</ul>
							</div>
						</div>
					</div>
				</div>
			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">Recommended Items</h2>
				
	<?php
		$q = mysqli_query($con,"select * from product_table");
		while($rowa=mysqli_fetch_array($q)){
		if(isset($_GET['cata_id'])){
			$catagoryname=$_GET['cata_id'];

			if(strtoupper($rowa["p_catagory"])==strtoupper($catagoryname)){		
	?>
			<div class="col-sm-4">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">								
							<img src="product_image/<?php echo $rowa["p_image"]; ?>" alt="" width="315" height="350" /><br><br>
							<p><?php echo $rowa["p_name"];?></p>
							<a href="<?php echo $rowa["p_link"]; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Shop From <?php echo $rowa["p_site"]; ?></a>
						</div>
					</div>
				</div>
			</div>
	<?php
		}
		}else if(isset($_GET['brand_id'])){
			$brandname=$_GET['brand_id'];
			if(strtoupper($rowa["p_brand"])==strtoupper($brandname)){	?>
				<div class="col-sm-4">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">								
							<img src="product_image/<?php echo $rowa["p_image"]; ?>" alt="" width="315" height="350" /><br><br>
							<p><?php echo $rowa["p_name"];?></p>
							<a href="<?php echo $rowa["p_link"]; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Shop From <?php echo $rowa["p_site"]; ?></a>
						</div>
					</div>
				</div>
			</div>	
	<?php
		}}else{
	?>
		<div class="col-sm-4">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">								
							<img src="product_image/<?php echo $rowa["p_image"]; ?>" alt="" width="315" height="350" /><br><br>
							<p><?php echo $rowa["p_name"];?></p>
							<a href="<?php echo $rowa["p_link"]; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Shop From <?php echo $rowa["p_site"]; ?></a>
						</div>
					</div>
				</div>
			</div>
	<?php			
	}
	}
	?>				
					</div><!--features_items-->
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<!--<h2><span>e</span>-shopper</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe1.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe2.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe3.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe4.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="images/home/map.png" alt="" />
							<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		--><!--
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Affiliate@EASE</h2>
							<ul class="nav nav-pills nav-stacked">
								<li>Marwadi University, Morbi Highway, Rajkot Gujarat, India.</li>
								<li>(+91) 9727622124 <br> (+91) 9574424242</li>
								<li>yourstore1010@gmail.com</li>
							</ul>
						</div>
					</div>

					<div class="col-lg-2 col-md-6 col-12 atf-footer-link wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
							<h5>Quick Links</h5>
							<ul class="atf-list-menu">-->
								<!---<li> <a href="#"><i class="fas fa-angle-right mr-2"></i>Get Stared</a></li>
								<li> <a href="#"><i class="fas fa-angle-right mr-2"></i>Our Team</a></li>
								<li> <a href="#"><i class="fas fa-angle-right mr-2"></i>About Us</a></li>
								<!--<li> <a href="#"><i class="fas fa-angle-right mr-2"></i>Need Helps</a></li>
								<li> <a href="#"><i class="fas fa-angle-right mr-2"></i>Blogs</a></li>-->
							</ul>
					</div><!--- END COL -->
					<!--<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quick Links</h2>
							<ul class="nav nav-pills nav-stacked">
								<li> <a href="#"><i class="fas fa-angle-right mr-2"></i>Our Team</a></li>
								<li> <a href="#"><i class="fas fa-angle-right mr-2"></i>About Us</a></li>          <!--Quick links original
								<li> <a href="#"><i class="fas fa-angle-right mr-2"></i>Need Helps</a></li>
								<li> <a href="#"><i class="fas fa-angle-right mr-2"></i>Blogs</a></li>
							</ul>
						</div>
					</div>-->

					<div class="col-lg-2 col-md-6 col-12 atf-footer-link wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s" data-wow-offset="0">
								<!--<h5>Support Links</h5>
								<ul class="atf-list-menu">
									<li><a href="#"><i class="fas fa-angle-right mr-2"></i>Our Terms</a></li>
									<li><a href="#"><i class="fas fa-angle-right mr-2"></i>Our Service</a></li>
									<li><a href="#"><i class="fas fa-angle-right mr-2"></i>Privacy Policy</a></li>
									<li><a href="#"><i class="fas fa-angle-right mr-2"></i>Contact Us</a></li>
									<li><a href="#"><i class="fas fa-angle-right mr-2"></i>Our News</a></li>
								</ul>-->
							</div>
					<!--<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privecy Policy</a></li>                                               <!--Terms of use original
								<li><a href="#">Refund Policy</a></li>
								<li><a href="#">Billing System</a></li>
								<li><a href="#">Ticket System</a></li>
							</ul>
						</div>
					</div>-->

					<!--<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								<li><a href="#">Affillate Program</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
				-->
					<!--<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>Get Updated through</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Email Address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>-->
					
				</div>
			</div>
		</div>
			
		<!--<div class="footer-bottom">-->
			<div class="container">
				<div class="row">
					<!--<p class="pull-left">Copyright - All Right Reserved.Designed</p>-->
					<!--<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>-->
					<!--<p>&copy;Copyright - All Right Reserved.Designed <i class="fa fa-heart ml-1 mr-1"></i> by <a href="#">Affiliate@EASE Family</a> </p>-->
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>

  
</body>
</html>