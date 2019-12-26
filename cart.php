<?php
	// start session
	session_start();
	// include the function file that contains connection string
	include('admin/inc/function.php');
	// intialize connect
	$connect = connect();
	if (isset($_GET['cart_id'])) {
		$cart_id = $_GET["cart_id"];

		$sql = 'DELETE FROM cart WHERE cart_id = '.$_GET["cart_id"].' ';
		$res = mysqli_query($connect, $sql);
		header("Location:cart.php");
	}
	if(isset($_POST['update_cart'])){
		//$update = true;
		$product_quantity = $_POST['product_quantity'];
		$cart_id = $_POST['cart_id'];
		

		$sql = 'UPDATE cart SET product_quantity='.$product_quantity.' WHERE cart_id = '.$_POST['cart_id'].'';
		$res = mysqli_query($connect, $sql) or die(mysqli_error($connect));
		



		
		
	}

?>
<!DOCTYPE html>
<html>


<!-- Mirrored from demo.hasthemes.com/pustok-preview/pustok/cart.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Dec 2019 12:43:36 GMT -->
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Pustok - Book Store php Template</title>
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
							<li class="breadcrumb-item"><a href="index.php">Home</a></li>
							<li class="breadcrumb-item active">Cart</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		<!-- Cart Page Start -->
		<main class="cart-page-main-block inner-page-sec-padding-bottom">
			<div class="cart_area cart-area-padding  ">
				<div class="container">
					<div class="page-section-title">
						<h1>Shopping Cart</h1>
					</div>
					<div class="row">
						<div class="col-12">
							<form action="#" class="">
								<!-- Cart Table -->
								<div class="cart-table table-responsive mb--40">
									<table class="table">
										<!-- Head Row -->
										<thead>
											<tr>
												<th class="pro-remove"></th>
												<th class="pro-thumbnail">Image</th>
												<th class="pro-title">Product</th>
												<th class="pro-price">Price</th>
												<th class="pro-quantity">Quantity</th>
												<th class="pro-subtotal">Total</th>
											</tr>
										</thead>
										<tbody>
											<!-- Product Row -->


											<?php 
												/*$sql = 'SELECT * FROM cart WHERE user_session="'.$_SESSION["user_session"].'" ';
												$res = mysqli_query($connect,$sql);
												$count = mysqli_affected_rows($connect); // the total num of items the query affected 
									 			$total_price = 0;
									 			while ($row=mysqli_fetch_assoc($res)) 
									 			{
									 				$total_price +=$row['product_price'];
									 			}*/

											?>




											<?php
												$subtotal = 0;
												$sql = 'SELECT * FROM cart WHERE user_session="'.$_SESSION["user_session"].'"';
                                                $res = mysqli_query($connect, $sql) or die(mysqli_error($connect));
                                                if(mysqli_num_rows($res) > 0)  {
                                                	while ($row = mysqli_fetch_assoc($res)) {
                                                		$subtotal += $row["product_quantity"] * $row["product_price"];
                                            	?>
											<tr>											
												
												<td class="pro-remove"><a href="cart.php?cart_id=<?php echo $row["cart_id"] ?>  "><i class="far fa-trash-alt"></i></a>
												</td>
												<td class="pro-thumbnail"><a href="#"><img
															src="image/products/1.jpg" alt="Product"></a></td>
												<td class="pro-title"><a href="#"><?php echo $row["product_name"]; ?></a></td>
												<td class="pro-price"><span><?php echo "$" . number_format($row["product_price"],0); ?></span></td>
												<td class="pro-quantity">

													<form method="POST">
														<input type="hidden" name="cart_id" value="<?php echo $row["cart_id"] ?>" />
														<div class="pro-qty">
															<div class="count-input-block">
																<input type="number" name="product_quantity" class="form-control text-center" value="<?php echo $row["product_quantity"] ?>">
															</div>
															<div class="count-input-block">
																<button style="color: red;" name="update_cart" type="submit">update</button>
															</div>
														</div>
													</form>
													
													
												</td>
												<td class="pro-subtotal"><span><?php echo "$" . number_format( ($row["product_price"] * $row["product_quantity"]) ,0); ?></span></td>
											</tr>
										
                                                <?php

										 		}
										 	}
										 ?>

											


											
										</tbody>
									</table>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="cart-section-2">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-12 mb--30 mb-lg--0">
							<!-- slide Block 5 / Normal Slider -->
							<div class="cart-block-title">
								<h2>YOU MAY BE INTERESTED IN…</h2>
							</div>
							<div class="product-slider sb-slick-slider" data-slick-setting='{
							          "autoplay": true,
							          "autoplaySpeed": 8000,
							          "slidesToShow": 2
									  }' data-slick-responsive='[
                {"breakpoint":992, "settings": {"slidesToShow": 2} },
                {"breakpoint":768, "settings": {"slidesToShow": 3} },
                {"breakpoint":575, "settings": {"slidesToShow": 2} },
                {"breakpoint":480, "settings": {"slidesToShow": 1} },
                {"breakpoint":320, "settings": {"slidesToShow": 1} }
            ]'>
								
								<div class="single-slide">
                                    <div class="product-card">
                                        <div class="product-header">
                                            <a href="#" class="author">
                                                TUTU BATTERY
                                            </a>
                                                <h3><a href="product-details.php">TUTU RC battery 2200vlts</a></h3>
                                        </div>
                                        <div class="product-card--body">
                                            <div class="card-image">
                                                <a href="product-details.php"><img src="image/products/1.jpg" alt=""></a>
                                            </div>
                                            <div class="price-block">
                                                <span class="price">£51.20</span>
                                                <del class="price-old">£51.20</del>
                                                <span class="price-discount">20%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-slide">
                                    <div class="product-card">
                                        <div class="product-header">
                                            <a href="#" class="author">
                                                TUTU BATTERY
                                            </a>
                                                <h3><a href="product-details.php">TUTU RC battery 2200vlts</a></h3>
                                        </div>
                                        <div class="product-card--body">
                                            <div class="card-image">
                                                <a href="product-details.php"><img src="image/products/10.jpg" alt=""></a>
                                            </div>
                                            <div class="price-block">
                                                <span class="price">£51.20</span>
                                                <del class="price-old">£51.20</del>
                                                <span class="price-discount">20%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-slide">
                                    <div class="product-card">
                                        <div class="product-header">
                                            <a href="#" class="author">
                                                TUTU BATTERY
                                            </a>
                                                <h3><a href="product-details.php">TUTU RC battery 2200vlts</a></h3>
                                        </div>
                                        <div class="product-card--body">
                                            <div class="card-image">
                                                <a href="product-details.php"><img src="image/products/9.jpg" alt=""></a>
                                            </div>
                                            <div class="price-block">
                                                <span class="price">£51.20</span>
                                                <del class="price-old">£51.20</del>
                                                <span class="price-discount">20%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-slide">
                                    <div class="product-card">
                                        <div class="product-header">
                                            <a href="#" class="author">
                                                TUTU BATTERY
                                            </a>
                                                <h3><a href="product-details.php">TUTU RC battery 2200vlts</a></h3>
                                        </div>
                                        <div class="product-card--body">
                                            <div class="card-image">
                                                <a href="product-details.php"><img src="image/products/5.jpg" alt=""></a>
                                            </div>
                                            <div class="price-block">
                                                <span class="price">£51.20</span>
                                                <del class="price-old">£51.20</del>
                                                <span class="price-discount">20%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
							</div>
						</div>
						<!-- Cart Summary -->
						<div class="col-lg-6 col-12 d-flex">
							<div class="cart-summary">
								<div class="cart-summary-wrap">
									<h4><span>Cart Summary</span></h4>
									<p>Total Cost<span class="text-primary"><?php echo "$" . number_format($subtotal,0); ?></span></p>
									
								</div>
								<div class="cart-summary-button">
									<a href="checkout.php" class="checkout-btn c-btn btn--primary">Checkout</a>
								<form method="post">
									<button class="update-btn c-btn btn-outlined" name="update">Update Cart</button>
								</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		<!-- Cart Page End -->
	</div>
	<!--=================================
  Brands Slider
===================================== -->

	<!--=================================
    Footer Area
===================================== -->
	<?php include 'inc/footer.php' ?>
	<!-- Use Minified Plugins Version For Fast Page Load -->
	<script src="js/plugins.js"></script>
	<script src="js/ajax-mail.js"></script>
	<script src="js/custom.js"></script>
</body>


<!-- Mirrored from demo.hasthemes.com/pustok-preview/pustok/cart.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Dec 2019 12:43:36 GMT -->
</php>