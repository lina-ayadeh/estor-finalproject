<?php
session_start();

ob_start();


class Database{
    public $conn;
    
public function __construct()
{
    $this->connect_db();
}
    public function connect_db(){
        $this->conn=mysqli_connect("localhost","root","","estore");
if(mysqli_connect_error()){
    die("cannot conect to server". mysqli_connect_error() . mysqli_connect_errno());
        }
    }
}
$database = new Database();
$database->connect_db();
?>

<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>eCommerce HTML-5 Template </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

		<!-- CSS here -->
            <link rel="stylesheet" href="assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="assets/css/flaticon.css">
            <link rel="stylesheet" href="assets/css/slicknav.css">
            <link rel="stylesheet" href="assets/css/animate.min.css">
            <link rel="stylesheet" href="assets/css/magnific-popup.css">
            <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="assets/css/themify-icons.css">
            <link rel="stylesheet" href="assets/css/slick.css">
            <link rel="stylesheet" href="assets/css/nice-select.css">
            <link rel="stylesheet" href="assets/css/style.css">

            <style>
a:hover{color:black;}
a:link{color:black;}
a:visited {color:black;}
a:active{color:black;}


            </style>
   </head>

   <body>
       
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->

    <header>
        <!-- Header Start -->
       <div class="header-area">
            <div class="main-header ">
                <div class="header-top top-bg d-none d-lg-block">
                   <div class="container-fluid">
                       <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left d-flex">
                                    <div class="flag">
                                        <img src="assets/img/icon/jordan.png" alt=""style="width:50px;height: 50px;">
                                    </div>
                                    <div class="select-this">
                                        <form action="#">
                                            <div class="select-itms">
                                                <select name="select" id="select1">
                                                    <option value="">JOR</option>
                                                    
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                    <ul class="contact-now">     
                                        <li>+962 2345 7886</li>
                                    </ul>
                                </div>
                                <div class="header-info-right">
                                   <ul>                                          
                                       <li><a href="mainlogin.php">
                                        <?php if(isset($_SESSION['idc'])) {
               $quary="SELECT * FROM customer WHERE customer_id={$_SESSION['idc']}";
                    $result=mysqli_query($database->conn,$quary);
                    $cus=mysqli_fetch_assoc($result);
                    echo "<h4 style='color:#FFFFFF;'>{$cus['customer_name']}</h4>";
    
}else{
    echo "My Account";
}
?>   </a></li>
                                       
                                       <li><a href="product_list.php?all=100">Shopping</a></li>
                                       <li><a href="cart.php">Cart</a></li>
                                       <li><a href="checkout.php">Checkout</a></li>
                                       <li><a href="mainlogout.php">logout</a></li>
                                   </ul>
                                </div>
                            </div>
                       </div>
                   </div>
                </div>
               <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-3">
                                <div class="logo">
                                  <a href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-8 col-md-7 col-sm-5">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>                                                
                                        <ul id="navigation">                                                                                                                                     
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="Catagori.php">Catagori</a></li>
                                           
                                            
                                            <li><a href="#">Pages</a>
                                                <ul class="submenu">
                                                    <li><a href="mainlogin.php">Login</a></li>
                                                    <li><a href="cart.php">Card</a></li>
                                                    <li><a href="about.php">About</a></li>
                                                    <li><a href="checkout.php">Product Checkout</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.php">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div> 
                            <div class="col-xl-5 col-lg-3 col-md-3 col-sm-3 fix-card">
                                <ul class="header-right f-right d-none d-lg-block d-flex justify-content-between">
                                    <li class="d-none d-xl-block">
                                        <div class="form-box f-right ">
                                            <form action="product_list.php" method="post">
                                            <input type="text" name="intext" placeholder="Search products">
                                            <button class="search-icon" type="submit" name="search">
                                                <i   class="fas fa-search special-tag"></i>
                                            </button>
                                        </form>
                                        </div>
                                     </li>
                                    <li class=" d-none d-xl-block">
                                        <a href="favert.php"><i class="fas fa-heart"></i></a>
                                    </li>
                                    <li>
                                        
                                            <a href="cart.php"><i class="fas fa-cart-plus"></i></a>
                                    </li>
                                   <li class="d-none d-lg-block"> <a href="mainlogin.php" class="btn header-btn">Sign in</a></li>
                                </ul>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
       </div>
        <!-- Header End -->
    </header>