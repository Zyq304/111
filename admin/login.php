<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- STYLESHEETS --><!--[if lt IE 9]><script src="js/flot/excanvas.min.js"></script><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
	<link rel="stylesheet" type="text/css" href="css/cloud-admin.css" >
	
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- DATE RANGE PICKER -->
	<link rel="stylesheet" type="text/css" href="js/bootstrap-daterangepicker/daterangepicker-bs3.css" />

</head>
<body class="login">	
	<!-- PAGE -->
	<section id="page">
			<!-- HEADER -->
			<header>
				<!-- NAV-BAR -->
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<div id="logo">
							<h1>System</h1>
                            </div>
						</div>
					</div>
				</div>
				<!--/NAV-BAR -->
			</header>
			<!--/HEADER -->
			<!-- LOGIN -->
			<section id="login" class="visible">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<div class="login-box-plain">

                                <form role="form" id="loginForm" name="loginForm"  method="post" >

                                <div class="form-group">
									<label for="exampleInputEmail1">Username</label>
									<i class="fa fa-envelope"></i>
									<input type="text" class="form-control" name="username" >
								  </div>
								  <div class="form-group"> 
									<label for="exampleInputPassword1">Password</label>
									<i class="fa fa-lock"></i>
									<input type="password" class="form-control" name="password" >
								  </div>
								  <div class="form-actions1">
									<button type="submit" class="btn btn-danger">Login</button>
								  </div>
								</form>

                                <div class="check-tips error" ></div>

                            </div>
						</div>
					</div>
				</div>
			</section>
			<!--/LOGIN -->

	</section>
	<!--/PAGE -->
	<!-- JAVASCRIPTS -->
	<!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery/jquery-2.0.3.min.js"></script>
    <!-- BOOTSTRAP -->
    <script src="bootstrap-dist/js/bootstrap.min.js"></script>

    <script src="js/jquery-validate/jquery.validate.js"></script>
    <script>



        $(function(){


            //验证登录
            $("#loginForm").validate({
                rules: {
                    username: {
                        required: true
                    },
                    password: {
                        required: true
                    }
                },
                messages: {
                    username: {
                        required: "Username is required"
                    },
                    password: {
                        required: "Password is required"
                    }

                },
                errorPlacement: function(error, element) {
                    $(element).after(error);
                },

                submitHandler: function(form) {
                    $.post("ajax.php?act=login", $("#loginForm").serialize(),
                        function (data)
                        {

                            if (data.code == "200") {

                                    window.location.href = "user.php";

                            } else {
                                $(".check-tips").text(data.msg);

                            }


                        }
                    );
                }
            });


        });


    </script>

	<!-- /JAVASCRIPTS -->
</body>
</html>