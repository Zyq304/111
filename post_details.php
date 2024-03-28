<?php
include("include/common.php");

$id=$_GET['id'];

$row = $DB->get_row("SELECT * FROM `post` WHERE id = $id");

//获取评论数
$comment = $DB->count("SELECT count(*) FROM `comment` WHERE status=1 and post_id = $id");

$DB->query("update post set hits=hits+1 where id = $id");


$board_id=$row['board_id'];

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patte - Post-details</title>
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
            <nav class="navbar">
                <ul class="navbar-links">
                    <li class="navbar-dropdown active">
                        <a href="forum.php">All</a>
                    </li>
                    <?php
                    $board_id=$row['board_id'];
                    $list = $DB->getAll("SELECT * FROM `board` " );
                    foreach($list as $vo){
                        ?>
                        <li class="navbar-dropdown <?=$board_id==$vo['id']?'active':''?>">
                            <a href="forum.php?board_id=<?=$vo['id']?>"><?=$vo['title']?></a>
                        </li>
                    <?php } ?>

                </ul>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details">
                    <div class="blog-style-two">

                        <div class="blog-text-two">
                            <h6><?=getBoardName($row['board_id'])?></h6> <h5><?=date("Y-m-d H:i:s",$row['update_time'])?></h5>
                            <h3><?=$row['title']?></h3>

                            <?=$row['content']?>

                        </div>


                    </div>


                    <div class="willimes-marko">
                        <img  src="<?=getUserAvatar($row['user_id'])?>" width="100" >
                        <div>
                            <div class="social-media-Intege">
                                <h4><?=getUserName($row['user_id'])?></h4>

                            </div>
                        </div>
                    </div>

                    <div class="comment">
                        <h3>Leave A Comments</h3>
                        <div class="boder-bar"></div>
                        <form class="leave">
                           <div> <textarea placeholder="Your Message" class="txt-commit" replyid="0" ></textarea></div>
                            <div><button type="button" class="button mt-4 mb-lg-0 mb-5 comment-submit" parent_id="0">Post</button></div>
                        </form>
                    </div>

                    <div class="comments">

                        <div class="comment-filed-list">
                            <div style="margin-bottom: 20px;text-align: right"><span class="comment-num">
                                    <span><?=$comment?> Comments</span>
                                </span></div>

                            <?php
                            $commentlist=getCommentlist($row['id']);
                            ?>
                            <div class="comment-list">
                                <!--one begin-->
                                <ul class="comment-ul">
                                   <?php

                                   foreach($commentlist as $data){

                                   ?>
                                        <li comment_id="<?=$data['id']?>">
                                            <div >
                                                <div>
                                                    <img class="head-pic"  src="<?=getUserAvatar($data['user_id'])?>" alt="">
                                                </div>
                                                <div class="cm">
                                                    <div class="cm-header">
                                                        <span><?=getUserName($data['user_id'])?></span>
                                                        <span><?=date("Y-m-d H:i:s",$data['update_time'])?></span>
                                                    </div>
                                                    <div class="cm-content">
                                                        <p>
                                                            <?=$data['content']?>
                                                        </p>
                                                    </div>
                                                    <div class="cm-footer">
                                                        <a class="comment-reply" comment_id="<?=$data['id']?>" href="javascript:void(0);">Reply</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- second begin-->
                                            <ul class="children">
                                                <?php

                                                foreach($data['children'] as $child){

                                                ?>
                                                    <li comment_id="<?=$child['id']?>">
                                                        <div >
                                                            <div>
                                                                <img class="head-pic"  src="<?=getUserAvatar($child['user_id'])?>" alt="">
                                                            </div>
                                                            <div class="children-cm">
                                                                <div  class="cm-header">
                                                                    <span><?=getUserName($child['user_id'])?></span>
                                                                    <span><?=date("Y-m-d H:i:s",$child['update_time'])?></span>
                                                                    
                                                                </div>
                                                                <div class="cm-content">
                                                                    <p>
                                                                        <?=$child['content']?>
                                                                    </p>
                                                                </div>
                                                                <div class="cm-footer">
                                                                    <a class="comment-reply" replyswitch="off" comment_id="<?=$child['id']?>"  href="javascript:void(0);">Reply</a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Three begin-->
                                                        <ul class="children">
                                                            <?php

                                                            foreach($child['children'] as $grandson){

                                                            ?>
                                                                <li comment_id="<?=$grandson['id']?>">
                                                                    <div >
                                                                        <div>
                                                                            <img class="head-pic"  src="<?=getUserAvatar($grandson['user_id'])?>" alt="">
                                                                        </div>
                                                                        <div class="children-cm">
                                                                            <div  class="cm-header">
                                                                                <span><?=getUserName($grandson['user_id'])?></span>
                                                                                <span><?=date("Y-m-d H:i:s",$grandson['update_time'])?></span>
                                                                            </div>
                                                                            <div class="cm-content">
                                                                                <p>
                                                                                    <?=$grandson['content']?>
                                                                                </p>
                                                                            </div>
                                                                            <div class="cm-footer">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                           <?php } ?>
                                                        </ul>
                                                        <!--three end-->

                                                    </li>
                                                <?php } ?>
                                            </ul>
                                            <!--second end-->

                                        </li>
                                   <?php } ?>
                                </ul>
                                <!--one end-->
                            </div>
                        </div>


                    </div>

                </div>
            </div>
            <div class="col-lg-4 ">
                <div class="sidebar">
                    <a  href="post.php" class="button" style="width: 100%;text-align: center">Post</a>

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
<!-- fancybox -->
<script src="assets/js/jquery.fancybox.min.js"></script>
<script src="assets/js/custom.js"></script>
<script>
    $(function(){


        $('body').delegate('.comment-submit','click',function(){
            var content = $.trim($(this).parent().prev().children("textarea").val());
            $(this).parent().prev().children("textarea").val("");
            if(""==content){
                alert("Message is required!");
            }else{

                var parent_id = $(this).attr("parent_id");
                var post_id = <?=$row['id']?>;

                var replyswitch = $(this).attr("replyswitch");//获取回复开关锁属性
                $.ajax({
                    type:"POST",
                    url: './ajax.php?act=addcomment',
                    data:{
                        post_id:post_id,
                        parent_id:parent_id,
                        content:content
                    },
                    dataType:"json",
                    success:function(rt){
                        var data=rt.data;
                        if(rt.code==200){
                            $(".comment-reply").next().remove();
                            $(".comment-num").children("span").html(data.num+" Comments");

                            var newli = "";
                            if(parent_id == "0"){

                                newli = "<li comment_id='"+data.id+"'><div ><div><img class='head-pic'  src='"+data.head_pic+"' alt=''></div><div class='cm'><div  class='cm-header'><span>"+data.nickname+"</span><span>"+data.create_time+"</span></div><div class='cm-content'><p>"+data.content+"</p></div><div class='cm-footer'><a class='comment-reply' comment_id='"+data.id+"'  href='javascript:void(0);'>Reply</a></div></div></div><ul class='children'></ul></li>";
                                $(".comment-ul").prepend(newli);
                            }else{

                                if('off'==replyswitch){
                                    newli = "<li comment_id='"+data.id+"'><div ><div><img class='head-pic'  src='"+data.head_pic+"' alt=''></div><div class='children-cm'><div  class='cm-header'><span>"+data.nickname+"</span><span>"+data.create_time+"</span></div><div class='cm-content'><p>"+data.content+"</p></div><div class='cm-footer'></div></div></div><ul class='children'></ul></li>";
                                }else{
                                    newli = "<li comment_id='"+data.id+"'><div ><div><img class='head-pic'  src='"+data.head_pic+"' alt=''></div><div class='children-cm'><div  class='cm-header'><span>"+data.nickname+"</span><span>"+data.create_time+"</span></div><div class='cm-content'><p>"+data.content+"</p></div><div class='cm-footer'><a class='comment-reply' comment_id='"+data.id+"'  href='javascript:void(0);' replyswitch='off' >Reply</a></div></div></div><ul class='children'></ul></li>";
                                }
                                $("li[comment_id='"+data.parent_id+"']").children("ul").prepend(newli);
                            }

                        }else{

                            alert(rt.msg);
                        }

                    }
                });
            }


        });




        $("body").delegate(".comment-reply","click",function(){
            if($(this).next().length>0){
                $(this).next().remove();
            }else{
                $(".comment-reply").next().remove();

                var parent_id = $(this).attr("comment_id");

                var divhtml = "";
                if('off'==$(this).attr("replyswitch")){
                    divhtml = "<div class='div-reply-txt' style='width:98%;padding:3px;' replyid='2'><div><textarea class='txt-reply' replyid='2' style='width: 100%; height: 100px;'></textarea></div><div style='margin-top:5px;text-align:right;'><a class='comment-submit'  parent_id='"+parent_id+"' style='font-size:14px;text-decoration:none;background-color:#63B8FF;' href='javascript:void(0);' replyswitch='off' >Submit</a></div></div>";
                }else{
                    divhtml = "<div class='div-reply-txt' style='width:98%;padding:3px;' replyid='2'><div><textarea class='txt-reply' replyid='2' style='width: 100%; height: 100px;'></textarea></div><div style='margin-top:5px;text-align:right;'><a class='comment-submit'  parent_id='"+parent_id+"' style='font-size:14px;text-decoration:none;background-color:#63B8FF;' href='javascript:void(0);'>Submit</a></div></div>";
                }
                $(this).after(divhtml);
            }
        });

    })

</script>
</body>
