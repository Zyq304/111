<?php

include("header.php");


require_once("../include/Page.php");

$keyword=$_GET['keyword'];

$page = $_GET['page'];
if(!$page)$page=1;

$start = ($page-1) * 10;

$where=" 1 ";
if($keyword){
    $where.=" and (title like  '%".$keyword."%' or content like  '%".$keyword."%') ";
}

$count = $DB->count("SELECT count(*) FROM `block` where {$where}");
$listRows = 10 ;

$p = new Page($count,$listRows);

$list = $DB->getAll("SELECT * FROM `block` where {$where} order by id desc limit ".$p->firstRow.','.$p->listRows );


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
                                    <li> <i class="fa fa-home"></i> <a href="block.php">Block Management</a> </li>

                                </ul>
                                <!-- /BREADCRUMBS -->
                                <div class="clearfix">
                                    <div class="col-md-3">
                                        <h3 class="content-title">Block Management</h3>
                                    </div>
                                    <div class="col-md-9 text-right">
                                        <form class="quick_search" id="quick_search" method="get" >



                                            <div class="dataTables_filter "  >


                                                <label style="padding-right:10px;">
                                                    <input type="text" aria-controls="datatable2" placeholder="Title/Content" name="keyword" id="keyword" value="<?=$keyword?>"  class="form-control">
                                                </label>
                                            </div>
                                            <div class="DTTT_container">
                                                <button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i></button>
                                                <a class="btn btn-primary"  href="block.php" ><span>Reset</span></a> </div>

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
                                    <h4><i class="fa fa-bars"></i>Block List</h4>
                                </div>
                                <div class="box-body">
                                    <form method="post" action="">
                                        <div class="panel panel-default">
                                            <table class="table table-striped table-bordered table-hover tablelist centertable">
                                                <thead>
                                                <tr>
                                                    <th width="5%"  class="tcenter"> Id</th>
                                                    <th width="45%">Title</th>
                                                    <th width="10%">Update Date</th>
                                                    <th width="5%"  class="tcenter">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($list as $vo){ ?>
                                                    <tr >
                                                        <td class="tcenter"><?=$vo['id']?></td>
                                                        <td><?=$vo['title']?></td>
                                                        <td class="tcenter"><?=date("Y-m-d",$vo['update_time'])?></td>
                                                        <td class="tcenter"><!-- Icons -->

                                                            <a href="editblock.php?id=<?=$vo['id']?>"  class="btn-xs btn-primary ">Edit</a>


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

<!-- /JAVASCRIPTS -->
</body>
</html>