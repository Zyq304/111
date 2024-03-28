<?php
include("header.php");
?>
<!-- JAVASCRIPTS -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- JQUERY -->
<script src="js/jquery/jquery-2.0.3.min.js"></script>
<!-- BOOTSTRAP -->
<script src="bootstrap-dist/js/bootstrap.min.js"></script>

<script src="js/jquery-validate/jquery.validate.js"></script>


<script>
    function showwin(url){
        window.open(url,"_blank","height=150,width=250,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,left=250,top=180,");
    }

</script>
<!-- PAGE -->

<section id="page">
    <?php include("sidebar.php");?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div id="content" class="col-lg-12">
                    <!-- PAGE HEADER-->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-header">
                                <!-- BREADCRUMBS -->
                                <ul class="breadcrumb">
                                    <li> <i class="fa fa-home"></i> <a href="category.php">Category Management</a> </li>
                                </ul>
                                <!-- /BREADCRUMBS -->

                            </div>
                        </div>
                    </div>
                    <!-- /PAGE HEADER -->

                    <!-- SAMPLE -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BOX -->
                            <div class="box border green" id="formWizard">
                                <div class="box-title">
                                    <h4><i class="fa fa-bars"></i>Add Category</h4>
                                 </div>
                                <div class="box-body form">
                                    <form name="mainForm" id="mainForm" class="form-horizontal"  >
                                        <div class="wizard-form">
                                            <div class="wizard-content">
                                                <div class="tab-content">
                                                    <div class="tab-pane active" >

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Title<span class="required">*</span></label>
                                                            <div class="col-md-5">
                                                                <input type="text" required class="form-control" name="title"   value=""    />
                                                                <span class="error-span"></span> </div>
                                                        </div>




                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wizard-buttons">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="text-center">

                                                            <a href="javascript:;" class="btn btn-success submitBtn" onclick=" $('#mainForm').submit();"> <i class="fa fa-save"></i> Submit </a> <a href="category.php"    class="btn btn-default prevBtn"> <i class="fa fa-mail-reply"></i> Back </a> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top:20px;">
                                                <div class="col-md-12">
                                                    <div class="alert alert-danger display-none"> <a class="close" aria-hidden="true" href="#" data-dismiss="alert">×</a>
                                                        <div id="error_info" >Make sure the required fields are filled in!</div>
                                                    </div>
                                                    <div class="alert alert-success display-none"> <a class="close" aria-hidden="true" href="#" data-dismiss="alert">×</a>
                                                        <div id="success_info" ></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /BOX -->
                        </div>
                    </div>
                    <!-- /SAMPLE -->
                    </div>
                <!-- /CONTENT-->
            </div>
        </div>
    </div>
</section>
<!--/PAGE -->


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


                /// 提交
                $.ajax({
                    url: './ajax.php?act=addcategory',
                    type: "POST",
                    timeout: "5000",
                    data: mainForm.serialize(),
                    success: function(data) {

                        if (data.code == "200") {

                            $("#success_info").html(data.msg);

                            alert_success.show();
                            alert_error.hide();


                            setTimeout(function(){

                                    location.href="category.php";

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
<!-- /JAVASCRIPTS -->
</body>
</html>