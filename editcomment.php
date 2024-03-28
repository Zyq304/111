﻿<?php
include("include/common.php");

if (!$_SESSION['user_id']) {
    header("Location: login.php");
    exit;
}



$row = $DB->get_row("SELECT * FROM `comment` WHERE user_id=".$_SESSION['user_id']." and id = ".$_GET['id']);


$user_id=$row['user_id'];

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
                        <li class="breadcrumb-item">
                            <a href="mycomments.php">My Comments</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Comment</li>
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

                    <div class="comments">


                        <form name="mainForm" id="mainForm" class="checkout-meta donate-page">
                            <input type="hidden" name="id"  value="<?=$row['id']?>"    />
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3>Edit Comment</h3>
                                    <div class="col-lg-12">
                                        <div class="col-lg-12 col-md-12 col-sm-12 column">
                                            <div class="form-group">

                                                <div  style="padding-top: 7px">
                                                    Title:   <?=getCommentTitle($row['id'])?> </div>
                                            </div>
                                        </div>


                                        <textarea name="content"  placeholder="Content"  style="width:100%;height:200px;visibility:hidden;"><?=$row["content"]?></textarea>

                                        <div class="col-lg-12 col-md-12 col-sm-12 column">


                                        <div class="form-group">
                                                 <div  style="padding-top: 7px">
                                                    Create Time:  <?=date("Y-m-d H:i:s",$row['create_time'])?> </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 column">
                                            <div class="form-group">

                                                <div  style="padding-top: 7px">
                                                    Update Time:  <?=date("Y-m-d H:i:s",$row['update_time'])?> </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <button class="button mt-4 mb-lg-0 mb-5 comment-submit" parent_id="0">Submit</button>

                            <a href="myposts.php"    class="btn btn-default prevBtn"> Back </a>
                            <div class="row" style="margin-top:20px;">
                                <div class="col-md-12">
                                    <div class="alert alert-danger display-none"> <div id="error_info" >Make sure the required fields are filled in!</div>
                                    </div>
                                    <div class="alert alert-success display-none">   <div id="success_info" ></div>
                                    </div>
                                </div>
                            </div>
                        </form>


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
<script>

    function showwin(url){
        window.open(url,"_blank","height=150,width=250,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,left=250,top=180,");
    }
    jQuery(document).ready(function() {


        /*	Validate the form elements
        /*-----------------------------------------------------------------------------------*/
        var mainForm = $('#mainForm');
        var alert_success = $('.alert-success', mainForm);
        var alert_error = $('.alert-danger', mainForm);

        mainForm.validate({
            doNotHideMessage: true,
            errorClass: 'error-span',
            errorElement: 'span',
            rules: {

            },
            messages: {

            },
            invalidHandler: function (event, validator) {
                alert_success.hide();
                $("#error_info").html('Make sure the required fields are filled in!');
                alert_error.show();
            },

            highlight: function (element) {
                $(element)
                    .closest('.form-group').removeClass('has-success').addClass('has-error');
            },

            unhighlight: function (element) {
                $(element)
                    .closest('.form-group').removeClass('has-error');
            },

            success: function (label) {

                label.addClass('valid')
                    .closest('.form-group').removeClass('has-error').addClass('has-success');

            },

            submitHandler: function(form) {

                /// 提交
                $.ajax({
                    url: './ajax.php?act=editpost',
                    type: "POST",
                    timeout: "5000",
                    data: mainForm.serialize(),
                    success: function(data) {

                        if (data.code == "200") {

                            $("#success_info").html(data.msg);

                            alert_success.show();
                            alert_error.hide();


                            setTimeout(function(){

                                window.location.href="myposts.php";

                            },3000);


                        } else {
                            $("#error_info").html(data.msg);


                            alert_error.show();
                            alert_success.hide();

                        }
                    },
                    error: function(XMLResponse) {
                        alert("Commit exception");
                    }
                });
            }


        });
    });
</script>

</body>
</html>
