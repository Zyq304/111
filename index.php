<?php

include("include/common.php");

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patte</title>
  <link rel="icon" href="assets/img/heading-img.png">
  <!-- CSS only -->
   <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
   <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
   <link rel="stylesheet" href="assets/css/slick.css">
   <link rel="stylesheet" href="assets/css/slick-theme.css">
   <!-- fancybox -->
   <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">
   <link rel="stylesheet" href="assets/css/fontawesome.min.css">
   <!-- style -->
   <link rel="stylesheet" href="assets/css/style.css">
   <!-- responsive -->
   <link rel="stylesheet" href="assets/css/responsive.css">
   <!-- color -->
   <link rel="stylesheet" href="assets/css/color.css">
   <!-- jQuery -->
   <script src="assets/js/jquery-3.6.0.min.js"></script>
   <script src="assets/js/preloader.js"></script>
 </head>
<body>

<?php include("header.php"); ?>
<section class="hero-section" style="background-color: #fff8e5; background-image:url(assets/img/background.png)">
    <div class="container">
        <div class="row hero-one-slider owl-carousel owl-theme">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="hero-text">
                            <h1>Take a Good Care of Pets</h1>
                            <h3>We are your local dog home boarding service giving you complete</h3>
                            
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="hero-img">
                            <img src="assets/img/hero-img-1.png" alt="img">
                            <img src="assets/img/hero-shaps.png" alt="hero-shaps" class="img-1">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="hero-text">
                            <h1>Healthy Pets, Happy People</h1>
                            <h3>We are your local dog home boarding service giving you complete</h3>
                            
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="hero-img">
                            <img src="assets/img/slide-3.png" alt="img">
                            <img src="assets/img/hero-shaps.png" alt="hero-shaps" class="img-1">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="hero-text">
                            <h1>Take a Good Care of Pets</h1>
                            <h3>We are your local dog home boarding service giving you complete</h3>
                            
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="hero-img">
                            <img src="assets/img/slide-2.png" alt="img">
                            <img src="assets/img/hero-shaps.png" alt="hero-shaps" class="img-1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img src="assets/img/hero-shaps-1.png" alt="hero-shaps" class="img-2">
    <img src="assets/img/dabal-foot-1.png" alt="hero-shaps" class="img-3">
    <img src="assets/img/hero-shaps-1.png" alt="hero-shaps" class="img-4">
</section> 

<section class="gap no-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="welcome-to">
                    <?=getBlock(1)?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="dog-walker two d-block">
                    <img src="assets/img/puppies.png" class="puppies" alt="puppies">
                    <img src="assets/img/dog-walker-1.png" class="w-100" alt="dog walker">
                    <img src="assets/img/line.png" class="line" alt="line">
                    <img src="assets/img/dabal-foot.png" class="dabal-foot" alt="dabal-foot">
                    <img src="assets/img/haddi.png" class="haddi" alt="haddi">
                </div>
            </div>
        </div>
    </div>
</section> 
<section class="gap">
    <div class="container">
        <div class="heading">
            <img src="assets/img/heading-img.png" alt="heading-img">
            <h6>Find Pet By Category</h6>
            <h2>Categories</h2>
        </div>
        <div class="row slider-categorie owl-carousel owl-theme">
            <?php
            $list = $DB->getAll("SELECT * FROM `category` " );
            foreach($list as $vo){
            ?>
            <div class="col-lg-12 item">
                <div class="food-categorie">
                    <img src="assets/img/food-categorie-<?=$vo['id']?>.png" alt="food-categorie">
                    <a href="pet.php?category_id=<?=$vo['id']?>"><?=$vo['title']?></a>
                </div>
            </div>
            <?php } ?>

        </div>
    </div>
</section>
<section class="gap section-healthy-product" style="background-image: url(assets/img/healthy-product.png); background-color: #f5f5f5;">
    <div class="container">
        <div class="heading">
            <img src="assets/img/heading-img.png" alt="heading-img">
            <h6>Find Pet</h6>
            <h2>Latest Pets</h2>
        </div>
        <div class="row">
            <?php
            $list = $DB->getAll("SELECT * FROM `pet` where  status=1 order by id desc limit 0,4" );
            foreach($list as $vo){
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="healthy-product">
                    <div class="healthy-product-img">
                        <a href="pet_details.php?id=<?=$vo['id']?>"><img src="<?=$vo['photo']?>" ></a>
                    </div>
                    <span><?=getCategoryName($vo['category_id'])?></span>
                    <a href="pet_details.php?id=<?=$vo['id']?>"><?=$vo['title']?></a>
                </div>
            </div>
            <?php } ?>

        </div>
    </div>
</section> 


<section class="section-client gap" style="background-image: url(assets/img/client-b.jpg)">
    <div class="container">
        <div class="heading two">
            <h2>What Our Client’s Say</h2>
        </div>
        <div class="client-slider owl-carousel owl-theme">
            <?php
            $list = $DB->getAll("SELECT * FROM `post` where  status=1 order by id desc limit 0,4" );
            foreach($list as $vo){
            ?>
            <div class="item" >
                <div class="client">
                    <img src="assets/img/client.png" alt="client">
                    <div class="client-text">

                        <p><a href="post_details.php?id=<?=$vo['id']?>"><?=$vo['title']?></a></p>
                        <h4><?=getUserName($vo['user_id'])?></h4>
                        <span><?=getBoardName($vo['board_id'])?></span>
                        <i class="quote">
                            <img src="assets/img/quote.png" alt="quote">
                        </i>
                    </div>
                </div>
            </div>

            <?php } ?>

        </div>

    </div>
</section> 

<?php include ("footer.php");?>

<!-- Bootstrap Js -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/slick.min.js"></script>
<!-- fancybox -->
<script src="assets/js/jquery.fancybox.min.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>
