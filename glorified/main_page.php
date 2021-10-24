<?php
    session_start();
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	//Load Composer's autoloader
	require 'vendor/autoload.php';

	include "config.php";
	if(isset($_POST['touch'])){
        $email=$_POST['email2'];
		$q1 = mysqli_query($con, "select * from signup_table where u_email='{$email}'" ) 
    	or die(mysqli_error($con));
	    $result1 = mysqli_fetch_array($q1);
		$num_rows1 = mysqli_num_rows($q1);    
    	if($result1){
			//Create an instance; passing `true` enables exceptions
			$mail = new PHPMailer(true);

			try {
				//Server settings
				$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
				$mail->isSMTP();                                            //Send using SMTP
				$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
				$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
				$mail->Username   = 'yourstore1010@gmail.com';                     //SMTP username
				$mail->Password   = 'yourstore@thriwin';                               //SMTP password
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
				$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

				//Recipients
				$mail->setFrom('yourstore1010@gmail.com', 'ys');
				$mail->addAddress($email, 'yash');     //Add a recipient
				

					//Add attachments
				$q = mysqli_query($con, "select * from subscriber where u_email='{$email}'" ) 
				or die(mysqli_error($con));
				$result = mysqli_fetch_array($q);
				$num_rows = mysqli_num_rows($q); 
				
				//Content
				if($num_rows >= 1){
					$mail->isHTML(true);                                  //Set email format to HTML
					$mail->Subject = 'Already Subscribed';
					$mail->Body    = 'Hey User...<br>You have already subscribed YourStore for latest updates and offers';
					$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	
				}else{
					$mail->isHTML(true);                                  //Set email format to HTML
					$mail->Subject = 'For Latest Updates';
					$mail->Body    = 'Hey User...<br>Thanks for subscribing YourStore. All the latest offers of different brands and updates will be provided through this mail.';
					$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
					$q1 = mysqli_query($con,"insert into subscriber (u_email) VALUES 
					('{$email}')") or die(mysqli_error($con));
			

				}
				
				$mail->send();
				echo 'Message has been sent';
			} catch (Exception $e) {
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}header("location:main_page.php");		
    	}else{
			header("location:signin1.php");
		}

	}
?>
<!DOCTYPE html>
<html lang="zxx">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<!-- SITE TITLE -->
		<title>Affiliate Marketing</title>
		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
		
		<!-- Latest Bootstrap min CSS -->
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">	
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500&display=swap" rel="stylesheet">	
		<!-- Font Awesome CSS -->
		<link rel="stylesheet" href="assets/fonts/font-awesome.css">
		<!--magnific-popup Css-->
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
		<!--animate Css-->
        <link rel="stylesheet" href="assets/css/animate.css">
		<!--slick Css-->
        <link rel="stylesheet" href="assets/css/slick.css">
		<!-- Style CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
		<!-- Responsive CSS -->
		<link rel="stylesheet" href="assets/css/responsive.css">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't gallery if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>
		<!--Front page template-->
		<!-- Page Wrapper -->
		<div class="page-wrapper">
		
			<!-- START PRELOADER -->
			<div class="atf-preloader">
				<div class="atf-status">
					<div class="atf-status-mes"></div>
				</div>
			</div> 
			<!-- END PRELOADE -->	
			
			<!-- START back-to-top -->	
			<button class="atf-scroll-top atf-back-to-top" data-targets="html">
				<i class="fa fa-angle-up atf-scrollup-icon"></i>
			</button>
			<!-- END back-to-top-->	
		
			<!-- Start Header Section -->
			<header class="atf-site-header atf-style1 atf-sticky-header">
				<div class="atf-top-header">
					<div class="container">
						<div class="row">
							<div class="col-lg-8 col-md-8">
								<div class="atf-top-header-in wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0">
									<ul class="atf-top-header-list">
										<li><i class="fas fa-envelope"></i>Email: <a href="#">yourstore1010@gmail.com</a></li>
										<li><i class="fas fa-phone-volume"></i>Contact: <a href="#">9727622124</a></li>
									</ul>
								</div>
							</div><!--- END COL -->
							<div class="col-lg-4 col-md-4">
								<div class="nav-right-part nav-right-part-desktop">
									<ul>
										<li><a class="search header-search" href="#"><i class="fa fa-search"></i></a></li>
										<?php
                                            //session_start();
                                            if(isset($_SESSION['id'])){
                                                echo "<li><a class='login-btn' href='logout.php')>Logout</a></li>";
                                            }else{
                                                    echo "<li><a class='login-btn' href='signin1.php'>Login</a></li>";
                                            }
                                            ?>
                                        <li><a class="shopping-cart-btn" href="#"><i class="fa fa-shopping-cart"></i><span>2</span></a></li>
									</ul>
								</div>
							</div><!--- END COL -->
						</div><!--- END ROW -->
					</div><!--- END CONTAINER -->
				</div><!--- END TOP HEADER -->
				
				<div class="atf-main-header">
					<div class="container">
						<div class="atf-main-header-in">
							<div class="atf-main-header-left">
								<!--<a class="atf-site-branding atf-white-logo" href="index.html"><img src="assets/img/logo.png" alt="Logo"></a>-->
								<!---<a class="atf-site-branding atf-white-logo" href="index.html">AFFILIATE@EASE</a>--->
								<a style="font-size: 40px;" href="main_page.php">YourStore</a>

							</div>
                            <!-- MOBILE VIEW 
							 <div class="nav-right-part nav-right-part-mobile">
								<ul>
									<li><a class="search header-search" href="#"><i class="fa fa-search"></i></a></li>
									<li class=""><a class="login-btn" href="#">Login</a></li>
									<li><a class="shopping-cart-btn" href="#"><i class="fa fa-shopping-cart"></i><span>2</span></a></li>
								</ul>
							</div>
                             -->
							<div class="atf-main-header-right">
								<div class="atf-nav">
									<ul class="atf-nav-list atf-onepage-nav">
										<li><a href="#home" class="atf-smooth-move">Home</a>

										</li>
										<li class="menu-item-has-children"><a href="#" class="atf-smooth-move">Explore<i class="fa fa-chevron-down ml-2"></i></a>
											<ul>
												<li><a href="contact.html">Promote</a></li>
												<li><a href="error.html">Services</a></li>
												<li><a href="blog.html">Blogs</a></li>
												<li><a href="blog.html">Forgot Password</a></li>
											</ul>
										</li>
										<li><a href="https://www.templatemonster.com/website-templates/al-majid-website-template-152091.html?_gl=1*1ley0u6*_ga*NDMyOTM1NTcxLjE2MTAxOTczNjQ.*_ga_FTPYEGT5LY*MTYxMDI4NzgyNS4zLjAuMTYxMDI4NzgzMS41NA..&_ga=2.145900727.2005536284.1610210101-432935571.1610197364">Give Ad</a></li>
									</ul><!--- END NAV -->
								</div>
							</div><!--- END MAIN HEADER RIGHT -->
						</div>
					</div><!--- END CONTAINER -->
				</div><!--- END MAIN HEADER -->
			</header>
			<!-- End Header Section -->
			
			
		
			<!-- START HOME -->
			<section id="home">
				<div class="atf-slider atf-style1 atf-hero-slider1 atf-hero-slider2">
					<div class="slick-container" data-autoplay="0" data-loop="1" data-speed="800" data-autoplay-timeout="1000" data-center="0" data-slides-per-view="1" data-fade-slide="1">


						<div class="slick-wrapper">
							<div class="slick-slide-in">						
							<div class="atf-single-home atf-hero-area" style="background-image: url(assets/img/banner/3.jpg);  background-size:cover; background-position: center center;">
									<div class="atf-home-overlay">
										<div class="container">
											<div class="row atf-single-slide-sm2 atf-align-items-details align-items-center atf-single-text justify-content-center">
												 <!--LEFT COL-->
												<div class="col-xl-6 col-lg-6 col-12 text-center atf-single-details ">
													<h5 class="mb-0 d-block d-lg-block text-white">Shop Now</h5>
													<h2 class="mb-0 d-block d-lg-block"> Best Collection Offers of Different Brands</h2>
													<p class="pr-lg-5">A Collection of variety of products ranging from different prices</p>
													<!-- Main-btn -->
													<div class="atf-main-btn mt-3"> 
														<?php
			                    	                        //session_start();
            			            	                    if(isset($_SESSION['id'])){
																echo "<a href='product1.php' class='page-scroll atf-themes-btn mr-4'>See Products<i  class='fa fa-angle-right'></i></a>";
																echo "<a href='giveadd.php' class='page-scroll atf-themes-btn mr-4'>Give Ad<i  class='fa fa-angle-right'></i></a>";

															}else{
																echo "<a href='signin1.php' class='page-scroll atf-themes-btn mr-4'>See Products<i  class='fa fa-angle-right'></i></a>";
																echo "<a href='signin1.php' class='page-scroll atf-themes-btn mr-4'>Give Ad<i  class='fa fa-angle-right'></i></a>";

															}
                                            			?>

													</div>
												</div><!--- END COL -->
											</div><!--- END ROW -->
										</div><!--- END CONTAINER -->
									</div><!--- END Overlay -->			
								</div><!--- END slide -->			
							</div><!-- .slick-slide-in -->
							
							<div class="slick-slide-in">						
								<div class="atf-single-home atf-hero-area" style="background-image: url(assets/img/banner/3.jpg);  background-size:cover; background-position: center center;">
									<div class="atf-home-overlay">
										<div class="container">
											<div class="row atf-single-slide-sm2 atf-align-items-details align-items-center atf-single-text justify-content-center">
												 <!--LEFT COL-->
												<div class="col-xl-6 col-lg-6 col-12 text-center atf-single-details ">
													<h5 class="mb-0 d-block d-lg-block text-white"> Shop Now</h5>
													<h2 class="mb-0 d-block d-lg-block"> Best Collection Offers of Different Brands</h2>
													<p class="pr-lg-5"> A Collection of variety of products ranging from different prices</p>
													<!-- Main-btn -->
													<div class="atf-main-btn mt-3"> 
													<?php
			                    	                        //session_start();
            			            	                    if(isset($_SESSION['id'])){
																echo "<a href='product1.html' class='page-scroll atf-themes-btn mr-4'>See Products<i  class='fa fa-angle-right'></i></a>";
																echo "<a href='giveadd.php' class='page-scroll atf-themes-btn mr-4'>Give Ad<i  class='fa fa-angle-right'></i></a>";

															}else{
																echo "<a href='signin1.php' class='page-scroll atf-themes-btn mr-4'>See Products<i  class='fa fa-angle-right'></i></a>";
																echo "<a href='signin1.php' class='page-scroll atf-themes-btn mr-4'>Give Ad<i  class='fa fa-angle-right'></i></a>";

															}
                                            			?>														
													</div>
												</div><!--- END COL -->
											</div><!--- END ROW -->
										</div><!--- END CONTAINER -->
									</div><!--- END Overlay -->			
								</div><!--- END slide -->			
							</div><!-- .slick-slide-in -->
							
							<div class="slick-slide-in">						
								<div class="atf-single-home atf-hero-area" style="background-image: url(assets/img/banner/2.jpg);  background-size:cover; background-position: center center;">
									<div class="atf-home-overlay">
										<div class="container">
											<div class="row atf-single-slide-sm2 atf-align-items-details align-items-center atf-single-text justify-content-center">
												 <!--LEFT COL-->
												<div class="col-xl-6 col-lg-6 col-12 text-center atf-single-details ">
													<h5 class="mb-0 d-block d-lg-block text-white">Trending Now</h5>
													<h2 class="mb-0 d-block d-lg-block"> Best Promo Offer Chair Your Collection.</h2>
													<p class="pr-lg-5"> A Collection of variety of products ranging from different prices</p>
													<!-- Main-btn -->
													<div class="atf-main-btn mt-3"> 
													<?php
			                    	                        //session_start();
            			            	                    if(isset($_SESSION['id'])){
																echo "<a href='product1.html' class='page-scroll atf-themes-btn mr-4'>See Products<i  class='fa fa-angle-right'></i></a>";
																echo "<a href='giveadd.php' class='page-scroll atf-themes-btn mr-4'>Give Ad<i  class='fa fa-angle-right'></i></a>";
                                            				}else{
																echo "<a href='signin1.php' class='page-scroll atf-themes-btn mr-4'>See Products<i  class='fa fa-angle-right'></i></a>";
																echo "<a href='signin1.php' class='page-scroll atf-themes-btn mr-4'>Give Ad<i  class='fa fa-angle-right'></i></a>";

                                            				}
                                            			?>	
													</div>
												</div><!--- END COL -->
											</div><!--- END ROW -->
										</div><!--- END CONTAINER -->
									</div><!--- END Overlay -->			
								</div><!--- END slide -->			
							</div><!-- .slick-slide-in -->
						</div>
					</div><!-- .slick-container -->
					
					<div class="pagination atf-style1 container"></div> <!-- If dont need Pagination then add class .atf-hidden -->
					<div class="swipe-arrow atf-style1 atf-hidden"> <!-- If dont need navigation then add class .atf-hidden -->
						<div class="slick-arrow-left"><i class="fa fa-angle-left"></i></div>
						<div class="slick-arrow-right"><i class="fa fa-angle-right"></i></div>
					</div>
				</div><!-- .atf-slider -->
			</section>
			<!-- END  HOME DESIGN -->
			
			
			
			<!-- Special Offer Area -->
			<div class="atf-special-offer atf-section-padding pb-0">
				<div class="container">
					<div class="row">
						<div class="col-xl-7 col-lg-6 col-12 text-left"> 
							<div class="atf-special-content atf-section-title  mx-auto my-auto">	
								<h4 class="mb-2">Get Great Discounts...  </h4>
								<h2>Best Promo Offer For Your</h2>
								<p class="pr-lg-5">Grab the best product offers approaching to you within no time and get fantastic discounts on the products you purchase. The product ranges from very low price to affordable so that customers can make better choice.</p>	
								
								<h4 class="mt-5">Expire On</h4>															
								<div id="countdown" class="text-center"></div>	
								<div class="clearfix"></div>
							</div>
							<div class="atf-main-btn mt-5 pb-5 d-lg-block"> <br/>
								<a href="#" class="page-scroll atf-themes-btn">See Products<i class="fa fa-angle-right"></i></a>
							</div>	
						</div><!--- END COL -->
						
						<div class="col-xl-5 col-lg-6 col-12">
							<div class="atf-special-img text-center  mx-auto my-auto">						
								<div class="atf-single-special-img">
									<img src="assets/img/special.png" width="370" alt="Offer Image" class="img-fluid">
								</div>
							</div>
						</div>	<!--- END COL -->
					</div><!--- END ROW -->
				</div><!--- END CONTAINER -->
			</div> <!-- End Special Offer Area -->
			
			
			
			<!-- START SERVICE SECTION  -->
			<section id="service" class="atf-service-area atf-section-padding">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-4 col-md-6">
							<div class="atf-single-service-wrap text-center">
								<div class="atf-single-service-wrap">
									<div class="atf-services-icon text-center mb-4">
										<i class="fas fa-shipping-fast"></i>
									</div>
									<div class="atf-service-content">
										<h3>Free Shipping</h3>
										<p>There will not be any charges taken on the order of any product from user if product is purchased from here.</p>
									</div>
								</div>
							</div>   
						</div>
						
						<div class="col-lg-4 col-md-6">
							<div class="atf-single-service-wrap text-center">
								<div class="atf-single-service-wrap">
									<div class="atf-services-icon text-center mb-4">
										<i class="fas fa-envelope-open-text"></i>
									</div>
									<div class="atf-service-content">
										<h3>24/7 support</h3>
										<p>Website provides support all time to the users and can reach out to us for any query through Contact Us page.</p>
									</div>
								</div>
							</div>   
						</div>
						
						<div class="col-lg-4 col-md-6">
							<div class="atf-single-service-wrap text-center">
								<div class="atf-single-service-wrap">
									<div class="atf-services-icon text-center mb-4">
										<i class="fas fa-money-bill-alt"></i>
									</div>
									<div class="atf-service-content">
									<h3>Versatality</h3>
										<p>Product of all types are available at affordable rates so that customers can make better choice.</p>
									</div>
								</div>
							</div>   
						</div>
					</div>
				</div>
			</section>
			<!-- Service-Area End-->
			
			
			
			<!-- START COMPANY BRAND LOGO  -->
			<div id="atf-brand-area" class="atf-brand-area atf-section-padding">
				<div class="atf-brand-overlay">
					<div class="container">
						<div class="atf-slider atf-style2">
							<div class="slick-container" data-autoplay="0" data-loop="1" data-speed="600" data-center="0"  data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="3" data-md-slides="3" data-lg-slides="5" data-add-slides="3">
								<div class="slick-wrapper">
									<div class="slick-slide-in">
										<div class="atf-brand-activem1">
											<a href="https://ekaro.in/enkr20210924s5113127"><img src="photos/m1.png" alt="image"></a>
										</div>
									</div><!-- .slick-slide-in -->
									
									<div class="slick-slide-in">
										<div class="atf-brand-activep1">
											<a href="https://ekaro.in/enkr20210924s5113359"><img src="photos/p1.png" alt="image"></a>
										</div>
									</div><!-- .slick-slide-in -->
									
									<div class="slick-slide-in">
										<div class="atf-brand-activer1">
											<a href="https://ekaro.in/enkr20210924s5113503"><img src="photos/r1.png" alt="image"></a>
										</div>
									</div><!-- .slick-slide-in -->
									<div class="slick-slide-in">
										<div class="atf-brand-activead1">
											<a href="https://ekaro.in/enkr20210924s5113419"><img src="photos/ad1.png" alt="image"></a>
										</div>
									</div><!-- .slick-slide-in -->
									<div class="slick-slide-in">
										<div class="atf-brand-activef1">
											<a href="https://ekaro.in/enkr20210924s5113265"><img src="photos/f1.png" alt="image"></a>
										</div>
									</div><!-- .slick-slide-in -->
									
									<div class="slick-slide-in">
										<div class="atf-brand-activen1">
											<a href="https://ekaro.in/enkr20210924s5113308"><img src="photos/n1.png" alt="image"></a>
										</div>
									</div><!-- .slick-slide-in -->
									
									<div class="slick-slide-in">
										<div class="atf-brand-activea1">
											<a href="#"><img src="photos/a1.png" alt="image"></a>
										</div>
									</div><!-- .slick-slide-in -->
									
								</div><!-- .slick-slide-Wrapper -->
							</div><!-- .slick-container -->
							
							<div class="pagination atf-style1 atf-flex atf-hidden"></div> <!-- If dont need Pagination then add class .atf-hidden -->
							<div class="swipe-arrow atf-style1"> <!-- If dont need navigation then add class .atf-hidden -->
								<div class="slick-arrow-left"><i class="fa fa-chevron-left"></i></div>
								<div class="slick-arrow-right"><i class="fa fa-chevron-right"></i></div>
							</div>
						</div><!-- .atf-slider -->
					</div><!-- .container -->	
				</div><!-- END OVERLAY -->
			</div>
			<!-- END COMPANY BRAND LOGO -->
			
			
			
			
		   
		   
		   <!-- START NEWSLETTER -->
			<section  class="atf-newsletter atf-section-padding">
				<div class="container">
					<div class="row clearfix justify-content-center">
						<div class="col-xl-6 col-lg-6 col-12 text-center wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
							<div class="atf-mailchamp-headding">
								<h2>Subcribe Today for Latest Offers</h2>
							</div>
						</div><!-- END COL -->
							<div class="col-xl-6 col-lg-6 col-12 text-center wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0">	
							<div class="atf-mailchamp-subscribe">
								<form class="form-group" action="" method="POST">
									<input type="email" name="email2" class="form-control"  placeholder="Your Email" required="required">
									<button type="submit" class="btn" name="touch"><i class="fas fa-envelope" ></i></button>
										<!-- SUBSCRIPTION SUCCESSFUL OR ERROR MESSAGES -->
										<br>
										<label class="atf-subscription-label"    for="email"></label>
								</form>
								
							</div>
						</div><!-- END COL -->
					</div><!-- END ROW -->
				</div><!-- END CONTAINER -->
			</section>
			<!-- END NEWSLETTER -->
			
			
			
			<!-- FOOTER SECTION START-->
			<footer class="atf-footer-area atf-pattern-area">
				<div class="container">
					<div class="atf-footer-top mt-5">
						<div class="row">
							<div class="col-lg-4 col-md-6 col-12 atf-footer-link wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0">
								<div class="atf-footer-box">
									<!--<h5><a href=""><img class="atf-footer-logo" src="assets/img/logo.png" alt="" /></a></h5>-->
									<h5 style="font-size: 20px;" href="index.html">Affiliate@EASE</h5>

									<ul class="pr-lg-5">
										<li>Marwadi University, Morbi Highway, Rajkot Gujarat, India.</li>
										<li>(+91) 9727622124 <br> (+91) 9574424242</li>
										<li>yourstore1010@gmail.com</li>
									</ul>
								</div>
							</div><!--- END COL -->
							
							<div class="col-lg-2 col-md-6 col-12 atf-footer-link wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
								<h5>Quick Links</h5>
								<ul class="atf-list-menu">
									<!---<li> <a href="#"><i class="fas fa-angle-right mr-2"></i>Get Stared</a></li>--->
									<li> <a href="Our_team.html"><i class="fas fa-angle-right mr-2"></i>Our Team</a></li>
									<li> <a href="about_us.html"><i class="fas fa-angle-right mr-2"></i>About Us</a></li>
									<!--<li> <a href="#"><i class="fas fa-angle-right mr-2"></i>Need Helps</a></li>--->
									<li> <a href="blog.html"><i class="fas fa-angle-right mr-2"></i>Blogs</a></li>
								</ul>
							</div><!--- END COL -->
							
							<div class="col-lg-2 col-md-6 col-12 atf-footer-link wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s" data-wow-offset="0">
								<h5>Support Links</h5>
								<ul class="atf-list-menu">
									<!---<li><a href="#"><i class="fas fa-angle-right mr-2"></i>Our Terms</a></li>--->
									<li><a href="Our_services.html"><i class="fas fa-angle-right mr-2"></i>Our Service</a></li>
									<li><a href="privacy_policy.html"><i class="fas fa-angle-right mr-2"></i>Privacy Policy</a></li>
									
									<!--<li><a href="#"><i class="fas fa-angle-right mr-2"></i>Our News</a></li>-->
								</ul>
							</div><!--- END COL -->
							
							<div class="col-lg-4 col-md-6 col-12 atf-footer-link text-left wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s" data-wow-offset="0">
								<h5>Contact Us</h5>
								<div class="atf-footer-con">
									<ul class="atf-list-menu">
										<!---<li><a href="#"><i class="fas fa-angle-right mr-2"></i>Our Terms</a></li>--->
										<li><a href="contact.php"><i class="fas fa-angle-right mr-2"></i>Contact Us</a></li>
										
										<!--<li><a href="#"><i class="fas fa-angle-right mr-2"></i>Our News</a></li>-->
									</ul>
								
								</div>
							</div><!--- END COL -->
						</div><!--- END ROW -->
					</div><!--- END SINGLE FOOTER -->
				</div><!--- END CONTAINER -->
					
				<div class="atf-footer-boottom mt-4">
					<div class="container">
						<div class="row">
							<div class="col-lg-5 col-xl-5 col-12 my-auto text-lg-left wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0">
								</div>
							<!--- END COL -->
							
							 <!--<div class="col-lg-7 col-xl-7 col-12">
								<div class="atf-payment-area text-lg-right my-auto mx-auto">
									<ul>
										<li><a href="#"><img src="assets/img/payment/1.png" alt="img"></a></li>
										<li><a href="#"><img src="assets/img/payment/2.png" alt="img"></a></li>
										<li><a href="#"><img src="assets/img/payment/3.png" alt="img"></a></li>
										<li><a href="#"><img src="assets/img/payment/1.png" alt="img"></a></li>
										<li><a href="#"><img src="assets/img/payment/2.png" alt="img"></a></li>
										<li><a href="#"><img src="assets/img/payment/3.png" alt="img"></a></li>
									</ul>
								</div>
							</div><!- END COL -->
						</div><!--- END ROW -->
					</div>
				</div>
				<!-- FOOTER SECTION END-->	
			</footer><!--- END FOOTER -->
		</div>
		<!-- PAGE WRAPPER END-->
		
		<!-- Latest jQuery -->
		<script src="assets/js/jquery-1.12.4.min.js"></script>
		<!-- Latest compiled and minified Bootstrap -->
		<script src="assets/bootstrap/js/bootstrap.js"></script>
		<!-- modernizer JS -->		
		<script src="assets/js/modernizr.custom.js"></script>	
		<!-- magnific-popup js -->	
		<script src="assets/js/jquery.magnific-popup.js"></script>			
		<!-- stellar js -->
		<script src="assets/js/jquery.stellar.min.js"></script>
		<!-- slick js -->
		<script src="assets/js/slick.js"></script>
		<!-- countdown js -->
		<script src="assets/js/jquery.countdown.js"></script>
		<!-- wow js -->
		<script src="assets/js/wow.min.js"></script>
		<!-- ajaxchimp js -->
		<script src="assets/js/ajaxchimp.min.js"></script>
		<!-- form-contact js -->
		<script src="assets/js/form-contact.js"></script>
		<!-- main js -->
		<script src="assets/js/main.js"></script>	
		
	</body>
</html>