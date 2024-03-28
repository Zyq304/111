<?php
include("header.php");

$category = $DB->getAll("SELECT * FROM `category`");

?>
<link rel="stylesheet" type="text/css"  href="css/jquery-ui.css" >
<!-- JAVASCRIPTS -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- JQUERY -->
<script src="js/jquery/jquery-2.0.3.min.js"></script>
<!-- BOOTSTRAP -->
<script src="bootstrap-dist/js/bootstrap.min.js"></script>

<script src="js/jquery-validate/jquery.validate.js"></script>
<script src="js/jquery-ui.js"></script>


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
                                    <li> <i class="fa fa-home"></i> <a href="pet.php">Pet</a> </li>
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
                                    <h4><i class="fa fa-bars"></i>Add Pet</h4>
                                 </div>
                                <div class="box-body form">
                                    <form name="mainForm" id="mainForm" class="form-horizontal"  >
                                        <div class="wizard-form">
                                            <div class="wizard-content">
                                                <div class="tab-content">
                                                    <div class="tab-pane active" >
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Category<span class="required">*</span></label>
                                                            <div class="col-md-5">
                                                                <select name="category_id"  id="category_id"  required  class="form-control"  >
                                                                    <option value="">Category</option>
                                                                    <?php   foreach ($category as $vo) { ?>
                                                                        <option value="<?=$vo['id'] ?>"   ><?=$vo['title']?></option>
                                                                    <?php    }  ?>

                                                                </select>
                                                                <span class="error-span"></span> </div>
                                                        </div>



                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Title<span class="required">*</span></label>
                                                            <div class="col-md-5">
                                                                <input type="text" required class="form-control" name="title"   value=""    />
                                                                <span class="error-span"></span> </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Age</label>
                                                            <div class="col-md-5">
                                                                <input type="text"  class="form-control" name="age"   value=""    />
                                                                <span class="error-span"></span> </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Color</label>
                                                            <div class="col-md-5">
                                                                <input type="text"  class="form-control " name="color"   value=""    />
                                                                <span class="error-span"></span> </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Weight </label>
                                                            <div class="col-md-5">
                                                                <input type="text"  class="form-control " name="weight"   value=""    />
                                                                <span class="error-span"></span> </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Address </label>
                                                            <div class="col-md-5">
                                                                <input type="text"  class="form-control " name="address"   value=""    />
                                                                <span class="error-span"></span> </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Photo<span class="required">*</span></label>
                                                            <div class="col-md-5"> <input name="photo" type="text" id="photo" value=""  required class="form-control" >
                                                            <input name="btn_upload2" type="button" class="btn" style="cursor:pointer" onClick="showwin('upload.php?type=1&fz=fs&input=photo&myform=mainForm&filepath=upload/pet&thumbw=217&thumbh=255');" value="Upload"  >
                                                                (The file format must be JPG, GIF, PNG, BMP 217 x 255) </td>
                                                            <span class="error-span"></span> </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Photo 1</label>
                                                            <div class="col-md-5"> <input name="photo1" type="text" id="photo1" value=""   class="form-control" >
                                                                <input name="btn_upload2" type="button" class="btn" style="cursor:pointer" onClick="showwin('upload.php?type=1&fz=fs&input=photo1&myform=mainForm&filepath=upload/pet');" value="Upload"  >
                                                                (The file format must be JPG, GIF, PNG, BMP) </td>
                                                                <span class="error-span"></span> </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Photo 2</label>
                                                            <div class="col-md-5"> <input name="photo2" type="text" id="photo2" value=""   class="form-control" >
                                                                <input name="btn_upload2" type="button" class="btn" style="cursor:pointer" onClick="showwin('upload.php?type=1&fz=fs&input=photo2&myform=mainForm&filepath=upload/pet');" value="Upload"  >
                                                                (The file format must be JPG, GIF, PNG, BMP) </td>
                                                                <span class="error-span"></span> </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Photo 3</label>
                                                            <div class="col-md-5"> <input name="photo3" type="text" id="photo3" value=""   class="form-control" >
                                                                <input name="btn_upload2" type="button" class="btn" style="cursor:pointer" onClick="showwin('upload.php?type=1&fz=fs&input=photo3&myform=mainForm&filepath=upload/pet');" value="Upload"  >
                                                                (The file format must be JPG, GIF, PNG, BMP) </td>
                                                                <span class="error-span"></span> </div>
                                                        </div>





                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Status</label>
                                                            <div class="col-md-5"  style="padding-top: 7px">

                                                                <input name="status" type="radio" value="1"  checked    />
                                                                Normal

                                                                &nbsp;
                                                                &nbsp;
                                                                &nbsp;
                                                                &nbsp;

                                                                <input type="radio" name="status" value="0"     />
                                                                Hidden

                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Content</label>
                                                            <div class="col-md-5">
                                                                <textarea name="content" style="width:100%;height:400px;visibility:hidden;"></textarea>
                                                            </div>
                                                        </div>



                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wizard-buttons">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="text-center">

                                                            <a href="javascript:;" class="btn btn-success submitBtn" onclick=" $('#mainForm').submit();"> <i class="fa fa-save"></i> Submit </a> <a href="pet.php"    class="btn btn-default prevBtn"> <i class="fa fa-mail-reply"></i> Back </a> </div>
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


                editor1.sync();

                /// 提交
                $.ajax({
                    url: './ajax.php?act=addpet',
                    type: "POST",
                    timeout: "5000",
                    data: mainForm.serialize(),
                    success: function(data) {

                        if (data.code == "200") {

                            $("#success_info").html(data.msg);

                            alert_success.show();
                            alert_error.hide();


                            setTimeout(function(){

                                    location.href="pet.php";

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