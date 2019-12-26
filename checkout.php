<?php
	// start session
	session_start();
	include('admin/inc/function.php');
	// intialize connect
	$connect = connect();

	if (isset($_POST["place_oder"])) {
		$first_name = $_POST["first_name"];
		$last_name = $_POST["last_name"];
		$country = $_POST["country"];
		$email = $_POST["email"];
		$phone = $_POST["phone"];
		$address = $_POST["address"];
		$city = $_POST["city"];
		$state = $_POST["state"];
		$zip_code = $_POST["zip_code"];


		$sql = 'INSERT INTO oder(first_name, user_session, first_name, last_name, country, email, phone, address, city, state, zip_code, status) VALUES("'.$first_name.'", "'.$last_name.'", "'.$country.'", "'.$email.'", '.$phone.', "'.$address.'", "'.$city.'", "'.$state.'", "'.$zip_code.'", "'.$status.'")';
		$res = mysqli_query($connect, $link) or die(mysqli_error($connect));
		if(mysqli_affected_rows($connect)>0){
			echo "Thanks";
		}else{
			echo "Did not work";
		}

	}

	

?>
<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from demo.hasthemes.com/pustok-preview/pustok/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Dec 2019 12:43:36 GMT -->
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Pustok - Book Store HTML Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Use Minified Plugins Version For Fast Page Load -->
	<link rel="stylesheet" type="text/css" media="screen" href="css/plugins.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
	<link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
</head>

<body>
	<div class="site-wrapper" id="top">
		<?php include 'inc/top.php' ?>
		<section class="breadcrumb-section">
			<h2 class="sr-only">Site Breadcrumb</h2>
			<div class="container">
				<div class="breadcrumb-contents">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Home</a></li>
							<li class="breadcrumb-item active">Checkout</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		<main id="content" class="page-section inner-page-sec-padding-bottom space-db--20">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- Checkout Form s-->

						<form method="POST">
							<div class="checkout-form">
							<div class="row row-40">
								<div class="col-12">
									<h1 class="quick-title">Checkout</h1>
									<!-- Slide Down Trigger  -->
									<div class="checkout-quick-box">
										<p><i class="far fa-sticky-note"></i>Returning customer? <a href="javascript:"
												class="slide-trigger" data-target="#quick-login">Click
												here to login</a></p>
									</div>		
								</div>
								<div class="col-lg-7 mb--20">
									<!-- Billing Address -->
									<div id="billing-form" class="mb-40">
										<h4 class="checkout-title">Billing Address</h4>
										<div class="row">
											
											<div class="col-md-6 col-12 mb--20">
												<label>First Name*</label>
												<input type="text" name="first_name" placeholder="First Name">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Last Name*</label>
												<input type="text" name="last_name" placeholder="Last Name">
											</div>
											
											<div class="col-12 col-12 mb--20">
												<label>Country*</label>
												<select name="country">
									            	<option value="usa">USA</option>
									            	<option value="canada">CANADA</option>
									            </select>
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Email Address*</label>
												<input type="email" name="email" placeholder="Email Address">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Phone no*</label>
												<input type="text" name="phone" placeholder="Phone number">
											</div>
											<div class="col-12 mb--20">
												<label>Address*</label>
												<input type="text" name="address" placeholder="Address line 1">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Town/City*</label>
												<input type="text" name="city" placeholder="Town/City">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>State*</label>
												<input type="text" name="state" placeholder="State">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Zip Code*</label>
												<input type="text" name="zip_code" placeholder="Zip Code">
											</div>

										</div>
									</div>
									<!-- Shipping Address -->
									

									<!-- <div class="order-note-block mt--30">
										<label for="order-note">Order notes</label>
										<textarea id="order-note" cols="30" rows="10" class="order-note"
											placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
									</div> -->
								</div>
								<div class="col-lg-5">
									<div class="row">
										<!-- Cart Total -->
										<div class="col-12">
											<div class="checkout-cart-total">
												<h2 class="checkout-title">YOUR ORDER</h2>
												<h4>Product <span>Total</span></h4>
												<ul>
													<li><span class="left">Cillum dolore tortor nisl X 01</span> <span
															class="right">$25.00</span></li>
													<li><span class="left">Auctor gravida pellentesque X 02 </span><span
															class="right">$50.00</span></li>
													<li><span class="left">Condimentum posuere consectetur X 01</span>
														<span class="right">$29.00</span></li>
													<li><span class="left">Habitasse dictumst elementum X 01</span>
														<span class="right">$10.00</span></li>
												</ul>
												<p>Sub Total <span>$104.00</span></p>
												<p>Shipping Fee <span>$00.00</span></p>
												<h4>Grand Total <span>$104.00</span></h4>
												<div class="method-notice mt--25">
													<article>
														<h3 class="d-none sr-only">blog-article</h3>
														Sorry, it seems that there are no available payment methods for
														your state. Please contact us if you
														require
														assistance
														or wish to make alternate arrangements.
													</article>
												</div>
												<div class="term-block">
													<input type="checkbox" id="accept_terms2" required="">
													<label for="accept_terms2">I’ve read and accept the terms &
														conditions</label>
												</div>
												<button name="place_oder" class="place-order w-100">Place order</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>			
						</form>
						
					</div>
				</div>
			</div>
		</main>
	</div>
	<!--=================================
  Brands Slider
