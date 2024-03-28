<?php
include("include/common.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patte - Login</title>
  <link rel="icon" href="assets/img/heading-img.png">
  <!-- CSS only -->
   <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
   <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
   <link rel="stylesheet" href="assets/css/slick.css">
   <link rel="stylesheet" href="assets/css/slick-theme.css">
   <!-- nice-select -->
   <link rel="stylesheet" href="assets/css/nice-select.css">
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
<?php include ("header.php");?>

<section class="banner" style="background-color: #fff8e5; background-image:url(assets/img/banner.png)">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="banner-text">
                    <h2>Login</h2>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="index.php">Home</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">Login</li>
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
        <div class="col-lg-6" >
          <div class="box login">
            <h3>Log In Your Account</h3>
            <form method="post" id="loginForm" >
              <input type="email" name="email" placeholder="Email address" required>
              <input type="password" name="password" placeholder="Password" required>

              <button type="submit" class="button">Login</button>

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
        <div class="col-lg-6">
          <div class="box register">
            <div class="parallax" ></div>
            <h3>Register Your Account</h3>
              <form method="post" id="registerForm" >
              <input type="text" name="name" placeholder="Name" required>
              <input type="email" name="email" placeholder="Email address" required>
              <input type="password" name="password" placeholder="Password" required>
              <p>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy.</p>
              <button type="submit" class="button">Register</button>

                  <div class="row" style="margin-top:20px;">
                      <div class="col-md-12">
                          <div class="alert alert-danger display-none">
                              <div id="error2_info" >Make sure the required fields are filled in!</div>
                          </div>
                          <div class="alert alert-success display-none">
                              <div id="success2_info" ></div>
                          </div>
                      </div>
                  </div>
            </form>
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
        var mainForm = $('#loginForm');
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
                    url: './ajax.php?act=login',
                    type: "POST",
                    timeout: "5000",
                    data: mainForm.serialize(),
                    success: function(data) {

                        if (data.code == "200") {

                            $("#success_info").html(data.msg);

                            alert_success.show();
                            alert_error.hide();


                            setTimeout(function(){

                                window.location.href="user.php";

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




        var mainForm2 = $('#registerForm');
        var alert_success2 = $('.alert-success', mainForm2);
        var alert_error2 = $('.alert-danger', mainForm2);

        mainForm2.validate({
            doNotHideMessage: true,
            errorClass: 'error-span',
            errorElement: 'span',
            rules: {

            },
            messages: {

            },
            invalidHandler: function (event, validator) {
                alert_success2.hide();
                $("#error2_info").html('Make sure the required fields are filled in!');
                alert_error2.show();
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
                    url: './ajax.php?act=register',
                    type: "POST",
                    timeout: "5000",
                    data: mainForm2.serialize(),
                    success: function(data) {

                        if (data.code == "200") {

                            $("#success2_info").html(data.msg);

                            alert_success2.show();
                            alert_error2.hide();


                            setTimeout(function(){

                                window.location.href="login.php";

                            },3000);


                        } else {
                            $("#error2_info").html(data.msg);


                            alert_error2.show();
                            alert_success2.hide();

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
