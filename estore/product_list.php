
<?php 

include('include/mainheader.php');
?>

    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/back3.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2 style="color:#4B0082;">product list</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    
    <!-- product list part start-->
    <section class="product_list section_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="product_sidebar">
                        <div class="single_sedebar">
                             <form action="product_list.php" method="post">
                                <input type="text" name="intext" placeholder="Search keyword">
                                 <button class="search-icon" type="submit" name="search">
                                <i   class="fas fa-search special-tag" style="color:black;"></i>
                            </button>
                            </form>
                        </div>
                        <div class="single_sedebar">

                            <div class="select_option">

                              <?php 
                                echo "<div class='select_option_list'> Category <i class='right fas fa-caret-down'></i> </div>";

                                 $query="SELECT * FROM category ";
                $result=mysqli_query($database->conn,$query);
                while ( $row=mysqli_fetch_assoc($result)) {
                               echo '<div class="select_option_dropdown">';
                                  echo"<p><a href='product_list.php?catid={$row['cat_id']}'>{$row['cat_name']}</a></p>
                                </div>";
                               } ?>
                            </div>
                        </div>
                        <div class="single_sedebar">
                            <div class="select_option">
                                <div class="select_option_list">Sub_Catagori <i class="right fas fa-caret-down"></i> </div>
                                <?php  
                                 $query="SELECT * FROM sub_category  ";
                $result=mysqli_query($database->conn,$query);
                while ( $row=mysqli_fetch_assoc($result)) {

                               echo' <div class="select_option_dropdown">';
                                    echo"<p><a href='product_list.php?subid={$row["sub_cat_id"]}'>{$row['sub_cat_name']}</a></p>
                                    
                                </div>";
                            }?>
                            
                            </div>
                        </div>
                        <div class="load_more_btn text-center">
                            <a href="product_list.php?all=100" class="btn_3">all product</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="product_list">
                         

                         <?php
                          if(isset($_GET['catid']) && !isset($_SESSION['sid'])){
                            $query="SELECT * FROM category WHERE cat_id={$_GET['catid']}";
                $result=mysqli_query($database->conn,$query);
                $row1=mysqli_fetch_assoc($result) ;
                echo" <div class='hero__btn' data-animation='fadeInRight' data-delay='1s'>
                <button class='btn header-btn' >{$row1 ['cat_name']}</button>
                                 </div>
                                 <div class='row'>";
                                   
                
                            $_SESSION['cid']=$_GET['catid'];
                               $query="SELECT * FROM product  WHERE cat_id={$_GET['catid']} AND block_allow='allow'";
                $result=mysqli_query($database->conn,$query);
                while ( $row=mysqli_fetch_assoc($result)) {
                         echo '<div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">';
                                   echo"<img src='mainimg/{$row ['pro_img']}'   style='width:100%;height: 350px;' alt='' class='img-fluid'>
                                   <h3> <a href='single-product.php?proid={$row['pro_id']}'>{$row['pro_name']}</a> </h3>
                                    <h3> <a href='single-product.php?proid={$row['pro_id']}'>{$row['pro_desc']}</a> </h3>
                                    <p>From {$row['pro_price']}$</p>
                                     <a href='favert.php?pid={$row["pro_id"]}'><i class='fas fa-heart'></i></a>
                                </div>
                            </div>";
                        }
                    }?>
                     <?php
                      if(isset($_GET['subid']) && !isset($_SESSION['cid'])){
                           $query="SELECT * FROM sub_category WHERE sub_cat_id={$_GET['subid']}";
                $result=mysqli_query($database->conn,$query);
                $row1=mysqli_fetch_assoc($result) ;
                echo" <div class='hero__btn' data-animation='fadeInRight' data-delay='1s'>
                <button class='btn header-btn' >{$row1 ['sub_cat_name']}</button>
                                 </div>
                                 <div class='row'>";
                     $_SESSION['sid']=$_GET['subid'];
                    $query="SELECT * FROM product  WHERE sub_cat_id={$_GET['subid']} AND block_allow='allow'";
                $result=mysqli_query($database->conn,$query);
                while ( $row=mysqli_fetch_assoc($result)) {
                         echo '<div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">';
                                   echo"<img src='mainimg/{$row['pro_img']}'  style='width:100%;height: 350px;' alt='' class='img-fluid'>
                                   <h3> <a href='single-product.php?proid={$row['pro_id']}'>{$row['pro_name']}</a> </h3>
                                    <h3> <a href='single-product.php?proid={$row['pro_id']}'>{$row['pro_desc']}</a> </h3>

                                    <p>From {$row['pro_price']}$</p>
                                     <a href='favert.php?pid={$row["pro_id"]}'><i class='fas fa-heart'></i></a>
                                </div>
                            </div>";
                        }
                            
                         }

                      if(isset($_SESSION['sid']) && isset($_GET['catid'])){
                           $query="SELECT * FROM category WHERE cat_id={$_GET['catid']}";
                $result=mysqli_query($database->conn,$query);
                $row1=mysqli_fetch_assoc($result) ;
                echo" <div class='hero__btn' data-animation='fadeInRight' data-delay='1s'>
                <button class='btn header-btn' >{$row1 ['cat_name']}</button>
                                 ";
                                // <div class='row'>";
                         $query="SELECT * FROM sub_category WHERE sub_cat_id={$_SESSION['sid']}";
                $result=mysqli_query($database->conn,$query);
                $row1=mysqli_fetch_assoc($result) ;
                echo"
                <button class='btn header-btn' >{$row1 ['sub_cat_name']}</button>
                                 </div>
                                 <div class='row'>";

                               $query="SELECT * FROM product  WHERE sub_cat_id={$_SESSION['sid']} AND cat_id={$_GET['catid']} AND block_allow='allow'";
                $result=mysqli_query($database->conn,$query);
                while ( $row=mysqli_fetch_assoc($result)) {
                         echo '<div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">';
                                   echo"<img src='mainimg/{$row['pro_img']}'  style='width:100%;height: 350px;' alt='' class='img-fluid'>
                                   <h3> <a href='single-product.php?proid={$row['pro_id']}'>{$row['pro_name']}</a> </h3>
                                    <h3> <a href='single-product.php?proid={$row['pro_id']}'>{$row['pro_desc']}</a> </h3>
                                    <p>From {$row['pro_price']}$</p>
                                     <a href='favert.php?pid={$row["pro_id"]}'><i class='fas fa-heart'></i></a>
                                </div>
                            </div>";
                        }
                    }

                         if(isset($_GET['subid']) && isset($_SESSION['cid'])){
                           $query="SELECT * FROM category WHERE cat_id={$_SESSION['cid']}";
                $result=mysqli_query($database->conn,$query);
                $row1=mysqli_fetch_assoc($result) ;
                echo" <div class='hero__btn' data-animation='fadeInRight' data-delay='1s'>
                <button class='btn header-btn' >{$row1 ['cat_name']}</button>
                                 ";
                                // <div class='row'>
                         $query="SELECT * FROM sub_category WHERE sub_cat_id={$_GET['subid']}";
                $result=mysqli_query($database->conn,$query);
                $row1=mysqli_fetch_assoc($result) ;
               echo" 
                <button class='btn header-btn' >{$row1 ['sub_cat_name']}</button>
                                 </div>
                                 <div class='row'>";

                               $query="SELECT * FROM product  WHERE sub_cat_id={$_GET['subid']} AND cat_id={$_SESSION['cid']} AND block_allow='allow'";
                $result=mysqli_query($database->conn,$query);
                while ( $row=mysqli_fetch_assoc($result)) {
                         echo '<div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">';
                                   echo"<img src='mainimg/{$row['pro_img']}'  style='width:100%;height: 350px;' alt='' class='img-fluid'>
                                   <h3> <a href='single-product.php?proid={$row['pro_id']}'>{$row['pro_name']}</a> </h3>
                                    <h3> <a href='single-product.php?proid={$row['pro_id']}'>{$row['pro_desc']}</a> </h3>
                                    <p>From {$row['pro_price']}$</p>
                                     <a href='favert.php?pid={$row["pro_id"]}'><i class='fas fa-heart'></i></a>
                                </div>
                            </div>";
                        }
                    }



                     if(isset($_GET['all']) ){
                        unset($_SESSION['cid']);
                        unset($_SESSION['sid']);
                        echo"<div class='row'>";
                    $query="SELECT * FROM product WHERE  block_allow='allow'";
                $result=mysqli_query($database->conn,$query);
                while ( $row=mysqli_fetch_assoc($result)) {
                         echo '<div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">';
                                   echo"<img src='mainimg/{$row["pro_img"]}' style='width:100%;height: 350px;' alt='' class='img-fluid'>
                                   <h3> <a href='single-product.php?proid={$row['pro_id']}'>{$row['pro_name']}</a> </h3>
                                    <h3> <a href='single-product.php?proid={$row['pro_id']}'>{$row['pro_desc']}</a> </h3>
                                    <p>From {$row['pro_price']}$</p>
                                     <a href='favert.php?pid={$row["pro_id"]}'><i class='fas fa-heart'></i></a>
                                </div>
                            </div>";
                        }
                            
                         }
                    ?>
                    <?php
                    if(isset($_POST['search'])){
                         unset($_SESSION['cid']);
                        unset($_SESSION['sid']);
                       $inbut=$_POST['intext'];
                           if(!empty($inbut)){
                           echo" <div class='row'>";
                       $query="SELECT * FROM product WHERE  block_allow='allow'";
                $result=mysqli_query($database->conn,$query);
                while ( $row=mysqli_fetch_assoc($result)) {
                    if( preg_match("/$inbut/i", $row["pro_name"]) || preg_match("/$inbut/i", $row["pro_desc"]) ){
                         echo '<div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">';
                                   echo"<img src='mainimg/{$row["pro_img"]}' style='width:100%;height: 350px;' alt='' class='img-fluid'>
                                   <h3> <a href='single-product.php?proid={$row['pro_id']}'>{$row['pro_name']}</a> </h3>
                                    <h3> <a href='single-product.php?proid={$row['pro_id']}'>{$row['pro_desc']}</a> </h3>
                                    <p>From {$row['pro_price']}$</p>
                                     <a href='favert.php?pid={$row["pro_id"]}'><i class='fas fa-heart'></i></a>
                                </div>
                            </div>";
                        }
                        }
}else{
    header("location:index.php");
}
                 }

                    ?>
                           
                        </div>
                        <div class="load_more_btn text-center">
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product list part end-->
    
    <!-- client review part here -->
    <section class="client_review">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="client_review_slider owl-carousel">
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="assets/img/h1back.jpg" alt="#">
                            </div>
                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                            <h5>lina ayadeh</h5>
                        </div>
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="assets/img/h1back.jpg" alt="#">
                            </div>
                            <p>"We always aspire to be the best in the phone market and its requirements are "always renewed".</p>
                            <h5>lina ayadeh</h5>
                        </div>
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="assets/img/h1back.jpg" alt="#">
                            </div>
                            <p>"We seek to spread in all countries of the world and are firmly in control of our field.</p>
                            <h5>lina ayadeh</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- client review part end -->

    <!-- Shop Method Start-->
    <div class="shop-method-area section-padding30" >
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="single-method mb-40">
                            <i class="ti-package"></i>
                            <h6>Free Shipping Method</h6>
                            <p>Free shipping to all Arab countries, in safe ways and at the lowest costs.</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="single-method mb-40">
                            <i class="ti-unlock"></i>
                            <h6>Secure Payment System</h6>
                            <p>Safe, easy and accessible payment method for all Arab countries.</p>
                        </div>
                    </div> 
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="single-method mb-40">
                            <i class="ti-reload"></i>
                            <h6>Replacement of parts</h6>
                            <p>Ensure the arrival of high-quality parts with the possibility of easy replacement.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Shop Method End-->

    <!-- subscribe part here -->
    <section class="subscribe_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="subscribe_part_content">
                        <h2>Get promotions & updates!</h2>
                        <p>Enabling the possibility of developing and updating goods almost every day ... to keep up with everything new and provide the best and quality products.</p>
                        <div class="subscribe_form">
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subscribe part end -->

     <?php include('include/mainfooter.php');?>