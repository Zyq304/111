<?php

include("header.php");

$row = $DB->get_row("SELECT * FROM `block` WHERE id = ".$_GET['id']);

?>
<!-- JAVASCRIPTS -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- JQUERY -->
<script src="js/jquery/jquery-2.0.3.min.js"></script>
<!-- BOOTSTRAP -->
<script src="bootstrap-dist/js/bootstrap.min.js"></script>

<script src="js/jquery-validate/jquery.validate.js"></script>

<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="kindeditor/plugins/code/prettify.css" />
<script charset="utf-8" src="kindeditor/kindeditor-all-min.js"></script>
<script charset="utf-8" src="kindeditor/lang/en.js"></script>
<script charset="utf-8" src="kindeditor/plugins/code/prettify.js"></script>
<script>
    var editor1;
    KindEditor.ready(function(K) {
        editor1 = K.create('textarea[name="content"]', {
            cssPath : 'kindeditor/plugins/code/prettify.css',
            uploadJson : 'kindeditor/php/upload_json.php',
            fileManagerJson : 'kindeditor/php/file_manager_json.php',
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
                                    <li> <i class="fa fa-home"></i> <a href="block.php">Block Management</a> </li>
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
                                    <h4><i class="fa fa-bars"></i>Edit Block</h4>
                                 </div>
                                <div class="box-body form">
                                    <form name="mainForm" id="mainForm" class="form-horizontal"  >
                                        <input type="hidden" name="id"  value="<?=$row['id']?>"    />
                                        <div class="wizard-form">
                                            <div class="wizard-content">
                                                <div class="tab-content">
                                                    <div class="tab-pane active" >

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Title<span class="required">*</span></label>
                                                            <div class="col-md-5">
                                                                <input type="text" required class="form-control" name="title"   value="<?=$row['title']?>"    />
                                                                <span class="error-span"></span> </div>
                                                        </div>




                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Content</label>
                                                            <div class="col-md-5">
                                                                <textarea name="content"  style="width:100%;height:400px;visibility:hidden;"><?=$row['content']?></textarea>

                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wizard-buttons">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="text-center">

                                                            <a href="javascript:;" class="btn btn-success submitBtn" onclick=" $('#mainForm').submit();"> <i class="fa fa-save"></i> Submit </a> <a href="block.php"    class="btn btn-default prevBtn"> <i class="fa fa-mail-reply"></i> Back </a> </div>
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
                name: {

                }
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
                    url: './ajax.php?act=editblock',
                    type: "POST",
                    timeout: "5000",
                    data: mainForm.serialize(),
                    success: function(data) {

                        if (data.code == "200") {

                            $("#success_info").html(data.msg);

                            alert_success.show();
                            alert_error.hide();


                            setTimeout(function(){

                                    location.href="block.php";

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