<?php
include("include/common.php");

$id=$_GET['id'];

$row = $DB->get_row("SELECT * FROM `pet` WHERE id = $id");

$DB->query("update pet set hits=hits+1 where id = $id");

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patte - Pet Details</title>
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


<section class="banner" style="background-color: #fff8e5; background-image:url(assets/img/banner.png)">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="banner-text">
                    <h2>pet details</h2>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="index.php">Home</a>
                      </li>
                        <li class="breadcrumb-item"><a href="pet.php">Pet</a></li>

                        <li class="breadcrumb-item active" aria-current="page"><?=$row['title']?></li>
                    </ol>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="banner-img">
                    <div class="banner-img-1">
                        <svg width="260" height="260" viewBox="0 0 673 673" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.82698 416.603C-19.0352 298.701 18.5108 173.372 107.497 90.7633L110.607 96.5197C24.3117 177.199 -12.311 298.935 15.0502 413.781L9.82698 416.603ZM89.893 565.433C172.674 654.828 298.511 692.463 416.766 663.224L414.077 658.245C298.613 686.363 175.954 649.666 94.9055 562.725L89.893 565.433ZM656.842 259.141C685.039 374.21 648.825 496.492 562.625 577.656L565.413 582.817C654.501 499.935 691.9 374.187 662.536 256.065L656.842 259.141ZM581.945 107.518C499.236 18.8371 373.997 -18.4724 256.228 10.5134L259.436 16.4515C373.888 -10.991 495.248 25.1518 576.04 110.708L581.945 107.518Z" fill="#fa441d"></path>
                        </svg>
                        <img src="assets/img/banner-img-1.jpg" alt="banner">
                    </div>
                    <div class="banner-img-2">
                        <svg width="320" height="320" viewBox="0 0 673 673" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.82698 416.603C-19.0352 298.701 18.5108 173.372 107.497 90.7633L110.607 96.5197C24.3117 177.199 -12.311 298.935 15.0502 413.781L9.82698 416.603ZM89.893 565.433C172.674 654.828 298.511 692.463 416.766 663.224L414.077 658.245C298.613 686.363 175.954 649.666 94.9055 562.725L89.893 565.433ZM656.842 259.141C685.039 374.21 648.825 496.492 562.625 577.656L565.413 582.817C654.501 499.935 691.9 374.187 662.536 256.065L656.842 259.141ZM581.945 107.518C499.236 18.8371 373.997 -18.4724 256.228 10.5134L259.436 16.4515C373.888 -10.991 495.248 25.1518 576.04 110.708L581.945 107.518Z" fill="#fa441d"></path>
                        </svg>
                        <img src="assets/img/banner-img-2.jpg" alt="banner">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img src="assets/img/hero-shaps-1.png" alt="hero-shaps" class="img-2">
    <img src="assets/img/hero-shaps-1.png" alt="hero-shaps" class="img-4">
</section>
<section class="gap no-bottom">
  <div class="container">
    <div class="row product-info-section">
      <div class="col-lg-7 p-0">
        <div class="pd-gallery">
          <ul class="pd-imgs">

              <?php
                  if($row['photo1']){
                      $big=$row['photo1'];
                  }else if($row['photo2']){
                      $big=$row['photo2'];
                  }else if($row['photo3']){
                      $big=$row['photo3'];
                  }else {
                      $big=$row['photo'];
                  }

              ?>
              <?php if($row['photo1']){ ?>
                <li class="li-pd-imgs nav-active">
                    <a href="JavaScript:void(0)">
                      <img src="<?=$row['photo1']?>">
                    </a>
                </li>
              <?php } ?>
              <?php if($row['photo2']){ ?>
                  <li class="li-pd-imgs">
                      <a href="JavaScript:void(0)">
                          <img src="<?=$row['photo2']?>">
                      </a>
                  </li>
              <?php } ?>
              <?php if($row['photo3']){ ?>
                  <li class="li-pd-imgs">
                      <a href="JavaScript:void(0)">
                          <img src="<?=$row['photo3']?>">
                      </a>
                  </li>
              <?php } ?>

            </ul>
            <div class="pd-main-img">
              <img id="NZoomImg" alt="toys" src="<?=$big?>" >
              
            </div>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="product-info p-60">

            <h3><?=$row['title']?></h3>
            <div class="d-flex align-items-center">

                <span><?=$row['hits']?> Views</span>
            </div>

            <ul class="product_meta mt-5" >
                <li><span class="theme-bg-clr">Category:</span>
                  <ul class="pd-cat">
                    <li><a href="pet.php?category_id=<?=$row['id']?>"><?=getCategoryName($row['id'])?></a></li>
                  </ul>
                </li>

                <?php if($row['age']){ ?>
                <li><span class="theme-bg-clr">Age:</span>
                    <ul class="pd-cat">
                        <li>
                            <a href="javascript://"><?=$row['age']?></a>
                        </li>
                    </ul>
                </li>
                <?php } ?>
                <?php if($row['color']){ ?>
                    <li><span class="theme-bg-clr">Color:</span>
                        <ul class="pd-tag">
                            <li>
                                <a href="javascript://"><?=$row['color']?></a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if($row['weight']){ ?>
                    <li><span class="theme-bg-clr">Weight:</span>
                        <ul class="pd-tag">
                            <li>
                                <a href="javascript://"><?=$row['weight']?></a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if($row['address']){ ?>
                    <li><span class="theme-bg-clr">Address:</span>
                        <ul class="pd-tag">
                            <li>
                                <a href="javascript://"><?=$row['address']?></a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>

                <li><span class="theme-bg-clr">Owner:</span>
                  <ul class="pd-tag">
                     <li>
                         <a href="javascript://"><?=getUserName($row['user_id'])?></a>
                     </li>    
                  </ul>
                </li>
              </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="gap">
  <div class="container">
    <div class="information">
      <h3>Details</h3>
      <div class="boder-bar"></div>

        <?=$row['content']?>
    </div>

  </div>
</section>
<section class="gap no-top products-section">
  <div class="container">
    <div class="information">
      <h3>Related Pets</h3>
      <div class="boder-bar"></div>
    </div>

      <div class="row">
          <?php
          $list = $DB->getAll("SELECT * FROM `pet` where  status=1 and category_id=".$row['category_id']." and id!=".$row['id']." order by id desc limit 0,4" );
          foreach($list as $vo){
          ?>
              <div class="col-md-3 col-sm-6">
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
