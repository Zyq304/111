<?php
include("include/common.php");

if (!$_SESSION['user_id']) {
    header("Location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patte - Member Center</title>
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
    <!-- nice-select -->
    <link rel="stylesheet" href="assets/css/nice-select.css">
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
                    <h2>Member Center</h2>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="index.php">Home</a>
                      </li>
                        <li class="breadcrumb-item active" aria-current="page">My Comments</li>
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
            <div class="col-lg-4 ">
                <div class="sidebar">
                    <h3><?=$_SESSION['name']?></h3>
                    <div class="boder-bar"></div>
                    <ul class="Meta">
                        <li><a href="user.php"><i class="fa-solid fa-angle-right"></i>My Profile</a></li>
                        <li><a href="mypets.php"><i class="fa-solid fa-angle-right"></i>My Pets</a></li>
                        <li><a href="myposts.php"><i class="fa-solid fa-angle-right"></i>My Posts</a></li>
                        <li><a href="mycomments.php"><i class="fa-solid fa-angle-right"></i>My Comments</a>
                        <li><a href="ajax.php?act=logout"><i class="fa-solid fa-angle-right"></i>Logout</a></li>
                    </ul>
                </div>

            </div>
            <div class="col-lg-8">
                <div class="blog-details">


                    <div class="information">
                        <h3>My Comments</h3>
                        <div class="boder-bar"></div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th width="5%"  class="tcenter"> Id</th>
                                    <th width="15%">Title</th>
                                    <th width="25%">Content</th>
                                    <th width="10%"  class="tcenter">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php

                                require_once("include/Page.php");

                                $page = $_GET['page'];
                                if(!$page)$page=1;

                                $start = ($page-1) * 10;

                                $where=" 1 and user_id=".$_SESSION['user_id'];

                                $count = $DB->count("SELECT count(*) FROM `comment` where {$where}");
                                $listRows = 10 ;

                                $p = new Page($count,$listRows);

                                $list = $DB->getAll("SELECT * FROM `comment` where {$where} order by id desc limit ".$p->firstRow.','.$p->listRows );


                                $pageBar = $p->show();

                                ?>

                                <?php foreach($list as $vo){ ?>
                                    <tr >
                                        <td><?=$vo['id']?></td>
                                        <td><?=getCommentTitle($vo['id'])?></td>
                                        <td><?=$vo['content']?></td>
                                        <td>
                                            <a href="editcomment.php?id=<?=$vo['id']?>"  class="mybtn btn-xs btn-primary ">Edit</a>
                                            <a href="javascript://" class="mybtn btn-xs btn-danger del " data-id="<?=$vo['id']?>" >Delete</a>

                                        </td>
                                    </tr>
                                <?php } ?>
                                <?php if(empty($list)){ ?>
                                    <tr>
                                        <td colspan="4" style="color:#F00; font-weight:bold" class="text-center"> No Record </td>
                                    </tr>
                                <?php } ?>


                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="pull-left" > &nbsp;

                                    <button type="button"   onclick="window.location='post.php'" class="btn btn-primary"> Add</button>

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="pull-right">

                                    <?php if(!empty($list)){ ?>
                                        <ul class="pagination m-auto">
                                            <?=$pageBar?>
                                        </ul>
                                    <?php } ?>
                                </div>


                                <div class="clearfix"></div>
                            </div>
                        </div>

                    </div>


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
<script src="assets/js/jquery.nice-select.min.js"></script>
<!-- fancybox -->
<script src="assets/js/jquery.fancybox.min.js"></script>
<script src="assets/js/custom.js"></script>

<script src="assets/js/jquery-validate/jquery.validate.js"></script>

<script type="text/javascript">


    jQuery(document).ready(function() {


        $(".del").click(function(){
            if(confirm("Are you sure to delete?")){
                $.ajax({
                    url: "ajax.php?act=delcomment",
                    type: "POST",
                    timeout: "5000",
                    data: {
                        id: $(this).data("id")
                    },
                    success: function(result) {

                        if (result.code == 200) {
                            alert("Delete successfully ");
                            setTimeout(function(){

                                location.reload();

                            },2000);
                        } else {
                            alert("Delete failure");
                        }
                    }
                })
            }

        })

    });

</script>

</body>
</html>

