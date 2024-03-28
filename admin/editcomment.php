<?php

include("header.php");


$row = $DB->get_row("SELECT * FROM `comment` WHERE id = ".$_GET['id']);

$user = $DB->getAll("SELECT * FROM `user`  order by name asc");


?>
<!-- JAVASCRIPTS -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- JQUERY -->
<script src="js/jquery/jquery-2.0.3.min.js"></script>
<!-- BOOTSTRAP -->
<script src="bootstrap-dist/js/bootstrap.min.js"></script>

<script src="js/jquery-validate/jquery.validate.js"></script>



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
                                    <li> <i class="fa fa-home"></i> <a href="comment.php">Comment</a> </li>
                                </ul>
                                <!-- /BREADCRUMBS -->
C
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
                                    <h4><i class="fa fa-bars"></i>Edit Comment</h4>
                                 </div>
                                <div class="box-body form">
                                    <form name="mainForm" id="mainForm" class="form-horizontal"  >
                                        <input type="hidden" name="id"  value="<?=$row['id']?>"    />
                                        <div class="wizard-form">
                                            <div class="wizard-content">
                                                <div class="tab-content">
                                                    <div class="tab-pane active" >

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Title</label>
                                                            <div class="col-md-5" style="padding-top: 7px">
                                                                <?=getCommentTitle($row['id'])?> </div>
                                                        </div>



                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Status</label>
                                                            <div class="col-md-5"  style="padding-top: 7px">

                                                                <input name="status" type="radio" value="1"    <?=$row['status']==1?'checked':''?>     />
                                                                Normal

                                                                &nbsp;
                                                                &nbsp;
                                                                &nbsp;
                                                                &nbsp;

                                                                <input type="radio" name="status" value="0"     <?=$row['status']==0?'checked':''?>     />
                                                                Hidden

                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">User</label>
                                                            <div class="col-md-5">
                                                                <select name="user_id"  id="user_id"   class="form-control"  >
                                                                    <option value="">User</option>
                                                                    <?php   foreach ($user as $vo) { ?>
                                                                        <option value="<?=$vo['id'] ?>"   <?=$row['user_id']==$vo['id']?'selected':''?>   ><?=$vo['name']?></option>
                                                                    <?php    }  ?>

                                                                </select>
                                                                <span class="error-span"></span> </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Content</label>
                                                            <div class="col-md-5">
                                                                <textarea name="content" style="width:100%;height:400px;visibility:hidden;"><?=$row['content']?></textarea>
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Create Time</label>
                                                            <div class="col-md-5" style="padding-top: 7px">
                                                                <?=date("Y-m-d H:i:s",$row['create_time'])?> </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Update Time</label>
                                                            <div class="col-md-5" style="padding-top: 7px">
                                                                <?=date("Y-m-d H:i:s",$row['update_time'])?> </div>
                                                        </div>





                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wizard-buttons">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="text-center">

                                                            <a href="javascript:;" class="btn btn-success submitBtn" onclick=" $('#mainForm').submit();"> <i class="fa fa-save"></i> Submit </a> <a href="comment.php"    class="btn btn-default prevBtn"> <i class="fa fa-mail-reply"></i> Back </a> </div>
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

                /// 提交
                $.ajax({
                    url: './ajax.php?act=editcomment',
                    type: "POST",
                    timeout: "5000",
                    data: mainForm.serialize(),
                    success: function(data) {

                        if (data.code == "200") {

                            $("#success_info").html(data.msg);

                            alert_success.show();
                            alert_error.hide();


                            setTimeout(function(){

                                    location.href="comment.php";

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