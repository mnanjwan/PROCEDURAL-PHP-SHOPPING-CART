    <?php
    session_start();
    include('admin/inc/function.php');
    $connect = connect(); // connect to the database

    if(!isset($_SESSION["user_session"]))
    {
        $_SESSION["user_session"] = time();
    }
    if (isset($_GET['empty'])) {
        $query = 'DELETE FROM cart WHERE user_session="'.$_SESSION["user_session"].'" ';
        $res = mysqli_query($connect, $query);
        if(mysqli_affected_rows($connect) > 0)
        {
            echo '<script>alert("You have successfully emptied your cart");</script>';
             header("'Location:index.php");
        }

    }

    if(isset($_GET['product_id']))
    {
        $product_id = $_GET['product_id'];
        // if we have clicked on add to cart
        // 1. Retrieve details of selected item
        $query = 'SELECT * FROM products WHERE product_id='.$product_id.'';
        $res = mysqli_query($connect, $query) or die(mysqli_error($connect));
        while($row = mysqli_fetch_assoc($res))
        {
            $product_name = $row['product_name'];
            $product_price = $row['product_price'];
        }
        // 2. Add item to cart
        $query = 'INSERT INTO cart (user_session, product_id, product_name, product_price, product_quantity) VALUES("'.$_SESSION["user_session"].'", '.$product_id.', "'.$product_name.'", '.$product_price.', "1")';

        $res = mysqli_query($connect, $query) or die(mysqli_error($connect));
        if(mysqli_affected_rows($connect) > 0)
        {
            echo '<script>alert("You have successfully added the item to cart");</script>';
            echo header('Location:index.php');
        }
    }

   

?>