===================================== -->
	<section class="section-margin">
		<h2 class="sr-only">Brand Slider</h2>
		<div class="container">
			<div class="brand-slider sb-slick-slider border-top border-bottom" data-slick-setting='{
                                            "autoplay": true,
                                            "autoplaySpeed": 8000,
                                            "slidesToShow": 6
                                            }' data-slick-responsive='[
                {"breakpoint":992, "settings": {"slidesToShow": 4} },
                {"breakpoint":768, "settings": {"slidesToShow": 3} },
                {"breakpoint":575, "settings": {"slidesToShow": 3} },
                {"breakpoint":480, "settings": {"slidesToShow": 2} },
                {"breakpoint":320, "settings": {"slidesToShow": 1} }
            ]'>
				<div class="single-slide">
					<img src="image/others/brand-1.jpg" alt="">
				</div>
				<div class="single-slide">
					<img src="image/others/brand-2.jpg" alt="">
				</div>
				<div class="single-slide">
					<img src="image/others/brand-3.jpg" alt="">
				</div>
				<div class="single-slide">
					<img src="image/others/brand-4.jpg" alt="">
				</div>
				<div class="single-slide">
					<img src="image/others/brand-5.jpg" alt="">
				</div>
				<div class="single-slide">
					<img src="image/others/brand-6.jpg" alt="">
				</div>
				<div class="single-slide">
					<img src="image/others/brand-1.jpg" alt="">
				</div>
				<div class="single-slide">
					<img src="image/others/brand-2.jpg" alt="">
				</div>
			</div>
		</div>
	</section>
	<!--=================================
    Footer Area
===================================== -->
	<footer class="site-footer">
		<div class="container">
			<div class="row justify-content-between  section-padding">
				<div class=" col-xl-3 col-lg-4 col-sm-6">
					<div class="single-footer pb--40">
						<div class="brand-footer footer-title">
							<img src="image/logo--footer.png" alt="">
						</div>
						<div class="footer-contact">
							<p><span class="label">Address:</span><span class="text">Example Street 98, HH2 BacHa, New
									York, USA</span></p>
							<p><span class="label">Phone:</span><span class="text">+18088 234 5678</span></p>
							<p><span class="label">Email:</span><span class="text">suport@hastech.com</span></p>
						</div>
					</div>
				</div>
				<div class=" col-xl-3 col-lg-2 col-sm-6">
					<div class="single-footer pb--40">
						<div class="footer-title">
							<h3>Information</h3>
						</div>
						<ul class="footer-list normal-list">
							<li><a href="#">Prices drop</a></li>
							<li><a href="#">New products</a></li>
							<li><a href="#">Best sales</a></li>
							<li><a href="#">Contact us</a></li>
							<li><a href="#">Sitemap</a></li>
						</ul>
					</div>
				</div>
				<div class=" col-xl-3 col-lg-2 col-sm-6">
					<div class="single-footer pb--40">
						<div class="footer-title">
							<h3>Extras</h3>
						</div>
						<ul class="footer-list normal-list">
							<li><a href="#">Delivery</a></li>
							<li><a href="#">About Us</a></li>
							<li><a href="#">Stores</a></li>
							<li><a href="#">Contact us</a></li>
							<li><a href="#">Sitemap</a></li>
						</ul>
					</div>
				</div>
				<div class=" col-xl-3 col-lg-4 col-sm-6">
					<div class="footer-title">
						<h3>Newsletter Subscribe</h3>
					</div>
					<div class="newsletter-form mb--30">
						<form action="https://demo.hasthemes.com/pustok-preview/pustok/php/mail.php">
							<input type="email" class="form-control" placeholder="Enter Your Email Address Here...">
							<button class="btn btn--primary w-100">Subscribe</button>
						</form>
					</div>
					<div class="social-block">
						<h3 class="title">STAY CONNECTED</h3>
						<ul class="social-list list-inline">
							<li class="single-social facebook"><a href="#"><i class="ion ion-social-facebook"></i></a>
							</li>
							<li class="single-social twitter"><a href="#"><i class="ion ion-social-twitter"></i></a></li>
							<li class="single-social google"><a href="#"><i
										class="ion ion-social-googleplus-outline"></i></a></li>
							<li class="single-social youtube"><a href="#"><i class="ion ion-social-youtube"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<p class="copyright-heading">Suspendisse in auctor augue. Cras fermentum est ac fermentum tempor. Etiam
					vel magna volutpat, posuere eros</p>
				<a href="#" class="payment-block">
					<img src="image/icon/payment.png" alt="">
				</a>
				<p class="copyright-text">Copyright © 2019 <a href="#" class="author">Pustok</a>. All Right Reserved.
					<br>
					Design By Pustok</p>
			</div>
		</div>
	</footer>
	<!-- Use Minified Plugins Version For Fast Page Load -->
	<script src="js/plugins.js"></script>
	<script src="js/ajax-mail.js"></script>
	<script src="js/custom.js"></script>
</body>


<!-- Mirrored from demo.hasthemes.com/pustok-preview/pustok/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Dec 2019 12:43:36 GMT -->
</html>