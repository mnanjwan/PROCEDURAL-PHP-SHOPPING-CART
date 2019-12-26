       <div class="site-header header-4 mb--20 d-none d-lg-block">
            <div class="header-top header-top--style-2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <ul class="header-top-list">
                                <!-- <li class="dropdown-trigger currency-dropdown"><a href="#">£ GBP </a><i
                                        class="fas fa-chevron-down dropdown-arrow"></i>
                                    <ul class="dropdown-box">
                                        <li><a href="#">€ Euro</a></li>
                                        <li><a href="#">£ Pound Sterling</a></li>
                                        <li><a href="#">$ US Dollar</a></li>
                                    </ul>
                                </li> -->
                                
                                        <li><span style="color:red">free</span> shipping for order above <span style="color:green">$49 </span> only to <span style="color:red">US </span> </li>
                                        
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
                            <nav class="category-nav ">
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
                                        <li class="cat-item"><a href="rcbattery.php">RC Car Batteries</a></li>
                                        <li class="cat-item"><a href="#">RC Heli & Airplane Batteries</a></li>
                                        <li class="cat-item"><a href="#">UAV Battery</a></li>
                                        <li class="cat-item"><a href="#">Airsoft GunBatteries</a></li>
                                        <li class="cat-item"><a href="#">FPV Quad Batteries</a></li>
                                        
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
                                    <li> <a href="checkout.php">EUR €</a></li>
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