<?php include('include/mainheader.php');

?>

<?php unset($_SESSION['cid']);
unset($_SESSION['sid']); ?>
    <main>
        <!-- slider Area Start -->
        <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="slider-active">
                <div class="single-slider slider-height" data-background="assets/img/hero/h2_hero.jpg">
                    <div class="container">
                        <div class="row d-flex align-items-center justify-content-between">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 d-none d-md-block">
                             <div class="container">
                                <div class="hero__img" data-animation="bounceIn" data-delay=".4s">
                                   
                                 <iframe src="https://assets.pinterest.com/ext/embed.html?id=290130400999341907" height="700" width="600" frameborder="0" scrolling="no" style="height:550px; "></iframe>
</div>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8">
                                <div class="hero__caption">
                                    <span data-animation="fadeInRight" data-delay=".4s">60% Discount</span>
                                    <h1 data-animation="fadeInRight" data-delay=".6s">NEW <br> Collection</h1>
                                    <p data-animation="fadeInRight" data-delay=".8s">Best phone Collection By 2020!</p>
                                    <!-- Hero-btn -->
                                    <div class="hero__btn" data-animation="fadeInRight" data-delay="1s">
                                        <a href="catagori.php" class="btn hero-btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slider slider-height" data-background="assets/img/hero/h1_hero.jpg">
                    <div class="container">
                        <div class="row d-flex align-items-center justify-content-between">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 d-none d-md-block">
                                <div class="hero__img" data-animation="bounceIn" data-delay=".4s">
                                    <img src="assets/img/hero/hero_man.png" alt="">
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8">
                                <div class="hero__caption">
                                    <span data-animation="fadeInRight" data-delay=".4s">60% Discount</span>
                                    <h1 data-animation="fadeInRight" data-delay=".6s">NEW <br> Collection</h1>
                                    <p data-animation="fadeInRight" data-delay=".8s">Best Cloth Collection By 2020!</p>
                                    <!-- Hero-btn -->
                                    <div class="hero__btn" data-animation="fadeInRight" data-delay="1s">
                                        <a href="catagori.php" class="btn hero-btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
        <!-- Category Area Start-->
        <section class="category-area section-padding30">
            <div class="container-fluid">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center mb-85">
                            <h2>Shop by SubCategory</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                     <?php
                $query="SELECT * FROM sub_category ";
                $result=mysqli_query($database->conn,$query);
                $i=1;
                while ( $row=mysqli_fetch_assoc($result)) {
                    
                  echo'  <div class="col-xl-4 col-lg-6">
                        <div class="single-category mb-30">';
                        
                           echo ' <div class="category-img">';
                              echo" <img src='mainimg/{$row["sub_img"]}' style='width:100%;height:400px;'>";
                               echo' <div class="category-caption">';
                                    
                                   echo "<span class='best'><a href='product_list.php?subid={$row["sub_cat_id"]}'> {$row["sub_cat_name"]}</a></span>";
                                   echo' <span class="collection">New Collection</span>
                                </div>
                            </div>';
                             /* if($i==2){
                           echo ' <div class="category-img">
                               <img src="assets/img/categori/cat22.jpg" style="width:100%;height:400px;" alt="">
                                <div class="category-caption">
                                    ';
                                   echo "<span class='best'><a href='product_list.php?subid={$row["sub_cat_id"]}'>  {$row["sub_cat_name"]}</a></span>";
                                   echo' <span class="collection">New Collection</span>
                                </div>
                            </div>';}
                              if($i==3){
                           echo ' <div class="category-img">
                               <img src="assets/img/categori/cat33.jpg" style="width:100%;height:400px;" alt="">
                                <div class="category-caption">
                                    ';
                                   echo "<span class='best'><a href='product_list.php?subid={$row["sub_cat_id"]}'>  {$row["sub_cat_name"]}</a></span>";
                                   echo' <span class="collection">New Collection</span>
                                </div>
                            </div>';}*/

                        echo'</div>
                    </div>';
                    }
                    ?>
                </div>
            </div>
        </section>
        <!-- Category Area End-->
        <!-- Latest Products Start -->
        <section class="latest-product-area padding-bottom">
            <div class="container">
                <div class="row product-btn d-flex justify-content-end align-items-end">
                    <!-- Section Tittle -->
                    <div class="col-xl-4 col-lg-5 col-md-5">
                        <div class="section-tittle mb-30">
                            <h2>Latest Products</h2>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7 col-md-7">
                        <div class="properties__button f-right">
                            <!--Nav Button  -->
                            <nav>                                                                                                
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">All</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">New</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Featured</a>
                                    <a class="nav-item nav-link" id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false">Offer</a>
                                </div>
                            </nav>
                            <!--End Nav Button  -->
                        </div>
                    </div>
                </div>
                <!-- Nav Card -->
                <div class="tab-content" id="nav-tabContent">
                    <!-- card one -->
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row">
                             <?php
                $query="SELECT * FROM product WHERE block_allow='allow'";
                $result=mysqli_query($database->conn,$query);
                $j=1;
                while ( $row=mysqli_fetch_assoc($result)) {
                            echo '<div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="single-product mb-60">
                                    <div class="product-img">';
                                       echo" <img src='mainimg/{$row["pro_img"]}' style='width:100%;height:400px;' alt=''>";
                                        echo'<div class="new-product">
                                            
                                        </div>
                                    </div>
                                    <div class="product-caption">
                                        <div class="product-ratting">
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star low-star"></i>
                                            <i class="far fa-star low-star"></i>
                                        </div>';
                                       echo" <h4><a href='single-product.php?proid={$row["pro_id"]}''>{$row['pro_name']}</a></h4>";
                                       echo' <div class="price">
                                            <ul>';
                                               echo "<li>{$row['pro_price']} $</li>
                                               <a href='favert.php?pid={$row["pro_id"]}}'><i class='fas fa-heart'></i></a>";
                                                
                                           echo' </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                            if($j<6){
                                 $j++;}else{
                                    break;
                            }
                            }?>
                         
                        </div>
                    </div>
                </div>
                <!-- End Nav Card -->
            </div>
        </section>
        <!-- Latest Products End -->
        <!-- Best Product Start -->
        <div class="best-product-area lf-padding" >
           <div class="product-wrapper bg-height" style="background-image: url('assets/img/categori/card.png')">
                
                    <div class="row justify-content-between align-items-end">
                        <div class="product-man position-absolute  d-none d-lg-block">
                            <iframe src="https://assets.pinterest.com/ext/embed.html?id=62768988544254485" height="520" width="300" frameborder="0" scrolling="no" ></iframe>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 d-none d-lg-block">
                            <div class="vertical-text">
                                
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8">
                            <div class="best-product-caption">
                                <h2>Find The Best <br>Product <br>from Our Shop</h2>
                                <p>The latest wonderful designs</p>
                                
                            </div>
                       
                    </div>
                </div>
           </div>
           <!-- Shape -->
           <div class="shape bounce-animate d-none d-md-block">
               <iframe src="https://assets.pinterest.com/ext/embed.html?id=613967361682938899" height="310" width="200" frameborder="0" scrolling="no"  ></iframe>
           </div>
        </div>
        <!-- Best Product End-->
        <!-- Best Collection Start -->
  
        <!-- Best Collection End -->
        <!-- Latest Offers Start -->
        <div class="latest-wrapper lf-padding" style="padding-top:80px;">
            <div class="latest-area latest-height d-flex align-items-center" data-background="assets/img/collection/latest-offer.png">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-xl-5 col-lg-5 col-md-6 offset-xl-1 offset-lg-1">
                            <div class="latest-caption">
                                <h2>Get Our<br>Latest Offers News</h2>
                                
                            </div>
                        </div>
                         <div class="col-xl-5 col-lg-5 col-md-6 ">
                            <div class="latest-subscribe">
                                <form action="catagori.php">
                                    
                                    <button>Shop Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- man Shape -->
                <div class="man-shape">
                    <img src="assets/img/collection/latest-man.png" alt="">
                </div>
            </div>
        </div>
        <!-- Latest Offers End -->
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
        <!-- Gallery Start-->
        <div class="gallery-wrapper lf-padding">
            <div class="gallery-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="gallery-items">
                            <img src="assets/img/gallery/10.jpg" style="width:270px;height: 300px;"alt="">
                        </div> 
                        <div class="gallery-items">
                            <img src="assets/img/gallery/g1.jpg" style="width:270px;height: 300px;"alt="">
                        </div>
                        <div class="gallery-items">
                            <img src="assets/img/gallery/g3.jpg" style="width:270px;height: 300px;"alt="">
                        </div>
                        <div class="gallery-items">
                            <img src="assets/img/gallery/g2.jpg" style="width:270px;height: 300px;"alt="">
                        </div>
                        <div class="gallery-items">
                            <img src="assets/img/gallery/22.jpg" style="width:270px;height: 300px;"alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Gallery End-->

    </main>
  <?php include('include/mainfooter.php');?>