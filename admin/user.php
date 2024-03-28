<?php

include("header.php");


require_once("../include/Page.php");

$keyword=$_GET['keyword'];

$page = $_GET['page'];
if(!$page)$page=1;

$start = ($page-1) * 10;

$where=" 1 ";
if($keyword){
    $where.=" and (name like  '%".$keyword."%'  or email like  '%".$keyword."%') ";
}


$count = $DB->count("SELECT count(*) FROM `user` where {$where}");
$listRows = 10 ;

$p = new Page($count,$listRows);

$list = $DB->getAll("SELECT * FROM `user` where {$where} order by id desc limit ".$p->firstRow.','.$p->listRows );


$pageBar = $p->show();



?>

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
                                    <li> <i class="fa fa-home"></i> <a href="user.php">User Management</a> </li>

                                </ul>
                                <!-- /BREADCRUMBS -->
                                <div class="clearfix">
                                    <div class="col-md-3">
                                        <h3 class="content-title">User Management</h3>
                                    </div>
                                    <div class="col-md-9 text-right">
                                        <form class="quick_search" id="quick_search" method="get" >



                                            <div class="dataTables_filter "  >


                                                <label style="padding-right:10px;">
                                                    <input type="text" aria-controls="datatable2" placeholder="Name/Email" name="keyword" id="keyword" value="<?=$keyword?>"  class="form-control">
                                                </label>
                                            </div>
                                            <div class="DTTT_container">
                                                <button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i></button>
                                                <a class="btn btn-primary"  href="user.php" ><span>Reset</span></a> </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /PAGE HEADER -->

                    <!-- DATA TABLES -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BOX -->
                            <div class="box border primary">
                                <div class="box-title">
                                    <h4><i class="fa fa-bars"></i>User List</h4>
                                </div>
                                <div class="box-body">
                                    <form method="post" action="">
                                        <div class="panel panel-default">
                                            <table class="table table-striped table-bordered table-hover tablelist centertable">
                                                <thead>
                                                <tr>
                                                    <th width="5%"  class="tcenter"> Id</th>
                                                    <th width="15%">Name</th>
                                                    <th width="15%">Email</th>
                                                    <th width="10%">Update Date</th>
                                                    <th width="10%"  class="tcenter">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($list as $vo){ ?>
                                                    <tr >
                                                        <td class="tcenter"><?=$vo['id']?></td>
                                                        <td><?=$vo['name']?></td>
                                                        <td><?=$vo['email']?></td>
                                                        <td class="tcenter"><?=date("Y-m-d",$vo['update_time'])?></td>
                                                        <td class="tcenter"><!-- Icons -->

                                                            <a href="edituser.php?id=<?=$vo['id']?>"  class="btn-xs btn-primary ">Edit</a>
                                                            <a href="javascript://" class="btn-xs btn-danger del " data-id="<?=$vo['id']?>" >Delete</a>


                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                <?php if(empty($list)){ ?>
                                                    <tr>
                                                        <td colspan="5" style="color:#F00; font-weight:bold" class="text-center"> No Record </td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="pull-left" > &nbsp;

                                                    <button type="button"   onclick="window.location='adduser.php'" class="btn btn-primary"><i class="fa fa-plus-square"></i> Add</button>

                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="pull-right">

                                                    <ul class="pagination">
                                                        <?=$pageBar?>
                                                    </ul>
                                                </div>


                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /BOX -->

                        </div>
                    </div>
                    <!-- /DATA TABLES -->
                </div>
                <!-- /CONTENT-->
            </div>
        </div>
    </div>
</section>
<!--/PAGE -->

<script src="js/jquery/jquery-2.0.3.min.js"></script>
<!-- BOOTSTRAP -->
<script src="bootstrap-dist/js/bootstrap.min.js"></script>

<script src="js/jquery-validate/jquery.validate.js"></script>

<script type="text/javascript">


    jQuery(document).ready(function() {

        $(".del").click(function(){
            if(confirm("Are you sure to delete?")){
                $.ajax({
                    url: "ajax.php?act=deluser",
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
<!-- /JAVASCRIPTS -->
</body>
</html>