<?php
include("include/common.php");
if (!$_SESSION['user_id']) {
    header("Location: login.php");
    exit;
}

$board = $DB->getAll("SELECT * FROM `board`");

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patte - Add Post</title>
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


    <link rel="stylesheet" href="assets/js/kindeditor/themes/default/default.css" />
    <link rel="stylesheet" href="assets/js/kindeditor/plugins/code/prettify.css" />
    <script charset="utf-8" src="assets/js/kindeditor/kindeditor-all-min.js"></script>
    <script charset="utf-8" src="assets/js/kindeditor/lang/en.js"></script>
    <script charset="utf-8" src="assets/js/kindeditor/plugins/code/prettify.js"></script>
    <script>
        var editor1;
        KindEditor.ready(function(K) {
            editor1 = K.create('textarea[name="content"]', {
                cssPath : 'assets/js/kindeditor/plugins/code/prettify.css',
                uploadJson : 'assets/js/kindeditor/php/upload_json.php',
                fileManagerJson : 'assets/js/kindeditor/php/file_manager_json.php',
                allowFileManager : true,
                afterCreate : function() {
                    var self = this;
                    K.ctrl(document, 13, function() {
                        self.sync();
                        K('form[name=mainForm]')[0].submit();
                    });
                    K.ctrl(self.edit.doc, 13, function() {
                        self.sync();
                        K('form[name=mainForm]')[0].submit();
                    });
                }
            });
            prettyPrint();
        });

        function showwin(url){
            window.open(url,"_blank","height=150,width=250,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,left=250,top=180,");
        }

    </script>
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
                        <li class="breadcrumb-item"><a href="forum.php">Forum</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Post</li>
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

        <div class="col-md-12">
            <nav class="navbar mb-md-2">
                <ul class="navbar-links">
                    <li class="navbar-dropdown active">
                        <a href="forum.php">All</a>
                    </li>
                    <?php
                    $list = $DB->getAll("SELECT * FROM `board` " );
                    foreach($list as $vo){
                        ?>
                        <li class="navbar-dropdown ">
                            <a href="forum.php?board_id=<?=$vo['id']?>"><?=$vo['title']?></a>
                        </li>
                    <?php } ?>

                </ul>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details">

                    <div class="comments">


                        <form  name="mainForm" id="mainForm"  class="checkout-meta donate-page">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3>Post details</h3>
                                    <div class="col-lg-12">
                                        <select name="board_id" class="nice-select Advice " required >
                                            <option value="">Board</option>
                                            <?php
                                            foreach($list as $vo){
                                            ?>
                                            <option value="<?=$vo['id']?>" ><?=$vo['title']?></option>
                                            <?php } ?>
                                        </select>

                                        <input type="text" class="input-text " required name="title" placeholder="Title">

                                        <textarea name="content"  style="width:100%;height:400px;visibility:hidden;"></textarea>

                                    </div>
                                </div>

                            </div>

                            <button class="button mt-4 mb-lg-0 mb-5" type="submit" >Submit</button>

                            <div class="row" style="margin-top:20px;">
                                <div class="col-md-12">
                                    <div class="alert alert-danger display-none">
                                        <div id="error_info" >Make sure the required fields are filled in!</div>
                                    </div>
                                    <div class="alert alert-success display-none">
                                        <div id="success_info" ></div>
                                    </div>
                                </div>
                            </div>

                        </form>


                    </div>



                </div>
            </div>
            <div class="col-lg-4 ">
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
<script src="assets/js/jquery.nice-select.min.js"></script>
<!-- fancybox -->
<script src="assets/js/jquery.fancybox.min.js"></script>
<script src="assets/js/custom.js"></script>

<script src="assets/js/jquery-validate/jquery.validate.js"></script>


<script>

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


                editor1.sync();

                /// 提交
                $.ajax({
                    url: './ajax.php?act=addpost',
                    type: "POST",
                    timeout: "5000",
                    data: mainForm.serialize(),
                    success: function(data) {

                        if (data.code == "200") {

                            $("#success_info").html(data.msg);

                            alert_success.show();
                            alert_error.hide();


                            setTimeout(function(){

                                location.href="forum.php";

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
