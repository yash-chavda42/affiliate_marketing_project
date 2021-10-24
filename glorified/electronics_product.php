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
	<?php
		include "product_header.php";
	?>
	<div class="shipping text-center"><!--shipping-->
		<a href="https://ekaro.in/enkr20211006s5597528">
		<img src="add/sofa1.webp" alt="" /></a>
	</div><!--/shipping-->
					
	</div>
		</div>
			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">Recommended Items</h2>
				
	<?php
		 include("pagination/function.php");
		 $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
		 $limit = 9; //if you want to dispaly 10 records per page then you have to change here
		 $startpoint = ($page * $limit) - $limit;
		 $statement = "product_table"; //you have to pass your query over here
	 
		$q = mysqli_query($con,"select * from {$statement} LIMIT {$startpoint} , {$limit}");
		while($row=mysqli_fetch_array($q)){
            if($row["p_catagory"]=="Electronics"){
	?>
	
			<div class="col-sm-4">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">								
							<img src="product_image/<?php echo $row["p_image"]; ?>" alt="" width="315" height="350" /><br><br>
							<p><?php echo $row["p_name"];?></p>
							<a href="<?php echo $row["p_link"];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Shop From <?php echo $row["p_site"];?></a>
						</div>
					</div>
				</div>
			</div>
	<?php
        }}
	?>				
					</div><!--features_items-->
						<br><ul class="pagination" >
							<?php
								echo pagination($statement,$limit,$page);
							?>						
						</ul>
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
	

  
</body>
</html>