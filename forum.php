<?php

include("include/common.php");

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patte - Forum</title>
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
                    <h2>Forum</h2>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="index.php">Home</a>
                      </li>
                        <li class="breadcrumb-item active" aria-current="page">Forum</li>
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
<section class="gap">
    <div class="container">
        <div class="row">
            <?php


            require_once("include/Page.php");
            $board = $DB->getAll("SELECT * FROM `board` " );

            $keyword=$_GET['keyword'];

            $board_id=$_GET['board_id'];


            $page = $_GET['page'];
            if(!$page)$page=1;

            $start = ($page-1) * 10;

            $where=" status=1 ";

            if($keyword){
                $where.=" and (title like  '%".$keyword."%' or content like  '%".$keyword."%'  ) ";
            }

            if($board_id){
                $where.=" and ( board_id ='".$board_id."') ";
            }


            $count = $DB->count("SELECT count(*) FROM `post` where {$where}");
            $listRows = 9 ;

            $p = new Page($count,$listRows);

            $list = $DB->getAll("SELECT * FROM `post` where {$where} order by id desc limit ".$p->firstRow.','.$p->listRows );


            $pageBar = $p->show();


            ?>
            <div class="col-md-12 mb-md-2">
                <nav class="navbar">
                    <ul class="navbar-links">
                        <li class="navbar-dropdown  <?=$board_id==''?'active':''?>">
                            <a href="forum.php">All</a>
                        </li>
                        <?php

                        foreach($board as $vo){
                            ?>
                            <li class="navbar-dropdown <?=$board_id==$vo['id']?'active':''?>">
                                <a href="forum.php?board_id=<?=$vo['id']?>"><?=$vo['title']?></a>
                            </li>
                        <?php } ?>

                    </ul>
                </nav>
            </div>

            <div class="col-lg-8">
                <div class="blog-details">


                    <div class="comment"  style="padding-top: 0px">

                        <ul>


                            <?php
                            foreach($list as $vo){
                            ?>
                            <li>
                                <img  src="<?=getUserAvatar($vo['user_id'])?>" width="100" >
                                <div class="comment-data">
                                    <h4><?=getUserName($vo['user_id'])?></h4>
                                    <span><?=date("Y-m-d H:i:s",$vo['update_time'])?></span>
                                    <p class="pt-4"><a href="post_details.php?id=<?=$vo['id']?>"><?=$vo['title']?></a> </p>
                                </div>
                            </li>
                            <?php } ?>


                        </ul>
                    </div>

                    <div class="mt-5">
                        <?php if(!empty($list)){ ?>
                            <ul class="pagination m-auto">
                                <?=$pageBar?>
                            </ul>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 " style="margin-top: 30px">
                <div class="sidebar">
                    <h3>Search</h3>
                    <div class="boder-bar"></div>

                    <div class="search-popup2">
                    <form method="get" action="forum.php">
                        <div class="form-group">
                            <input type="text" name="keyword" value="" placeholder="Search Here" required="">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                    </div>

                </div>

                    <div class="sidebar">
                        <a  href="post.php" class="button" style="width: 100%;text-align: center">Post</a>

                </div>
                    <div class="sidebar">
                        <h3>Hot Posts</h3>
                        <div class="boder-bar"></div>
                        <ul class="recent-post">
                            <?php
                            $list = $DB->getAll("SELECT * FROM `post` where  status=1 order by hits desc limit 0,3" );
                            foreach($list as $vo){
                            ?>
                            <li>
                                <img  src="<?=getUserAvatar($vo['user_id'])?>" width="60">
                                <div>
                                    <span><?=date("Y-m-d H:i:s",$vo['update_time'])?></span>
                                    <a href="post_details.php?id=<?=$vo['id']?>"><?=$vo['title']?></a>
                                </div>
                            </li>
                            <?php } ?>


                        </ul>
                    </div>


            </div>
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