<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from demo.hasthemes.com/pustok-preview/pustok/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Dec 2019 12:43:29 GMT -->
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
        

        <div class="site-header header-4 mb--20 d-none d-lg-block">
            <div class="header-top header-top--style-2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <ul class="header-top-list">
                                <li class="dropdown-trigger currency-dropdown"><a href="#">£ GBP </a><i
                                        class="fas fa-chevron-down dropdown-arrow"></i>
                                    <ul class="dropdown-box">
                                        <li><a href="#">€ Euro</a></li>
                                        <li><a href="#">£ Pound Sterling</a></li>
                                        <li><a href="#">$ US Dollar</a></li>
                                    </ul>
                                </li>
                                
                                        <li><span style="color:red">free</span> shipping for order above <span style="color:green">$49</span> </li>
                                        
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-8 flex-lg-right">
                            <ul class="header-top-list">
                                
                                <!-- <li class="dropdown-trigger language-dropdown"><a href="#"><i
                                            class="icons-left fas fa-heart"></i>
                                        wishlist (0)</a>
                                </li> -->
                                <li class="dropdown-trigger language-dropdown"><a href="#"><i
                                            class="icons-left fas fa-user"></i>
                                        My Account</a><i class="fas fa-chevron-down dropdown-arrow"></i>
                                    <ul class="dropdown-box">
                                        <li> <a href="#">My Account</a></li>
                                        <li> <a href="#">Order History</a></li>
                                        <li> <a href="#">Transactions</a></li>
                                        <li> <a href="#">Downloads</a></li>
                                    </ul>
                                </li>
                                <li><a href="#"><i class="icons-left fas fa-phone"></i> Contact</a>
                                </li>
                                <li><a href="#"><i class="icons-left fas fa-share"></i> Checkout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-middle pt--10 pb--10">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <a href="index.php" class="site-brand">
                                <img src="image/logo.png" alt="">
                            </a>
                        </div>
                        <div class="col-lg-5">
                            <div class="header-search-block">
                                <input type="text" placeholder="Search entire store here">
                                <button>Search</button>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="main-navigation flex-lg-right">
                                <div class="cart-widget">
                                    <div class="login-block">
                                        <a href="login-register.php" class="font-weight-bold">Login</a> <br>
                                        <span>or</span><a href="login-register.<?php ?>">Register</a>
                                    </div>

                                    <?php 
                                        $total = 0;
                                                $query = 'SELECT * FROM cart WHERE user_session="'.$_SESSION["user_session"].'" ';
                                                $res = mysqli_query($connect, $query);
                                                $count = mysqli_affected_rows($connect); // the total num of items the query affected 
                                                while($row = mysqli_fetch_assoc($res)) {
                                                    $total +=$row["product_price"];
                                                    // $total =$total + $row["price"];
                                                    ?>

                                                    <?php
                                                }

                                    ?>
                                    <div class="cart-block">
                                        <div class="cart-total">
                                            <span class="text-number">
                                                <?php echo $count; ?>
                                            </span>
                                            <span class="text-item">
                                                Shopping Cart
                                            </span>
                                            <span class="price">
                                                &#8358;<?php echo number_format($total,0);?> 
                                            </span>
                                        </div>
                                        <div class="cart-dropdown-block">
                                            
                                            <div class=" single-cart-block ">
                                                <div class="btn-block">
                                                    <a href="cart.php" class="btn">View Cart <i
                                                            class="fas fa-chevron-right"></i></a>
                                                    <a href="checkout.php" class="btn btn--primary">Check Out <i
                                                            class="fas fa-chevron-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <nav class="category-nav  primary-nav show">
                                <div>
                                    <a href="javascript:void(0)" class="category-trigger"><i
                                            class="fa fa-bars"></i>Browse
                                        categories</a>
                                    <ul class="category-menu">
                                        <li class="cat-item"><a href="rcbattery.php">RC Car Batteries</a></li>
                                        <li class="cat-item"><a href="#">RC Heli & Airplane Batteries</a></li>
                                        <li class="cat-item"><a href="#">UAV Battery</a></li>
                                        <li class="cat-item"><a href="#">Airsoft GunBatteries</a></li>
                                        <li class="cat-item"><a href="#">FPV Quad Batteries</a></li>
                                        
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="col-lg-3">
                            <div class="header-phone ">
                                <div class="icon">
                                    <i class="fas fa-headphones-alt"></i>
                                </div>
                                <div class="text">
                                    <p>Free Support 24/7</p>
                                    <p class="font-weight-bold number">+01-202-555-0181</p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="site-mobile-menu">
            <header class="mobile-header d-block d-lg-none pt--10 pb-md--10">
                <div class="container">
                    <div class="row align-items-sm-end align-items-center">
                        <div class="col-md-4 col-7">
                            <a href="index.php" class="site-brand">
                                <img src="image/logo.png" alt="">
                            </a>
                        </div>
                        <div class="col-md-5 order-3 order-md-2">
                            <nav class="category-nav ">
                                <div>
                                    <a href="javascript:void(0)" class="category-trigger"><i
                                            class="fa fa-bars"></i>Browse
                                        categories</a>
                                    <ul class="category-menu">
                                        <li class="cat-item"><a href="rcbattery.php">RC Car Battery</a></li>
                                        <li class="cat-item"><a href="#">RC Heli & Airplane Battery</a></li>
                                        <li class="cat-item"><a href="#">UAV Battery</a></li>
                                        <li class="cat-item"><a href="#">Airsoft GunBattery</a></li>
                                        
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="col-md-3 col-5  order-md-3 text-right">
                            <div class="mobile-header-btns header-top-widget">
                                <ul class="header-links">
                                    <li class="sin-link">
                                        <span class="text-number">
                                                <?php echo $count; ?>
                                            </span>
                                        <a href="cart.php" class="cart-link link-icon"><i class="ion-bag"></i></a>
                                    </li>
                                    <li class="sin-link">
                                        <a href="javascript:" class="link-icon hamburgur-icon off-canvas-btn"><i
                                                class="ion-navicon"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!--Off Canvas Navigation Start-->
            <aside class="off-canvas-wrapper">
                <div class="btn-close-off-canvas">
                    <i class="ion-android-close"></i>
                </div>
                <div class="off-canvas-inner">
                    <!-- search box start -->
                    <div class="search-box offcanvas">
                        <form>
                            <input type="text" placeholder="Search Here">
                            <button class="search-btn"><i class="ion-ios-search-strong"></i></button>
                        </form>
                    </div>
                    <!-- search box end -->
                    <!-- mobile menu start -->
                    <div class="mobile-navigation">
                        <!-- mobile menu navigation start -->
                        

                        <div class="mobile-menu menu-block-1">
                                    <div class="login-block">
                                        <a href="login-register.php" class="font-weight-bold">Login</a> <br>
                                        <span>or</span><a href="login-register.php">Register</a>
                                    </div>
                                    <?php 
                                        $total = 0;
                                                $query = 'SELECT * FROM cart WHERE user_session="'.$_SESSION["user_session"].'" ';
                                                $res = mysqli_query($connect, $query);
                                                $count = mysqli_affected_rows($connect); // the total num of items the query affected 
                                                while($row = mysqli_fetch_assoc($res)) {
                                                    $total +=$row["product_price"];
                                                    // $total =$total + $row["price"];
                                                    ?>

                                                    <?php
                                                }

                                    ?>
                                    <div class="cart-block">
                                        <div class="cart-total">
                                            <span class="text-number">
                                                <?php echo $count; ?>
                                            </span>
                                            <span class="text-item">
                                                Shopping Cart
                                            </span>
                                            <span class="price">
                                                &#8358;<?php echo number_format($total,0);?> 
                                            </span>
                                        </div>
                                        
                                    </div>
                                </div>


                        <!-- mobile menu navigation end -->
                    </div>
                    <!-- mobile menu end -->
                    <nav class="off-canvas-nav">
                        <ul class="mobile-menu menu-block-2">
                            <li class="menu-item-has-children">
                                <a href="#">Currency - USD $ <i class="fas fa-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li> <a href="cart.php">USD $</a></li>
                                    <li> <a href="checkout.html">EUR €</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Lang - Eng<i class="fas fa-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li>Eng</li>
                                    <li>Ban</li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">My Account <i class="fas fa-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="#">My Account</a></li>
                                    <li><a href="#">Order History</a></li>
                                    <li><a href="#">Transactions</a></li>
                                    <li><a href="#">Downloads</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <div class="off-canvas-bottom">
                        <div class="contact-list mb--10">
                            <a href="#" class="sin-contact"><i class="fas fa-mobile-alt"></i>(12345) 78790220</a>
                            <a href="#" class="sin-contact"><i class="fas fa-envelope"></i>examle@handart.com</a>
                        </div>
                        <div class="off-canvas-social">
                            <a href="#" class="single-icon"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="single-icon"><i class="fas fa-rss"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-youtube"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </aside>
            <!--Off Canvas Navigation End-->
        </div>
        <div class="sticky-init fixed-header common-sticky">
            <div class="container d-none d-lg-block">
                <div class="row align-items-center">
                        <div class="col-lg-3">
                            <a href="index.html" class="site-brand">
                                <img src="image/logo.png" alt="">
                            </a>
                        </div>
                        <div class="col-lg-5">
                            <div class="header-search-block">
                                <input type="text" placeholder="Search entire store here">
                                <button>Search</button>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="main-navigation flex-lg-right">
                                <div class="cart-widget">
                                    <div class="login-block">
                                        <a href="login-register.html" class="font-weight-bold">Login</a> <br>
                                        <span>or</span><a href="login-register.html">Register</a>
                                    </div>
                                    <?php 
                                        $total = 0;
                                                $query = 'SELECT * FROM cart WHERE user_session="'.$_SESSION["user_session"].'" ';
                                                $res = mysqli_query($connect, $query);
                                                $count = mysqli_affected_rows($connect); // the total num of items the query affected 
                                                while($row = mysqli_fetch_assoc($res)) {
                                                    $total +=$row["product_price"];
                                                    // $total =$total + $row["price"];
                                                    ?>

                                                    <?php
                                                }

                                    ?>
                                    <div class="cart-block">
                                        <div class="cart-total">
                                            <span class="text-number">
                                                <?php echo $count; ?>
                                            </span>
                                            <span class="text-item">
                                                Shopping Cart
                                            </span>
                                            <span class="price">
                                                &#8358;<?php echo number_format($total,0);?> 
                                            </span>
                                        </div>
                                        <div class="cart-dropdown-block">
                                            
                                            <div class=" single-cart-block ">
                                                <div class="btn-block">
                                                    <a href="cart.php" class="btn">View Cart <i
                                                            class="fas fa-chevron-right"></i></a>
                                                    <a href="checkout.php" class="btn btn--primary">Check Out <i
                                                            class="fas fa-chevron-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <!--=================================
        Hero Area
    ===================================== -->
        <section class="hero-area hero-slider-4 ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 offset-lg-3">
                        <div class="sb-slick-slider" data-slick-setting='{
                                                                    "autoplay": true,
                                                                    "autoplaySpeed": 8000,
                                                                    "slidesToShow": 1,
                                                                    "dots":true
                                                                    }'>
                            <div class="single-slide bg-image bg-overlay--white"
                                data-bg="image/bg-images/home-4-slider-1.jpg">
                                <div class="home-content text-left pl--30">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <span class="title-small">Magazine Cover</span>
                                            <h1>Mockup.</h1>
                                            <p>Cover up front of book and
                                                <br>leave summary</p>
                                            <a href="shop-grid.html" class="btn btn-outlined--pink">
                                                Shop Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide bg-image bg-overlay--dark"
                                data-bg="image/bg-images/home-4-slider-2.jpg">
                                <div class="home-content text-center">
                                    <div class="row justify-content-end">
                                        <div class="col-lg-8">
                                            <h1 class="v2">I Love This Idea!</h1>
                                            <h2>Cover up front of book and
                                                leave summary</h2>
                                            <a href="shop-grid.html" class="btn btn--yellow">
                                                Shop Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=================================
        Home Features Section
    ===================================== -->
        <section class="mb--30">
            <h2 class="sr-only">Feature Section</h2>
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6 mt--30">
                        <div class="feature-box h-100">
                            <div class="icon">
                                <i class="fas fa-shipping-fast"></i>
                            </div>
                            <div class="text">
                                <h5>Free Shipping Item</h5>
                                <p> Orders over $500</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 mt--30">
                        <div class="feature-box h-100">
                            <div class="icon">
                                <i class="fas fa-redo-alt"></i>
                            </div>
                            <div class="text">
                                <h5>Money Back Guarantee</h5>
                                <p>100% money back</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-4 col-md-6 mt--30">
                        <div class="feature-box h-100">
                            <div class="icon">
                                <i class="fas fa-life-ring"></i>
                            </div>
                            <div class="text">
                                <h5>Help & Support</h5>
                                <p>Call us : + 0123.4567.89</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=================================
        Home Category Gallery
    ===================================== -->
        
        <!--=================================
        Home Two Column Section
    ===================================== -->
 <!--=================================
        Home Slider Tab
        ===================================== -->
        <section class="section-padding">
            <h2 class="sr-only">Home Tab Slider Section</h2>
            <div class="container">
                <div class="sb-custom-tab">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="shop-tab" data-toggle="tab" href="#shop" role="tab"
                                aria-controls="shop" aria-selected="true">
                                Featured Products
                            </a>
                            <span class="arrow-icon"></span>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane show active" id="shop" role="tabpanel" aria-labelledby="shop-tab">
                            <div class="product-slider multiple-row  slider-border-multiple-row  sb-slick-slider"
                                data-slick-setting='{
                            "autoplay": true,
                            "autoplaySpeed": 8000,
                            "slidesToShow": 5,
                            "rows":2,
                            "dots":true
                        }' data-slick-responsive='[
                            {"breakpoint":1200, "settings": {"slidesToShow": 3} },
                            {"breakpoint":768, "settings": {"slidesToShow": 2} },
                            {"breakpoint":480, "settings": {"slidesToShow": 1} },
                            {"breakpoint":320, "settings": {"slidesToShow": 1} }
                        ]'>
                        <?php 
                       
                            // $sql = "SELECT * FROM products";
                            // $res = mysqli_query($connect, $sql) or die(mysqli_error($connect));
                            // if(mysqli_affected_rows($connect)>0){
                            //     while ($row = mysqli_fetch_assoc($res)) {
                                    
                        ?>

                        
                                        
                                               <?php 

                                                    $sql = 'SELECT * FROM images INNER JOIN products ON images.image_id=products.image_id WHERE images.image_id=products.image_id';
                                                    $res = mysqli_query($connect, $sql) or die(mysqli_error($connect));
                                                    if (mysqli_affected_rows($connect) > 0) {
                                                        while ($row = mysqli_fetch_assoc($res)) {
                                                          ?><div class="single-slide">
                                    <div class="product-card">
                                        <div class="product-header">
                                            <a href="#" class="author">
                                                TUTU BATTERY
                                            </a>
                                                <h3><a href="product-details.php"><?php echo $row["product_name"]; ?></a></h3>
                                        </div>
                                                          <div class="product-card--body">
                                            <div class="card-image">
                                                          <?php  echo '<img width="639px" height="250px" src="admin/item_images/'.$row['image_name'].' " />'; ?>
                                                         <div class="hover-contents">
                                                    <div class="hover-btns">
                                                        <?php echo '<a href="index.php?product_id='.$row["product_id"].'" class="single-btn">
                                                            <i class="fas fa-shopping-basket"></i>
                                                        </a>'; ?>
                                                    </div>
                                                </div>
                                                 </div>
                                            <div class="price-block">
                                                <span class="price"><?php echo "$" . number_format($row["product_price"],0); ?></span>
                                                <del class="price-old"><?php echo "$" . number_format($row["product_pprice"],0); ?></del>
                                                <?php echo '<a href="index.php?product_id='.$row["product_id"].'" class="single-btn">
                                                            <i class="fas fa-shopping-basket"></i>
                                                        </a>'; ?>
                                            </div>
                                        </div>  </div>
                                </div>
                                                         
                                                          <?php
                                                        }
                                                    }
                                               

                                               ?> 

                                                <!-- <img src="image/products/1.jpg" alt=""> -->
                                                
                                           
                                  
                        <?php
                            //     }
                            // }
                        ?>
                               

                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <!--=================================
        Home Two Column Section
        ===================================== -->
        <section class="bg-gray section-padding-top section-padding-bottom section-margin">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb--30 mb-lg--0">
                        <div class="home-left-sidebar">
                            <div class="single-side  bg-white">
                                <h2 class="home-sidebar-title">
                                    Special offer
                                </h2>
                                <div class="product-slider countdown-single with-countdown sb-slick-slider"
                                    data-slick-setting='{
                                        "autoplay": true,
                                        "autoplaySpeed": 8000,
                                        "slidesToShow": 1,
                                        "dots":true
                                    }' data-slick-responsive='[
                                        {"breakpoint":992, "settings": {"slidesToShow": 2} },
                                        {"breakpoint":480, "settings": {"slidesToShow": 1} }
                                    ]'>
                                    <div class="single-slide">
                                        <div class="product-card">
                                            <div class="product-header">
                                                <span class="author">
                                                    TUTU BATTERY
                                                </span>
                                                <h3><a href="product-details.php">High Volt battery TUTU RC HELI BATTERY</a></h3>
                                            </div>
                                            <div class="product-card--body">
                                                <div class="card-image">
                                                    <img src="image/products/2.jpg" alt="">
                                                    <div class="hover-contents">
                                                        <div class="hover-btns">
                                                            <a href="cart.php" class="single-btn">
                                                                <i class="fas fa-shopping-basket"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price-block">
                                                    <span class="price">£51.20</span>
                                                    <del class="price-old">£51.20</del>
                                                    <span class="price-discount">20%</span>
                                                </div>
                                                <div class="count-down-block">
                                                    <div class="product-countdown" data-countdown="01/05/2020"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-slide">
                                        <div class="product-card">
                                            <div class="product-header">
                                                <span class="author">
                                                    TUTU BATTERY
                                                </span>
                                                <h3><a href="product-details.php">High Volt battery TUTU RC HELI BATTERY</a></h3>
                                            </div>
                                            <div class="product-card--body">
                                                <div class="card-image">
                                                    <img src="image/products/2.jpg" alt="">
                                                    <div class="hover-contents">
                                                        <div class="hover-btns">
                                                            <a href="cart.php" class="single-btn">
                                                                <i class="fas fa-shopping-basket"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price-block">
                                                    <span class="price">£51.20</span>
                                                    <del class="price-old">£51.20</del>
                                                    <span class="price-discount">20%</span>
                                                </div>
                                                <div class="count-down-block">
                                                    <div class="product-countdown" data-countdown="01/05/2020"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-slide">
                                        <div class="product-card">
                                            <div class="product-header">
                                                <span class="author">
                                                    TUTU BATTERY
                                                </span>
                                                <h3><a href="product-details.php">High Volt battery TUTU RC HELI BATTERY</a></h3>
                                            </div>
                                            <div class="product-card--body">
                                                <div class="card-image">
                                                    <img src="image/products/2.jpg" alt="">
                                                    <div class="hover-contents">
                                                        <div class="hover-btns">
                                                            <a href="cart.php" class="single-btn">
                                                                <i class="fas fa-shopping-basket"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price-block">
                                                    <span class="price">£51.20</span>
                                                    <del class="price-old">£51.20</del>
                                                    <span class="price-discount">20%</span>
                                                </div>
                                                <div class="count-down-block">
                                                    <div class="product-countdown" data-countdown="01/05/2020"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-side">
                                <a href="#" class="promo-image promo-overlay">
                                    <img src="image/bg-images/promo-banner-small-with-text.jpg" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="home-right-block">
                            <div class="single-block bg-white">
                                <div class="section-title mt-0">
                                    <h2>HIGH VOLT BATTERY</h2>
                                </div>
                                <div class="product-slider product-list-slider sb-slick-slider slider-border-single-row"
                                    data-slick-setting='{
                                                                    "autoplay": true,
                                                                    "autoplaySpeed": 8000,
                                                                    "slidesToShow":2,
                                                                    "dots":true
                                                                }' data-slick-responsive='[
                                                                    {"breakpoint":1200, "settings": {"slidesToShow": 2} },
                                                                    {"breakpoint":992, "settings": {"slidesToShow": 2} },
                                                                    {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                                                    {"breakpoint":575, "settings": {"slidesToShow": 1} },
                                                                    {"breakpoint":490, "settings": {"slidesToShow": 1} }
                                                                ]'>
                                    <div class="single-slide">
                                        <div class="product-card card-style-list">
                                            <div class="card-image">
                                                <img src="image/products/10.jpg" alt="">
                                            </div>
                                            <div class="product-card--body">
                                                <div class="product-header">
                                                    <span class="author">
                                                        HELI RC
                                                    </span>
                                                    <h3><a href="product-details.php">RC HELI 240V BATTERY</a></h3>
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
                                        <div class="product-card card-style-list">
                                            <div class="card-image">
                                                <img src="image/products/6.jpg" alt="">
                                            </div>
                                            <div class="product-card--body">
                                                <div class="product-header">
                                                    <span class="author">
                                                        HELI RC
                                                    </span>
                                                    <h3><a href="product-details.php">RC HELI 240V BATTERY</a></h3>
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
                                        <div class="product-card card-style-list">
                                            <div class="card-image">
                                                <img src="image/products/1.jpg" alt="">
                                            </div>
                                            <div class="product-card--body">
                                                <div class="product-header">
                                                    <span class="author">
                                                        HELI RC
                                                    </span>
                                                    <h3><a href="product-details.php">RC HELI 240V BATTERY</a></h3>
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
                                        <div class="product-card card-style-list">
                                            <div class="card-image">
                                                <img src="image/products/3.jpg" alt="">
                                            </div>
                                            <div class="product-card--body">
                                                <div class="product-header">
                                                    <span class="author">
                                                        HELI RC
                                                    </span>
                                                    <h3><a href="product-details.php">RC HELI 240V BATTERY</a></h3>
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
                            <div class="single-block bg-white">
                                <div class="section-title mt-0">
                                    <h2>NEWEST BATTERY</h2>
                                </div>
                                <div class="product-slider sb-slick-slider slider-border-single-row" data-slick-setting='{
                                        
                                        "autoplaySpeed": 8000,
                                        "slidesToShow": 3,
                                        "dots":true
                                    }' data-slick-responsive='[
                                        {"breakpoint":992, "settings": {"slidesToShow": 2} },
                                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                        {"breakpoint":480, "settings": {"slidesToShow": 1} },
                                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                                    ]'>
                                    <div class="single-slide">
                                        <div class="product-card">
                                            <div class="product-header">
                                                <span class="author">
                                                    TUTU BATTERY
                                                </span>
                                                <h3><a href="product-details.php">SOFTGUN AIR BATTERY</a></h3>
                                            </div>
                                            <div class="product-card--body">
                                                <div class="card-image">
                                                    <img src="image/products/9.jpg" alt="">
                                                    <div class="hover-contents">
                                                        
                                                        <div class="hover-btns">
                                                            <a href="cart.php" class="single-btn">
                                                                <i class="fas fa-shopping-basket"></i>
                                                            </a>
                                                        </div>
                                                    </div>
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
                                                <span class="author">
                                                    TUTU BATTERY
                                                </span>
                                                <h3><a href="product-details.php">SOFTGUN AIR BATTERY</a></h3>
                                            </div>
                                            <div class="product-card--body">
                                                <div class="card-image">
                                                    <img src="image/products/5.jpg" alt="">
                                                    <div class="hover-contents">
                                                        
                                                        <div class="hover-btns">
                                                            <a href="cart.php" class="single-btn">
                                                                <i class="fas fa-shopping-basket"></i>
                                                            </a>
                                                        </div>
                                                    </div>
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
                                                <span class="author">
                                                    TUTU BATTERY
                                                </span>
                                                <h3><a href="product-details.php">SOFTGUN AIR BATTERY</a></h3>
                                            </div>
                                            <div class="product-card--body">
                                                <div class="card-image">
                                                    <img src="image/products/4.jpg" alt="">
                                                    <div class="hover-contents">
                                                        
                                                        <div class="hover-btns">
                                                            <a href="cart.php" class="single-btn">
                                                                <i class="fas fa-shopping-basket"></i>
                                                            </a>
                                                        </div>
                                                    </div>
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
                                                <span class="author">
                                                    TUTU BATTERY
                                                </span>
                                                <h3><a href="product-details.php">SOFTGUN AIR BATTERY</a></h3>
                                            </div>
                                            <div class="product-card--body">
                                                <div class="card-image">
                                                    <img src="image/products/3.jpg" alt="">
                                                    <div class="hover-contents">
                                                        
                                                        <div class="hover-btns">
                                                            <a href="cart.php" class="single-btn">
                                                                <i class="fas fa-shopping-basket"></i>
                                                            </a>
                                                        </div>
                                                    </div>
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
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=================================
        CHILDREN’S BOOKS SECTION
        ===================================== -->
        <section class="section-margin">
            <div class="container">
                <div class="section-title section-title--bordered">
                    <h2>LIPO AIRSOFT GUNBATTERY</h2>
                </div>
                <div class="product-slider product-list-slider slider-border-single-row sb-slick-slider"
                    data-slick-setting='{
                                            "autoplay": true,
                                            "autoplaySpeed": 8000,
                                            "slidesToShow":3,
                                            "dots":true
                                        }' data-slick-responsive='[
                                            {"breakpoint":1200, "settings": {"slidesToShow": 2} },
                                            {"breakpoint":992, "settings": {"slidesToShow": 2} },
                                            {"breakpoint":575, "settings": {"slidesToShow": 1} },
                                            {"breakpoint":490, "settings": {"slidesToShow": 1} }
                                        ]'>
                    <div class="single-slide">
                        <div class="product-card card-style-list">
                            <div class="card-image">
                                <img src="image/products/10.jpg" alt="">
                            </div>
                            <div class="product-card--body">
                                <div class="product-header">
                                    <a href="#" class="author">
                                        LIPO AIRSOFT GUNBATTERY
                                    </a>
                                        <h3><a href="product-details.php">2100V Lipo heli battery</a></h3>
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
                        <div class="product-card card-style-list">
                            <div class="card-image">
                                <img src="image/products/3.jpg" alt="">
                            </div>
                            <div class="product-card--body">
                                <div class="product-header">
                                    <a href="#" class="author">
                                        LIPO AIRSOFT GUNBATTERY
                                    </a>
                                        <h3><a href="product-details.php">2100V Lipo heli battery</a></h3>
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
                        <div class="product-card card-style-list">
                            <div class="card-image">
                                <img src="image/products/2.jpg" alt="">
                            </div>
                            <div class="product-card--body">
                                <div class="product-header">
                                    <a href="#" class="author">
                                        LIPO AIRSOFT GUNBATTERY
                                    </a>
                                        <h3><a href="product-details.php">2100V Lipo heli battery</a></h3>
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
                        <div class="product-card card-style-list">
                            <div class="card-image">
                                <img src="image/products/1.jpg" alt="">
                            </div>
                            <div class="product-card--body">
                                <div class="product-header">
                                    <a href="#" class="author">
                                        LIPO AIRSOFT GUNBATTERY
                                    </a>
                                        <h3><a href="product-details.php">2100V Lipo heli battery</a></h3>
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
                        <div class="product-card card-style-list">
                            <div class="card-image">
                                <img src="image/products/7.jpg" alt="">
                            </div>
                            <div class="product-card--body">
                                <div class="product-header">
                                    <a href="#" class="author">
                                        LIPO AIRSOFT GUNBATTERY
                                    </a>
                                        <h3><a href="product-details.php">2100V Lipo heli battery</a></h3>
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
                        <div class="product-card card-style-list">
                            <div class="card-image">
                                <img src="image/products/9.jpg" alt="">
                            </div>
                            <div class="product-card--body">
                                <div class="product-header">
                                    <a href="#" class="author">
                                        LIPO AIRSOFT GUNBATTERY
                                    </a>
                                        <h3><a href="product-details.php">2100V Lipo heli battery</a></h3>
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
        </section>
       
    <?php include 'inc/footer.php' ?>
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <script src="js/plugins.js"></script>
    <script src="js/ajax-mail.js"></script>
    <script src="js/custom.js"></script>
</body>


<!-- Mirrored from demo.hasthemes.com/pustok-preview/pustok/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Dec 2019 12:43:34 GMT -->
</html>